<?php
class Util {
    public static function sanitizeUserInput($input) {
        return trim(stripslashes(htmlspecialchars($input)));
    }
}