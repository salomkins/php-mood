<?php

class AdminCtrl{

    public $messages = '';

    function adminController() {

        include '../models/ContactMessage.php';

        $messages = ContactMessage::getAll('DESC');

        include '../views/admin/admin.view.php';

    }

}

 ?>
