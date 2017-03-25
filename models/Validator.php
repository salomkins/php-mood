<?php

class Validator{

    public $formErrors = [];

    public function validate($post, $validators){

        foreach ($validators as $key => $val) {
            $validators = explode("|", $val);
            if (in_array("required", $validators) && empty($post[$key])) {
                $this->formErrors["required_" . $key] = $key . " required";

            } else if (in_array("email", $validators) && !filter_var($post[$key], FILTER_VALIDATE_EMAIL)) {
                $this->formErrors["incorrect_" . $key] = $key . " incorrect";
            }
        }

    }

    public function getAllErrorMessages(){
        return $this->formErrors;
    }

    public function isValid(){
        if ($this->formErrors) {
            foreach ($this->formErrors as $logs) {
                error_log(date("Y-m-d H:i:s") . ' ', 3, "../db/cm-errors.log");
                error_log($logs . "\n", 3, "../db/cm-errors.log");
            }
            return false;
        }
        return true;
    }

}

?>