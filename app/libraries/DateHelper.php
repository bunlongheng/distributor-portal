<?php

class DateHelper {


public static function getDay($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format('d'); //10
    }
}

public static function getMonth($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format('M'); //SEP
    }
}



public static function getYear($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format('Y');
    }
}

public static function getDateFormat1($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("F j, Y"); // March 10, 2001
    }
}

public static function getDateFormat2($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("m/d/y"); // 10/27/2014
    }
}

public static function getTime($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("g:i A"); 
    }
}

public static function getTime2($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("H:i a"); //17:16 AM
    }
}

public static function getDetail($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("D F j G:i:s a T"); 
    }
}







public static function getDateFormatMySQL($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("Y-m-d"); // 10/27/2014
    }
}

public static function getMonthFormat1($date) {
    if ($date) {
        $dt = new DateTime($date);

        return $dt->format("n"); //1
    }
}

public static function getAgo($date) {

    if ($date) {

        $ts = time() - strtotime(str_replace("-","/",$date)); 

        if($ts>31536000) $val = round($ts/31536000,0).' year'; 
        else if($ts>2419200) $val = round($ts/2419200,0).' month'; 
        else if($ts>604800) $val = round($ts/604800,0).' week'; 
        else if($ts>86400) $val = round($ts/86400,0).' day'; 
        else if($ts>3600) $val = round($ts/3600,0).' hour'; 
        else if($ts>60) $val = round($ts/60,0).' minute'; 
        else $val = $ts.' second'; 

        if($val>1) $val .= 's'; 

        return $val; 


    }

}


public static function day_ago($date) {

    if ($date) {

        $ts = time() - strtotime(str_replace("-","/", $date )); 

        if($ts>31536000) $val = round($ts/31536000,0).' year'; 
        else if($ts>2419200) $val = round($ts/2419200,0).' month'; 
        else if($ts>604800) $val = round($ts/604800,0).' week'; 
        else if($ts>86400) $val = round($ts/86400,0).' day'; 
        else if($ts>3600) $val = round($ts/3600,0).' hour'; 
        else if($ts>60) $val = round($ts/60,0).' minute'; 
        else $val = $ts.' second'; 

        if($val>1) $val .= 's'; 

        return $val; 


    }

}








}

// Format Sample 

$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
$today = date("m.d.y");                         // 03.10.01
$today = date("j, n, Y");                       // 10, 3, 2001
$today = date("Ymd");                           // 20010310
$today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
$today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
$today = date("H:i:s");                         // 17:16:18
$today = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)