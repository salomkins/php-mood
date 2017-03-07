<?php

class CoreLib {

    public function runController($uri){
        $routes = include '../config/routes.config.php';
        if (isset($routes[$uri])) {
            include '../controllers/' . $routes[$uri] . '.ctrl.php';
            $ctrl = ucfirst($routes[$uri]) . 'Ctrl';
            call_user_func(array($ctrl, $routes[$uri] . 'Controller'), $routes[$uri] . 'Controller');
        } else {
            echo '404';
        }


    }

}

 ?>
