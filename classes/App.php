<?php

  // classes/App.php

  // localhost/

class App {

    public $loadedConfigs = [];
    public $currentLocale = '';

    function getConfig($path) {
        $parts = explode('.', $path);
        if (!isset($this->loadedConfigs[$parts[0]])) {
            $file_path = '../config/'.$parts[0].'.config.php';
            $this->loadedConfigs[$parts[0]] = include($file_path);
        }
        return $this->loadedConfigs[$parts[0]][$parts[1]];
    }

    function getSupportedLocales() {
        $locales = $this->getConfig('app.supported_locales');
        $locales[] = $this->getConfig('app.default_locale');
        return $locales;
    }

    function getDefaultLocale() {
        return $this->getConfig('app.default_locale');
    }

    function setLocale() {
        $locale = $this->getLocaleFromURL();
        if ($locale === false) {
            $user_locale = $this->getUserLocale();
            if ($user_locale && $this->isLocaleSupported($user_locale)) {
                $this->currentLocale = $user_locale;
            } else {
                $this->currentLocale = $this->getDefaultLocale();
            }
        } else {
            $this->currentLocale = $locale;
        }
    }

    function getLocale() {
        return $this->currentLocale;
    }

    function isLocaleSupported($locale) {
        return in_array($locale, $this->getSupportedLocales());
    }

    function getUserLocale() {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        }
        return false;
    }

    function getLocaleFromURL() {
        if (isset($_GET['lang'])) {
            $locale = $_GET['lang'];
            if (in_array($locale, $this->getSupportedLocales())) {
                return $locale;
            }
            return $this->getDefaultLocale();
        }
        return false;
    }

}
 ?>
