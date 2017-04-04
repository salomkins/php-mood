<?php

class CoreLib {

    public static function runController($uri){
        $routes = include '../config/routes.config.php';
        $split = explode("@", $routes[$uri]);
        $controller = $split[0];
        $method = isset($split[1]) ? $split[1]:'index';

        if(file_exists('../controllers/' . $controller . '.php')) {
            include '../controllers/' . $controller . '.php';
            if(method_exists($controller, $method)) {
                call_user_func(array($controller, $method));
            } else {
                echo '404';
            }
        } else {
            echo '404';
        }


    }

}

 ?>
