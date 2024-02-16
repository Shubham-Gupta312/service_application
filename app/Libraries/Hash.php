<?php

namespace App\Libraries;

class Hash
{
    public static function pass_enc($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }


}

