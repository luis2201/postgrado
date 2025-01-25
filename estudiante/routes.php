<?php

session_start();

include_once "utils/defaults.php";
include_once "config/site.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Estudiante.php";
include_once "models/Periodo.php";
include_once "models/Calificaciones.php";

$controller = ucfirst($_GET['controller']);

if(!file_exists("./controllers/".$controller."Controller.php")){
    $controller = "error";
}

if(!isset($_SESSION['EstudianteID'])){
    $controller = "login";
}

$action = $_GET['action'];
$id = $_GET['id'];

if (empty($action))
    $action = "index";

$ctrlName = ucfirst($controller) . "Controller";

include "./controllers/$ctrlName.php";
$ctrl = new $ctrlName;
$ctrl->{$action}($id);
