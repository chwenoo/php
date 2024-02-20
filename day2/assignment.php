<?php

function test($x , $y) {
    if(($x + $y) >= 10 && ($x + $y) <= 20) {
        return 30;
    } else {
        return ($x + $y );
    }
}

echo test(12, 17); echo "<br />";
echo test(2, 17); echo "<br />";
echo test(22, 17); echo "<br />";
echo test(20, 0); echo "<br />";
echo test(2, 1); echo "<br />";

// 1
function check_range($x, $y) {
    if(($x >= 100 || $y >= 100) && ($x <= 200 || $y <= 200)) {
        return true;
    } else {
        return false;
    }
}

echo check_range(100, 199); echo "<br />";
echo check_range(250, 300); echo "<br />";
echo check_range(105, 190); echo "<br />";

// 2
function triple_sum($x, $y) {
    if ($x === $y) {
        return 3 * ($x + $y);
    }
    return ($x + $y);
}

echo triple_sum(1, 2); echo "<br />";
echo triple_sum(3, 2); echo "<br />";
echo triple_sum(2, 2); echo "<br />";

// 3
function check_equal($arr, $x) {
    for($i = 0; $i < 4; $i++) {
        if($arr[$i] === $x) return true;
    }
    return false;
}

echo check_equal([1, 2, 9, 3], 3); echo "<br/>";
echo check_equal([1, 2, 3, 4, 5, 6], 2); echo "<br/>";
echo check_equal([1, 2, 3, 4, 5, 6], 6); echo "<br/>";
echo check_equal([1, 2, 2, 3], 9); echo "<br/>";

// 4
function compare($str1, $str2) {
    $count = 0;

    for ($x = 0; $x < strlen($str1) - 1; $x++) {
        $subStringX = substr($str1, $x, 2);
        // echo "sub: ".$subStringX; echo "<br/>";

        for ($y = 0; $y < strlen($str2) - 1; $y++) {
            $subStringY = substr($str2, $y, 2);
            // echo "sub: ".$subStringY; echo "<br/>";
            if ($subStringX === $subStringY) {
                $count++;
            }
        }
    }
    return $count;
}

echo compare("abcdefgh", "abijsklm"); echo "<br />";
echo compare("abcde", "osuefrcd"); echo "<br />";
echo compare("pqrstuvwx", "pqkdiewx"); echo "<br />";

// 5
function sum($a, $b, $c) {
    if ($a >= 10 && $a <= 20 ) {    
        if ($a === 13) {
            $a = 13;
        } elseif ($a === 17) {
            $a = 17;
        } else {
            $a = 0;
        }
    }
    if ($b >= 10 && $b <= 20 ) {    
        if ($b === 13) {
            $b = 13;
        } elseif ($b === 17) {
            $b = 17;
        } else {
            $b = 0;
        }
    }
    if ($c >= 10 && $c <= 20 ) {    
        if ($c === 13) {
            $c = 13;
        } elseif ($c === 17) {
            $c = 17;
        } else {
            $c = 0;
        }
    }

    return ($a + $b + $c);
}

echo sum(4, 5, 7); echo "<br />";
echo sum(7, 4, 12); echo "<br />";
echo sum(10, 13, 12); echo "<br />";
echo sum(17, 12, 18); echo "<br />";
