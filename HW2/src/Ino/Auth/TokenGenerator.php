<?php


namespace Ino\Auth;


class TokenGenerator
{
    public function generateToken($userId)
    {
        $num = random_int(1, 64);
        $token = password_hash($userId . $num, PASSWORD_BCRYPT);
        return $token;
    }
}