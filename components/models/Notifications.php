<?php

class Notifications {
    static function create($htmlcode, $message) {
        $_SESSION['alert'] = $message;
        $_SESSION['alert_code'] = $htmlcode;
    }

    static function delete() {
        $_SESSION['alert'] = "";
        $_SESSION['alert_code'] = "";
    }
}