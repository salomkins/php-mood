<?php

// controllers/admin.ctrl.php

class AdminCtrl{

    public $messages = '';

    function admin_controller() {

        include '../models/ContactMessage.php';

        $messages = ContactMessage::getAll();

        include '../views/layouts/admin.view.php';

    }

}
 ?>
