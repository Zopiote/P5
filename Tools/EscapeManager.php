<?php

class EscapeManager {

    public static function clean($params) {

        $params = htmlspecialchars($params);
        $params = addslashes($params);

        return $params;
    }
}