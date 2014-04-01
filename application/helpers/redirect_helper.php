<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('time2date')) {
    /*
     * UNIX时间戳转换为实体日期
     * @param int 时间戳
     * @return string 日期
     */

    function time2date($time, $is_only_date = 0) {
        if (1 === $is_only_date) {
            $format = 'Y-m-d';
        } else {
            $format = 'Y-m-d H:i:s';
        }
        return date($format, $time);
    }

}
if (!function_exists('date2time')) {
    /*
     * 实体日期转换为UNIX时间戳
     * @param string 日期 例2012-10-05-14-20-59
     * @return int 时间戳
     */

    function date2time($date) {

        $dates = explode('-', $date);
        return @mktime($dates[3], $dates[4], $dates[5], $dates[1], $dates[2], $dates[0]);
    }

}
if (!function_exists('dump')) {
    /*
     * 调试输出
     */

    function dump($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

}

if (!function_exists('sec2day')) {
    /*
     * 秒转化天
     */

    function sec2day($sec_num) {
        return $sec_num / 24 / 3600;
    }

}

if (!function_exists('day2sec')) {
    /*
     * 天转化秒
     */

    function day2sec($day_num) {
        return $day_num * 24 * 3600;
    }

}

if (!function_exists('message')) {
    /*
     * 信息提示跳转
     * @param   标题
     * @param   内容
     * @param   跳转目标
     * @param   跳转延时
     */

    function message($title, $content, $target_url, $delay_time = 3) {
        $_CI = &get_instance();
        $_CI->load->view('redirect_tip', array(
            'title' => $title,
            'content' => $content,
            'target_url' => $target_url,
            'delay_time' => $delay_time
        ));
    }

}