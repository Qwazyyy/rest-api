<?php
    header('Content-type: application/json');
    
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include_once('Services/jsoninput.php');

    include_once('Services/FilmService.php');
    include_once('Services/ActorService.php');
    include_once('Services/GenreService.php');

    include_once('Services/Connection.php');
    include_once('Services/UrlService.php');


    include_once('Repositories/FilmRepository.php');
    include_once('Repositories/ActorRepository.php');
    include_once('Repositories/GenreRepository.php');

    include_once('Controllers/ActorController.php');
    include_once('Controllers/FilmController.php');
    include_once('Controllers/GenreController.php');
    include_once('Controllers/Controller.php');
    
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $parameters = UriService::getUriParameters();
    echo Controller::callEntityController($requestMethod, $parameters);