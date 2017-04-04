<?php

class AdminController{

    public $messages = '';

    public static function index() {

        include '../models/ContactMessage.php';

        $messages = ContactMessage::getAll('DESC');

        include '../views/admin/admin.view.php';

    }

}

 ?>
