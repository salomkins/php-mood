<?php

include '../functions/html.lib.php';

class HomeCtrl {

public function homeController() {
    global $app;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $asd = HomeCtrl::postContactUs($_POST);
    }

    $menu_lang = include '../lang/' . $app->getLocale() . '/menu.lang.php';
    $menu_cfg = include '../config/menu.config.php';

    include '../views/layouts/_html.view.php';
}


public function postContactUs(array $contact_message) {
    global $APP;
    $email = $contact_message['email'] ?? '';
    $name = $contact_message['fname'];
    $message = $contact_message['textarea'];
    $errors = [
        'E-mail field left blank',
        'Invalid e-mail',
        'Name field left blank',
        'No message received'
    ];

    if ($email === '') {
        $APP['FORM_ERROR']['email'] = $errors[0];
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $APP['FORM_ERROR']['invalidemail'] = $errors[1];
    }
    if ($name === '') {
        $APP['FORM_ERROR']['name'] = $errors[2];
    }

    if ($message === '') {
        $APP['FORM_ERROR']['message'] = $errors[3];
    }

    if (isset($APP['FORM_ERROR'])) {
        foreach($APP['FORM_ERROR'] as $logs) {
            error_log(date("Y-m-d H:i:s") . ' ', 3, "../db/cm-errors.log");
            error_log($logs . "\n", 3, "../db/cm-errors.log");
        }

    } else {
        include '../models/ContactMessage.php';
        $cm = new ContactMessage;
        $cm->name = htmlspecialchars($name);
        $cm->email = htmlspecialchars($email);
        $cm->message = htmlspecialchars($message);
        $cm->save();
    }

}

}

 ?>
