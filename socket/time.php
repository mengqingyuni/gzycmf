<?php
/**
 * Created by time.php.
 * User: gongzhiyang
 * Date: 18/12/10
 * Time: 12:40 上午.
 */

//循环执行
swoole_timer_tick(2000, function ($timer_id) {
    echo "执行$timer_id \n";
    swoole_timer_after(14000, function () {
        echo "after 14000ms.\n";
    });
});

//单次执行
swoole_timer_after(3000, function () {
    echo "3000后执行 \n";
});

var_dump(swoole_timer_clear($timer_id));
var_dump($timer_id);
