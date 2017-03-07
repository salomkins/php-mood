<?php

class HtmlLib{

    public function createAttrStr($classes)
    {

        if (empty($classes)) {
            return '';
        }


        $res = 'class="';
        foreach ($classes as $class) {
            $res .= $class . ' ';
        }
        $res .= '" ';

        return $res;
    }


    public function renderNav($menu_lang, $menu_cfg)
    {
        $res = '';
        $sk = 0;
        foreach ($menu_lang as $key => $menu_item) {
            $classes = [];

            if ($sk === 0) {
                $classes[] = 'navi active';
            } else {
                $classes[] = 'navi';
            }

            $res .= '<a href=' . $menu_cfg[$key] . ' ' . HtmlLib::createAttrStr($classes) . ' title="' . $menu_lang[$key] . '">' . $menu_lang[$key] . '</a>';
            $sk++;
        }
        return $res;
    }

}

 ?>
