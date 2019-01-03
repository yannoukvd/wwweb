<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once("palette.php");

if(isset($_POST['submit'])){

	// Page ID
    $pageId = $_SESSION['pageId'] = $_POST['facebook'];

    // User Access Token
    //$token = $_SESSION['token'] = "EAANWQ8BRlJUBANnZBWdAA4ZBZBnVL8dh8YPAjyXsNlxgT5oO78iIqL8JhJgFVkq1lwNwnvCOiQAw9IxEsENDJjyagfp15VYE3BWMNZBmbd90UIZASI6wbh8kus24DrDFegAC8HpnpeIRLTYp2G8tB9jhgNbF8yAsZD";
    $token = $_SESSION['token'];
    // = "EAAPuDsVwNpUBAFyxTnWNe8ngZAZBhWaZCz7aFEF7LXQ97zLhLIbZCTimEA33qDg9gFczJKCCBPsH1zmRzKIE8PtcZAaLtH6cczhkFt6hNPDvSewFndYiyPRJtJZAKNK4gSwT8Y7oE4lZChABZA6TjUAsJ2VdxGOcO92pB2QEsemlFJfGjbCxCoqER9u20Qgy8e6gIonfOJcfQGrchZBcWl4ZBx";

    // Page Feed + Name + Profile Picture + CoverId + About/Description
    $fieldsFeed = "feed.limit(10){id,message,full_picture,link,name,description,type,icon,created_time,from,object_id,likes,comments}";
    $fieldsEvents = "events.limit(30){name,description,cover,start_time,id}";
    $fieldsPage = "name,picture.width(800),cover.width(1000),about,description";
    $jsonLinkPage = "https://graph.facebook.com/?fields={$fieldsPage},{$fieldsFeed},{$fieldsEvents}&access_token={$token}&ids={$pageId}";
    $jsonPage = file_get_contents($jsonLinkPage);
    $objPage = json_decode($jsonPage, true);

    // Feed obj
    $objFeed = $objPage[$pageId]['feed']['data'];
    $_SESSION['objFeed'] = $objFeed;

    // Event obj
    $objEvents = $objPage[$pageId]['events']['data'];
    $_SESSION['objEvents'] = $objEvents;

    // Page Name
    $_SESSION['name'] = $objPage[$pageId]['name'];

    // Profile Picture
    $_SESSION['profile'] = $objPage[$pageId]['picture']['data']['url'];

    // Page Cover ID
    $coverId = $_SESSION['coverId'] = $objPage[$pageId]['cover']['id'];

    // About / Description
    if(isset($objPage[$pageId]['about'])){
        $_SESSION['about'] = $objPage[$pageId]['about'];
    } elseif(isset($objPage[$pageId]['description'])) {
        $_SESSION['about'] = $objPage[$pageId]['description'];
    } else {
        $_SESSION['about'] = "";
    }

    // Cover        
    $jsonLinkCover = "https://graph.facebook.com/{$coverId}/?fields=images&access_token={$token}";
    $jsonCover = file_get_contents($jsonLinkCover);
    $objCover = json_decode($jsonCover, true);
    $cover = $objCover['images'][4]['source'];
    $_SESSION['cover'] = $cover;

    // Color Palette
    $colors = generateColorPalette($cover);
    $_SESSION['colors'] = $colors;

    $urlHome = "../index.php";
    header('Location: ' . $urlHome);
    
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
        

?>
