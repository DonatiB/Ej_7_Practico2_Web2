<?php
require_once("functions.php");


if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'home';
}

$paramsURL = explode("/", $action);


switch($paramsURL[0]){
    case'home':
        showHome();
    break;
    case'list':
        showList();
    break;
    case 'verFigura':
        showFiguras($paramsURL[1]);
    break;
    case 'filtrado':
        if(isset($paramsURL[1])){
            showFiltro($paramsURL[1]);   
        }else{
            showHome();
            echo "estamos en la b";
        }               
    break;
    default:
        echo "ERROR";
    break;
}

?>