<?php

namespace Ino\Core;


use Ino\Auth\FileUserProvider;
use Ino\Auth\FileUserTokenProvider;
use Ino\Auth\UserProvider;
use Ino\Auth\UserTokenProvider;

class Registry
{
    public static function getUserProvider(): UserProvider
    {
        return new FileUserProvider(USERS_DIR);
    }

    public static function getUserTokenProvider(): UserTokenProvider
    {
        return new FileUserTokenProvider(TOKEN_DIR, 3600 * 24 * 7);
    }
}
