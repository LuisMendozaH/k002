<?php
namespace src\translate;

/**
 * TraslateManager class
 * @author Luis Antonio <luis.antonioxyz@gmail.com>
 */

class TranslateManager extends Translate {

    private static $languages = ['es', 'en'];

    function __construct() {
    }

    public function initLanguageTranslation($language) {
        $translate = NULL;
        $base_path = "../translations/" . $language . "/strings.xml";
        $translate = $this->loadStringFromXMLFile($base_path);
        return $this->translations;
    }

    public static function newInstance() {
        return new self();
    }

    public function getTranslations() {
        return $this->translations;
    }
}