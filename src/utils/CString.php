<?php
namespace src\utils;

class CString {

    public static function removeUnicodeSymbols($text) {
        // Match Emoticons
        $text = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $text);
        // Match Miscellaneous Symbols and Pictographs
        $text = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $text);
        // Match Transport And Map Symbols
        $text = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $text);
        // Match Miscellaneous Symbols
        $text = preg_replace('/[\x{2600}-\x{26FF}]/u', '', $text);
        // Match Dingbats
        $text = preg_replace('/[\x{2700}-\x{27BF}]/u', '', $text);
        return $text;
    }

    public static function removeUnicodeSpace($text, $strict = FALSE, $multiline = FALSE) {
        $text = preg_replace("/^\ +/", "", $text);
        $text = preg_replace("/^\ +$/", "", $text);

        $text = ($strict == TRUE) ? preg_replace("/\ {2,}/", "  ", $text) : $text;

        $text = ($multiline == TRUE) ? preg_replace("/(?:\r\n|\r|\n)/", "\\n", $text)
            .preg_replace("/(^\\n+)/", "", $text)
            .preg_replace("/([(\\\\n+)]{3,})/m", "\\n\\n", $text)
            .rtrim($text, "\\n") : $text;

        return $text;
    }
}