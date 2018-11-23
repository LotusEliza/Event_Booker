<?php

/*
 * подключить бд
 * решить использовать конроллеры или нет
 */

require_once 'main.php';

error_reporting(E_ALL);

$params = [];
if(isset($_GET['page'])){ //mod_rewrite teper vse prihodit v index
    $params = explode('/', $_GET['page']);//razrivaem stroku po slesham
    if(count($params) == 0){
        $params[] = 'index';
    }
}
else
    $params[] = 'index';


$controller_name = array_shift($params);
$class = $controller_name.'Controller'; //addController
$controller_path = './controllers/'.$class.'.php';

if(file_exists($controller_path)) {
    include $controller_path;
    $worker = new $class;
    $worker->action($params);
} else {
    echo 'not found';
}

?>

