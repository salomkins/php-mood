<?php

//functions/core.lib.php

class CoreLib {

    public function run_controller($uri){
        $routes = include '../config/routes.config.php';
        if (isset($routes[$uri])) {
            include '../controllers/' . $routes[$uri] . '.ctrl.php';
            $ctrl = ucfirst($routes[$uri]) . 'Ctrl';
            call_user_func(array($ctrl, $routes[$uri] . '_controller'), $routes[$uri] . '_controller');
        } else {
            echo '404';
        }


    }

}



 ?>
