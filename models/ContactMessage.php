<?php

class ContactMessage {

    private $data = [];
    private $file = '';


    function save() {

        $row = json_encode($this->data);
        $row .= "\n";


            if(!is_dir('../db/')) {
                mkdir('../db/');
            }
        file_put_contents('../db/' . $this->file, $row, FILE_APPEND);
    }

    function setDb($file, $data) {
        $this->data = $data;
        $this->file = $file;
    }

    static function create($row) {
        $cm = new self;
        if (!is_array($row)) {
            $row = json_decode($row, true);
        }
        $cm->name = $row['fname'];
        $cm->email = $row['email'];
        $cm->message = $row['textarea'];

        return $cm;
    }

    static function getById($row_nr) {
        $cur_row = 1;
        $is_found = false;
        $fp = fopen('../db/messages.txt', 'r');
        if ($fp) {
            while ($row = fgets($fp)) {
                if ($cur_row === $row_nr) {
                    $is_found = true;
                    break;
                }
                $cur_row++;
            }
            fclose($fp);
        } else {
            echo 'error';
        }

        if ($is_found) {
            $cm = self::create($row);
            return $cm;
        }
        return false;
    }

    static function getAll($order) {
        $content = file_get_contents('../db/messages.txt');
        $rows = explode("\n", $content);
        $rows_count = count($rows) - 1;

        $collection = [];

        for($k = 0; $k < $rows_count; $k++) {
            $collection[] = self::create($rows[$k]);
        }

        if ($order === 'DESC') {
            return array_reverse($collection);
        } else {
            return $collection;
        }
    }


}

 ?>
