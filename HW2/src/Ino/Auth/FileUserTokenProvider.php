<?php


namespace Ino\Auth;


class FileUserTokenProvider implements UserTokenProvider
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var integer
     */
    private $tokenLifetime;

    public function __construct(string $path, int $tokenLifetime)
    {
        $this->path = $path;
        $this->tokenLifetime = $tokenLifetime;
    }

    public function getTokenFilePath($userId, string $token)
    {
        $token_base64 = base64_encode($token);
        $path = $this->path . "/$userId";

        return $path . "/$token_base64.json";
    }

    public function verifyToken($userId, string $token): bool
    {
        if (!file_exists($this->getTokenFilePath($userId, $token))) {
            return false;
        }

        $creationDate = file_get_contents($this->getTokenFilePath($userId, $token));

        return (time() - $creationDate) < $this->tokenLifetime;
    }

    public function generateToken($userId): string
    {
        $tokenGenerator = new TokenGenerator();
        $token = $tokenGenerator->generateToken($userId);
        $path = $this->getTokenFilePath($userId, $token);

        $dirname = dirname($path);
        if (!file_exists($dirname)) {
            mkdir($dirname, 0777, true);
        }

        $handle = fopen($path, "w+");
        fwrite($handle, time());
        fclose($handle);

        return $token;
    }
}