<?php


namespace Ino\Auth;


interface UserTokenProvider
{
    public function verifyToken($userId, string $token): bool;
    public function generateToken($userId): string;
}