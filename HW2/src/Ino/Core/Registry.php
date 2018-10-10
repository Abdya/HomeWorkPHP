<?php

namespace Ino\Core;


use Ino\Auth\AuthenticationManager;
use Ino\Auth\FileUserProvider;
use Ino\Auth\FileUserTokenProvider;
use Ino\Auth\SessionAuthenticationManager;
use Ino\Auth\UserProvider;
use Ino\Auth\UserTokenProvider;
use Ino\Auth\DbUserProvider;

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

    public static function getAuthenticationManager(): AuthenticationManager
    {
        return new SessionAuthenticationManager(self::getUserProvider());
    }

    public static function getDbConnection(): \PDO
    {
        $dsn = "mysql:host=localhost;dbname=hw6.local;charset=utf8mb4";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new \PDO($dsn, 'root', '', $options);
            return $pdo;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getDbUserProvider()
    {
        return new DbUserProvider(self::getDbConnection());
    }
}
