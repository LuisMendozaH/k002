<?php
namespace src\controllers;

interface View {
    function render($view, $data = NULL);
}
/**
 * ViewController class
 * @author Luis Antonio <luis.antonioxyz@gmail.com>
 */

class ViewController implements View {

    /**
     * Load a new view and replace data on it
     *
     * @param string $view
     * @param array $data
     */
    public function render($view, $data = NULL) {
        $template_path = "../templates/";
        $template_file = $template_path . $view;

        $file = file_exists($template_file) ? file_get_contents($template_file) : NULL;
        $template = $file;

        if ($template !== NULL) {
            if ($data !== NULL) {
                if (preg_match_all('/{{(.*?)\.(.*?)}}/', $template, $match)) {
                    $template = self::replaceContent($template, $data, $match);
                } else {
                    $template = $template;
                }
            }
        }
        $output = (ENVIRONMENT !== 'development') ? $template : preg_replace('/\t|\n|\s\s\s\s/', '', $template);
        print $output;
    }

    /**
     * Replace the content inside the view
     * @param string $view
     * @param array $data
     * @param string $match
     * @return string returns the view with the replaced data
     */
    private static function replaceContent($view, $data, $match) {
        foreach ($match[1] as $key => $value) {
            if (array_key_exists($match[2][$key], $data[$match[1][$key]])) {
                $view = preg_replace('/{{(' . $match[1][$key] . ').(' . $match[2][$key] . ')}}/', $data[$match[1][$key]][$match[2][$key]], $view);
            } else {
                $view = $view;
            }
        }
        return $view;
    }

}