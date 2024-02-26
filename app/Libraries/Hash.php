<?php

namespace App\Libraries;

class Hash
{
    const ENCRYPTION_KEY = '1234@Sashi&Silver$@2709';
    public static function pass_enc($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function decode_pass($password, $db_password)
    {
        if (password_verify($password, $db_password)) {
            return true;
        } else {
            return false;
        }
    }

    public static function encryptAadhar($aadhar)
    {
        // Encrypt Aadhar number
        $encryptedAadhar = openssl_encrypt($aadhar, 'AES-256-CBC', self::ENCRYPTION_KEY, 0, substr(md5(self::ENCRYPTION_KEY), 0, 16));

        return $encryptedAadhar;
    }

    public static function decryptAadhar($aadhar)
    {
        // Decryption key (must match the key used for encryption)

        // Decrypt Aadhar number
        $decryptedAadhar = openssl_decrypt($aadhar, 'AES-256-CBC', self::ENCRYPTION_KEY, 0, substr(md5(self::ENCRYPTION_KEY), 0, 16));

        return $decryptedAadhar;
    }
}

