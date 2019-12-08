<?php
/**
 * Created by signal.php.
 * User: gongzhiyang
 * Date: 18/12/12
 * Time: 1:39 上午.
 */
swoole_process::signal(SIGALRM, function () {
    static $i = 0;
    echo "$i \n";
    $i++;
    if ($i > 10) {
        swoole_process::alarm(-1);
    }
});

swoole_process::alarm(100 * 1000);
