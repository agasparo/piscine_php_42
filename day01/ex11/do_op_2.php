#!/usr/bin/php
<?php
if (count($argv) == 2) {
        $argv[1] = trim($argv[1]);
        if (preg_match('/[\+]/', $argv[1])) {
                $e = explode('+', $argv[1]);
                $e[0] = trim($e[0]);
                $e[1] = trim($e[1]);
                if (count($e) != 2 OR !is_numeric($e[0]) OR !is_numeric($e[1]))
                        echo "Syntax Error\n";
                else
                        echo $e[0] + $e[1]."\n";
        } else if (preg_match('/[\*]/', $argv[1])) {
                $e = explode('*', $argv[1]);
                $e[0] = trim($e[0]);
                $e[1] = trim($e[1]);
                if (count($e) != 2 OR !is_numeric($e[0]) OR !is_numeric($e[1]))
                        echo "Syntax Error\n";
                else
                        echo $e[0] * $e[1]."\n";
        } else if (preg_match('/[\%]/', $argv[1])) {
                $e = explode('%', $argv[1]);
                $e[0] = trim($e[0]);
                $e[1] = trim($e[1]);
                if (count($e) != 2 OR !is_numeric($e[0]) OR !is_numeric($e[1]))
                        echo "Syntax Error\n";
                else if ($e[1] == 0)
                        exit (0);
                else
                        echo $e[0] % $e[1]."\n";
        } else if (preg_match('/[\/]/', $argv[1])) {
                $e = explode('/', $argv[1]);
                $e[0] = trim($e[0]);
                $e[1] = trim($e[1]);
                if (count($e) != 2 OR !is_numeric($e[0]) OR !is_numeric($e[1]))
                        echo "Syntax Error\n";
                else if ($e[1] == 0)
                        exit (0);
                else
                        echo $e[0] / $e[1]."\n";
        } else if (preg_match('/[\-]/', $argv[1])) {
                if ($argv[1][0] == '-')
                        $deb = 1;
                $e = explode('-', $argv[1]);
                $is = 0;
                $a = count($e);
                if (count($e) > 2) {
                        $i = 0;
                        while (isset($e[$i])) {
                                if (empty($e[$i]) || $e[$i] == " ")
                                        unset($e[$i]);
                                $i++;
                        }
                        $e = array_values($e);
                        if ($deb == 1)
                                $e[0] = $e[0] * -1;
                        if ($a > 3) {
                                $is = 1;
                                echo $e[0] + $e[1]."\n";
                        }
                        if ($a == 3 && $deb == 0) {
                                $is = 1;
                                echo $e[0] + $e[1]."\n";
                        }
                } else {
                        $e[0] = trim($e[0]);
                        $e[1] = trim($e[1]);
                }
                $e = array_values($e);
                if (count($e) != 2 OR !is_numeric($e[0]) OR !is_numeric($e[1]))
                        echo "Syntax Error\n";
                else {
                        if ($is == 0) 
                                echo $e[0] - $e[1]."\n";
                }
        } else {
                echo "Syntax Error\n";
        }
} else {
        echo "Incorrect Parameters\n";
}
?>
