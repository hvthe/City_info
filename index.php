<?php
require_once 'model/DBconnection.php';
require_once 'model/cityModel.php';
require_once 'model/cityDB.php';
require_once 'model/countryModel.php';
require_once 'model/countryDB.php';
require_once 'model/peopleModel.php';
require_once 'model/peopleDB.php';
require_once 'controller/cityController.php';
require_once 'controller/countryController.php';
require_once 'controller/peopleController.php';

use Controller\CityController;
use Controller\CountryController;
use Controller\PeopleController;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>City</title>
</head>

<body>
    <div class="main border border-primary">
    <?php
    include './view/sidebar.php';
    if(isset($_GET['view'])){
        $view = $_GET['view'];
        switch($view){
            case 'city': $controller = new CityController; break;
            case 'country': $controller = new CountryController; break;
            case 'people': $controller = new PeopleController; break;
            // default : echo 'error';
        }
        try {
            if($view != 'city' && $view != 'country' && $view != 'people'){
                throw new Exception('Not Found');
            }
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                switch ($page) {
                    case 'add':
                        $controller->add();
                        break;
                    case 'detail':
                        $controller->detail();
                        break;
                    case 'edit':
                        $controller->edit();
                        break;
                    case 'delete':
                        $controller->remove();
                        break;
                    case 'search':
                        $controller->search();
                        break;
                    default:
                        $controller->notFound();
                }
            }else {
                $controller->home();}
        }
        catch (Exception $e) {
            $message = $e->getMessage();
           include './view/notFound.php';
        }
        

    }else if(empty($_GET)){
        $controller = new CityController;
        $controller->home();
    }else{include './view/notFound.php';}

    // if(isset($_GET['view'])){
    //     $view = $_GET['view'];
    //     // $controller = new CityController;
    //     if($view == 'city'){
    //         $controller = new CityController;
    //     }
    //     if($view == 'country'){
    //         $controller = new CountryController;
    //     }
    //     if($view == 'people'){
    //         $controller = new PeopleController;
    //     }
    //     try {
    //         if($view != 'city' && $view != 'country' && $view != 'people'){
    //             throw new Exception('error');
    //         }
    //     }
    //     catch (Exception $e) {
    //        include './view/notFound.php';
    //     }
        // $viewController = "{$view}Controller";
        // $controller = new $viewController;
    // }else{
    //     $controller = new CityController;
    // }
    // if(isset($controller)){
    //     if (isset($_GET['page'])) {
    //         $page = $_GET['page'];
    //         switch ($page) {
    //             case 'add':
    //                 $controller->add();
    //                 break;
    //             case 'detail':
    //                 $controller->detail();
    //                 break;
    //             case 'edit':
    //                 $controller->edit();
    //                 break;
    //             case 'delete':
    //                 $controller->remove();
    //                 break;
    //             case 'search':
    //                 $controller->search();
    //                 break;
    //             default:
    //             $controller->notFound();
    //         }
    //     } else $controller->home();
    // }
    
    ?>
    </div>
</body>
<script src="./view/main.js"></script>
</html>