<?php
session_start();

if(empty($_SESSION['sites'])) {
    $_SESSION['sites'] = array();
}

if(!isset($_GET['site'])) {
    print_r($_SESSION['sites']);
    $_SESSION['sites'] = array();
    return;
} else {
    $site = trim($_GET['site']);

    if(!in_array($site, $_SESSION['sites'])) {
        array_push($_SESSION['sites'], $site);
    }
}




?>
