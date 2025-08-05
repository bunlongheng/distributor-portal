<?php

class FileHelper {

public static function formatBytes($size, $precision = 2)
{
    $base = log($size) / log(1024);
    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}


}

// How to use 


/*

echo formatBytes(24962496);
// 23.81M

echo formatBytes(24962496, 0);
// 24M

echo formatBytes(24962496, 4);
// 23.8061M


*/