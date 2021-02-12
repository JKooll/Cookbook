<?php
class Solution {

    /**
     * @param String[] $board
     * @return String
     */
    function tictactoe($board) {
        $n = count($board);

        $i = 0;

        $diagonalx = 0;
        $diagonalo = 0;
        $reversediagonalx = 0;
        $reversediagonalo = 0;
        
        while ($i < $n) {
            if ($board[$i][$i] == 'X') {
                $diagonalx++;
            }
            if ($board[$i][$n - $i - 1] == 'X') {
                $reversediagonalx++;
            }
            if ($board[$i][$i] == 'O') {
                $diagonalo++;
            }
            if ($board[$i][$n - $i - 1] == 'O') {
                $reversediagonalo++;
            }
            $i++;
        }

        if ($diagonalx == $n || $reversediagonalx == $n) {
            return 'X';
        }

        if ($diagonalo == $n || $reversediagonalo == $n) {
            return 'O';
        }

        $filled = true;

        $rows = array_fill([], $n, 0);
        $cols = array_fill([], $n, 0);

        for($x = 0; $x < $n; $x++) {
            for ($y = 0; $y < $n; $y++) {
                if ($board[$x][$y] == ' ') {
                    $filled = false;
                }
                
                if ($board[$x][$y] == 'X') {
                    $rows[$x] += 1;
                    $cols[$y] += 1;
                }

                if ($board[$x][$y] == 'O') {
                    $rows[$x] += 2 * $n;
                    $cols[$y] += 2 * $n;
                }

                if ($x == $n - 1) {
                    if ($cols[$y] == $n) {
                        return 'X';
                    }
                    if ($cols[$y] == 2 * $n * $n) {
                        return 'O';
                    }
                }
            }

            if ($rows[$x] == $n) {
                return 'X';
            }

            if ($rows[$x] == 2 * $n * $n) {
                return 'O';
            }
        }

        if ($filled) {
            return 'Draw';
        }

        return 'Pending';
    }
}