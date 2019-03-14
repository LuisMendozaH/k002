<?php
namespace src\translate;

/**
 * Translate class
 * @author Luis Antonio <luis.antonioxyz@gmail.com>
 */

class Translate {
    public $translations = [];

    protected function loadStringFromXMLFile($path) {
        $xml = simplexml_load_file($path);
        $i = 0;
        foreach ($xml->children() as $child) {
            $string_tag_value = ((string) $xml->string[$i]);
            $attributes = $child->attributes();
            $attributes_name = (string) $attributes["name"];
            $this->translations["{$attributes_name}"] = $string_tag_value;
            $i++;
        }
        return $this->translations;
    }
}