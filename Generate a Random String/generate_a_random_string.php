<?php 
/**
 * 生成随机字符串
 */

function str_rand($length = 32,
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') 
{
    if (!is_int($length) || $length < 0) {
        return false;
    }

    $string = '';

    for ($i = $length; $i > 0; $i--) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

// test
echo str_rand();