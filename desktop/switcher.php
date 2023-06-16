<?php session_start();

if (isset($_GET['set'])) {
    $_SESSION['css-style-desktop'] = $_GET['set'];
}

if (array_key_exists('HTTP_REFERER', $_SERVER) && $_SERVER['HTTP_REFERER']) {
    $referred = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $referred);
} else {
    $url = 'http://' . $_SERVER['HTTP_HOST'];
    header('Location: ' . $url);
}
