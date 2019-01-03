<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

    include_once("palette.php");

    // Set default value
    $currentPage = 'home';

    // Change value if `page` is specified
    if(array_key_exists('page', $_GET)) {
        $currentPage = $_GET['page'];
    }

    switch ($currentPage) {
        case 'events':
            return getEvents();
            break;
        
        case 'home':
        default:
            return getIndex();
            break;
    }

    function getIndex()
    {
        if(isset($_SESSION['pageId'])) {
        	return getHome();
        } else {
        	$urlConfig = "config/?p=login";
        	header('Location: ' . $urlConfig);
        }
    }

    function getHome() {

        global $pageTitle;
        global $colors;
        global $cover;
        global $objFeed;
        global $profile;
        global $pageId;
        global $about;
        global $name;
        global $token;

        $pageTitle = "Home";
        $pageId = $_SESSION['pageId'];
        $colors = $_SESSION['colors'];
        $cover = $_SESSION['cover'];
        $objFeed = $_SESSION['objFeed'];
        $profile = $_SESSION['profile'];
        $about = $_SESSION['about'];
        $name = $_SESSION['name'];
        $token = $_SESSION['token'];

    }	

    function getEvents() {

        global $pageTitle;
        global $colors;
        global $cover;
        global $objEvents;
        global $profile;
        global $pageId;
        global $about;
        global $name;

        $pageTitle = "Events";
        $pageId = $_SESSION['pageId'];
        $colors = $_SESSION['colors'];
        $cover = $_SESSION['cover'];
        $objEvents = $_SESSION['objEvents'];
        $profile = $_SESSION['profile'];
        $about = $_SESSION['about'];
        $name = $_SESSION['name'];

    }

    function time_elapsed_string($datetime, $full = false) {

        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
     
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
     
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
     
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function generateColorPalette($image){
        $palette = ColorPalette::GenerateFromUrl($image);
        $colors_all = array_keys($palette);
        $colors = array_slice($colors_all, 0, 5);
        for ($x = 0; $x < count($colors); $x++) {
               $colors[$x] = hexToHsl($colors[$x]);
        }
        usort($colors, function($a, $b) {
            return $a['l'] <=> $b['l'];
        });
        for($x = 0; $x < count($colors); $x++){ 
            $colors[$x]['s'] = $colors[$x]['s'] * 100 . "%";
            $colors[$x]['l'] = $colors[$x]['l'] * 100 . "%";
        }
        return $colors;
    }

    function hexToHsl($hex){
        $hex = "#" . $hex;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        return rgbToHsl($r, $g, $b);
    }

    function rgbToHsl($r, $g, $b) {
        $r /= 255;
        $g /= 255;
        $b /= 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);

        $h = 0;
        $l = ($max + $min) / 2;
        $d = $max - $min;

        if ($d == 0) {
            $h = $s = 0; // achromatic
        } else {
            $s = $d / (1 - abs(2 * $l - 1));

            switch ($max) {
                case $r:
                    $h = 60 * fmod((($g - $b) / $d), 6);
                    if ($b > $g) {
                        $h += 360;
                    }
                    break;

                case $g:
                    $h = 60 * (($b - $r) / $d + 2);
                    break;

                case $b:
                    $h = 60 * (($r - $g) / $d + 4);
                    break;
            }
        }
        return array('h' => round($h, 2), 's' => round($s, 2), 'l' => round($l, 2));
    }