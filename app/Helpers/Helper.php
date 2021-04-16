<?php
//use Vinkla\Hashids\Facades\Hashids;
use Carbon\Carbon;

function encodeId($id) {
    return (new Vinkla\Hashids\Facades\Hashids)->encode($id,20,15,1,3);
}

//Change date to human readable
function humanDate($date) {
    if(!is_null($date)) {
        return date('d M, Y', strtotime($date));
    }
    return null;
}

/*
 * Format a datepicker date to mysql format YYYY-mm-dd
 */
function date_to_mysql($date)
{
    if(!is_null($date)) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    return null;
}

//Change date to human readable
function humanDateTime($date) {

    if(!is_null($date)) {
        return date('d M, y : H:i ',strtotime($date));
    }
    return null;
}

/**
 * Calculate total hours between two times
 * @param $time1
 * @param $time2
 * @return false|float
 */
function totalHours($time1,$time2) {

    $time1 = strtotime($time1);
    $time2 = strtotime($time2);

    $interval = round(abs($time2 - $time1)/3600,2);

    $hours = floor($interval);

    $minutes = round(($interval - $hours)*60);

    return $hours.'.'.$minutes;
}

/**
 * Format time
 * @param $time
 * @return false|string
 */
function timeFormat($time) {
    return date('H:i', strtotime($time));
}

/**
 * Convert time to human readable
 * @param $timestamp
 * @return string
 */
function age($timestamp){
    //date_default_timezone_set("Asia/Kolkata");
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60){
        return "Just Now";
    } else if ($minutes <= 60){

        if ($minutes == 1){
            return "1 min";
        } else {
            return "$minutes mins";
        }

    } else if ($hours <= 24){

        if ($hours == 1){
            return "1 hr";

        } else {
            return "$hours hrs";
        }

    } else if ($days <= 7){

        if ($days == 1){
            return "yesterday";

        } else {
            return "$days days";
        }

    } else if ($weeks <= 4.3){

        if ($weeks == 1){
            return "a week ago";
        } else {
            return "$weeks weeks";
        }

    } else if ($months <= 12){

        if ($months == 1){
            return "a month ago";

        } else {
            return "$months months";
        }

    } else {

        if ($years == 1){
            return "one yr";

        } else {
            return "$years yrs";
        }
    }
}

/**
 * Convert file size to human readable
 * @param $size
 * @param int $decimals
 * @return string
 */
function humanFilesize($size, $decimals = 2){
    $units = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;
    while(($size/$step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $decimals).' '.$units[$i];
}


/**
 * Get date only from datetime value
 * @param $date
 * @return Carbon|false
 */
function formatDate ($date)
{
    return Carbon::createFromFormat('Y-m-d',$date);
}



