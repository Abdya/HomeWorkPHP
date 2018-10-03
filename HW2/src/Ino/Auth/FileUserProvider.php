<?php


namespace Ino\Auth;


class FileUserProvider implements UserProvider
{
    /**
     * @var string
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param $id
     * @return User
     */
    public function getUserById($id): User
    {
        $filename = $this->path . "/$id.json";

        if (file_exists($filename)) {
            $tmp_login = file_get_contents($filename);
            $tmp_login = json_decode($tmp_login, true);
            return $tmp_login;
        }

        return null;
    }

    /**
     * @param User $user
     * @return void
     */
    public function saveUser(User $user): void
    {
        // TODO: Implement saveUser() method.
    }

    /**
     * @param $id
     * @return boolean
     */
    public function isUserExists($id): bool
    {
        // TODO: Implement isUserExists() method.
    }
}