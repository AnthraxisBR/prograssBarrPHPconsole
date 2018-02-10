<?php

class progressBar {

    private static function microtime_diff($start, $end = null) {
        if (!$end) {
            $end = microtime();
        }
        list($start_usec, $start_sec) = explode(" ", $start);
        list($end_usec, $end_sec) = explode(" ", $end);
        $diff_sec = intval($end_sec) - intval($start_sec);
        $diff_usec = floatval($end_usec) - floatval($start_usec);
        return round(intval($diff_sec) + $diff_usec);
    }

    public function render($perc) {
        error_reporting(0);
        $startTime = microtime();
         for ($i = 0; $i < $perc; $i += 1) {
            $a[$i] = true;
        }

        echo '[';
        while (self::microtime_diff($startTime, microtime()) < $perc) {
            $microtime = microtime();
            $time = self::microtime_diff($startTime, $microtime);
            if ($a[$time] == true) {
                echo ($time*10).'%';
                echo '===';
                $a[$time] = false;
            }else{
                if($time == $perc){
                    echo ']';
                    echo PHP_EOL.PHP_EOL;
                    echo '100%';
                    echo PHP_EOL.PHP_EOL;
                }
            }
            
        }
    }

}

$class = new \progressBar();
$class->render(10);