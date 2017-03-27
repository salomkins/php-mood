<?php

include '../functions/html.lib.php';

class HomeController {

public function index() {
    global $app;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $asd = HomeController::postContactUs($_POST);
    }

    $menu_lang = include '../lang/' . $app->getLocale() . '/menu.lang.php';
    $menu_cfg = include '../config/menu.config.php';

    include '../views/layouts/_html.view.php';
}


public function postContactUs(array $contact_message) {
    global $APP;
    if($_SERVER["REQUEST_METHOD"] === "POST") {

        include '../classes/Validator.php';
        $validator = new Validator;
        $validator->validate($_POST, [
            "fname" => "required",
            "email" => "required|email",
            "textarea" => "required"
        ]);


        if($validator->isValid()) {
            include '../models/ContactMessage.php';
            $row = [
               'fname' => $_POST["fname"],
               'email' => $_POST["email"],
               'textarea' => $_POST["textarea"],
            ];
            $cm = new ContactMessage;
            $cm->setDb('messages.txt', $row);
            $cm->save();
        } else {
            $APP['FORM_ERROR'] = $validator->getAllErrorMessages();
        }
    }

}

}

 ?>
