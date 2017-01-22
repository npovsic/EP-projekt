<?php

class Hash {

    private static $salt = '$2a$07$4380348hvnjkjvernjk4uoigvdsbvdsboew23weivojkvfjq';

    public static function hashPassword($input) {
        return crypt($input, self::$salt);
    }

    public static function comparePasswords($input, $hashed_password) {
        if(!isset($input) || !isset($hashed_password) || empty($input) || empty($hashed_password)) return false;

        if (hash_equals($hashed_password, crypt($input, $hashed_password))) {
            return true;
        }
        else {
            return false;
        }

    }

}
