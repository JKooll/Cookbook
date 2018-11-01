<!-- 
    输出一个日历，支持html text格式
    html格式输出html类型的数据
    text输出纯文本日历
-->

<?php 
// 如果查询字符串没有指定月或年。
// 则显示当月的日历
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

$cal = new LittleCalendar($month, $year);

print($cal->html());

class LittleCalendar {
    protected $monthToUse;

    protected $days = array();

    public function __construct($month, $year) {
        $this->monthToUse = DateTime::createFromFormat('Y-m|', sprintf("%04d-%02d", $year, $month));

        $this->prepare();
    }

    protected function prepare() {
        // 建立一个数组，包含一个月每天的信息
        // 会适当地填充
        // 开头和末尾
        // 首先，第一行显示星期几
        foreach (array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa') as $dow) {
            $endOfRow = ($dow == 'Sa');
            $this->days[] = array(
                'type' => 'dow',
                'label' => $dow,
                'endOfRow' => $endOfRow
            );
        }

        // 接下来，在一周的第一天之前放置占位符
        for ($i = 0, $j = $this->monthToUse->format('w'); $i < $j; $i++) {
            $this->days[] = array('type' => 'blank');
        }

        $today = date('Y-m-d');
        $days = new DatePeriod(
            $this->monthToUse, 
            new DateInterval('P1D'), 
            $this->monthToUse->format('t') - 1
        );
        foreach ($days as $day) {
            $isToday = ($day->format('Y-m-d') == $today);
            $endOfRow = ($day->format('w') == 6);
            $this->days[] = array(
                'type' => 'day',
                'label' => $day->format('j'),
                'today' => $isToday,
                'endOfRow' => $endOfRow
            );
        }

        // 最后，如果endOfWeek不是这个月最后一天
        // 在末尾放置占位符
        if (!$endOfRow) {
            for ($i = 0, $j = 6 - $day->format('w'); $i < $j; $i++) {
                $this->days[] = array('type' => 'blank');
            }
        }
    }

    public function html($opts = array()) {
        echo <<<EOD
        <style type="text/css">
        .prev {
            text-align: left;
        }

        .next {
            text-align: right;
        }

        .day, .month, .weekday {
            text-align: center;
        }

        .today {
            background: yellow;
        }

        .blank {

        }
        </style>
EOD;
        if (!isset($opts['id'])) {
            $opts['id'] = 'calendar';
        }

        if (!isset($opts['month_link'])) {
            $opts['month_link'] = 
                '<a href="' . htmlentities($_SERVER['PHP_SELF']) . '?' . 
                'month=%d&amp;year=%d">%s</a>';
        }
        $classes = array();
        foreach (array('prev', 'month', 'next', 'weekday', 'blank', 'day', 'today') as $class) {
            if (isset($opts[$class]) && isset($opts['class'][$class])) {
                $classes[$class] = $opts['class'][$class];
            } else {
                $classes[$class] = $class;
            }
        }

        /**
         * 为上个月建立一个DateTime
         */
        $prevMonth = clone $this->monthToUse;
        $prevMonth->modify('-1 month');
        $prevMonthLink = sprintf(
            $opts['month_link'],
            $prevMonth->format('m'),
            $prevMonth->format('Y'),
            '&laquo;'
        );

        /**
         * 为下个月建立一个DateTime
         */
        $nextMonth = clone $this->monthToUse;
        $nextMonth->modify('+1 month');
        $nextMonthLink = sprintf(
            $opts['month_link'],
            $nextMonth->format('m'),
            $nextMonth->format('Y'),
            '&raquo;'
        );

        $html = '<table id="'.htmlentities($opts['id']) . '">
        <tr> 
        <td class="' . htmlentities($opts['prev']) . '">'.
            $prevMonthLink . '<td>
        <td class="'. htmlentities($classes['month']).'" colspan="5">'.
            $this->monthToUse->format('F Y') . '</td>
        <td class="' . htmlentities($classes['next']) . '">'.
            $nextMonthLink . '</td>
        </tr>';

        $html .= '<tr>';

        $lastDayIndex = count($this->days) - 1;
        foreach ($this->days as $i => $day) {
            switch ($day['type']) {
                case 'dow':
                    $class = 'weekday';
                    $label = htmlentities($day['label']);
                    break;
                case 'blank':
                    $class = 'blank';
                    $label = '&nbsp';
                    break;
                case 'day':
                    $class = $day['today'] ? 'today' : 'day';
                    $label = htmlentities($day['label']);
                    break;
            }
            $html .= 
                '<td class="' . htmlentities($classes[$class]) . '">' . 
                $label . '</td>';
            if (isset($day['endOfRow']) && $day['endOfRow']) {
                $html .= "</tr>\n";
                if ($i != $lastDayIndex) {
                    $html .= '<tr>';
                }
            }
        }

        $html .= '</table>';
        return $html; 
    }

    public function text() 
    {
        $lineLength = strlen('Su Mo Tu We Th Fr Sa');
        $header = $this->monthToUse->format('F Y');
        $headerSpacing = floor($lineLength - strlen($header)) / 2;

        $text = str_repeat(' ', $headerSpacing) . $header . PHP_EOL;

        foreach ($this->days as $i => $day) {
            switch ($day['type']) {
                case 'dow':
                    $text .= sprintf('% 2s', $day['label']);
                    break;
                case 'blank':
                    $text .= ' ';
                    break;
                case 'day':
                    $text .= sprintf("% 2d", $day['label']);
                    break;
            }
            $text .= (isset($day['endOfRow']) && $day['endOfRow']) ? PHP_EOL : ' ';
        }

        if ($text[strlen(text) - 1] != PHP_EOL) {
            $text .= PHP_EOL;
        }

        return $text;
    }
}