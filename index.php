<?php 

    header('Content-Type: text/html; charset=utf-8');

    session_name("sicae");
    session_cache_expire(480);
    session_start();
    
    // System Vars
    define('HTTP',(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'http') . '://' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
    // Cache Vars
    define('PATH',__DIR__ . '/');

    
    $route = (isset($_GET['route']) && !empty($_GET['route'])) ? $_GET['route'] : 'login';
    $route = file_exists('pages/'.$route.'.php') ? $route : '404';

    include './pages/includes/header.php';
    include './pages/'.$route.'.php';
    include './pages/includes/footer.php';

?>