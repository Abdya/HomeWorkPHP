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

    public function getUserFilePath($id): string
    {
        return $this->path . "/$id.json";
    }

    /**
     * @param $id
     * @return User
     */
    public function getUserById($id): User
    {
        $filename = $this->getUserFilePath($id);

        if (file_exists($filename)) {
            $tmp_login = file_get_contents($filename);
            $tmp_login = json_decode($tmp_login, true);
            return $this->mapUser($tmp_login);
        }

        return null;
    }

    public function getUserByLogin($login): ?User
    {
        return $this->getUserById($login);
    }

    /**
     * @param array $userData
     * @return User
     */
    private function mapUser(array $userData): User
    {
        $user = new User($userData["login"], $userData["email"], $userData["name"]);
        $user->setActive($userData["active"]);
        $user->setId($userData["login"]);
        $user->setPasswordHash($userData["pass"]);
        $user->setRole($userData["role"]);
        if (isset($userData["expire_date"])) {
            $user->setExpireDate($userData["expire_date"]);
        }
        if (isset($userData["time_edit"])) {
            $user->setTimeEdit($userData["time_edit"]);
        }
        $user->setTimeLogin($userData["time_login"]);
        $user->setTimeReg($userData["time_reg"]);
        if (isset($userData["token"])) {
            $user->setToken($userData["token"]);
        }
        return $user;
    }

    /**
     * @param User $user
     * @return void
     */
    public function saveUser(User $user): void
    {
        $path = $this->getUserFilePath($user->getId());

        file_put_contents($path, json_encode($user));
    }

    /**
     * @param $id
     * @return boolean
     */
    public function isUserExists($id): bool
    {
        return $this->getUserById($id) !== null;
    }

    public function getAllUsers(): array
    {
        $userList = [];
        foreach (glob($this->path . "/*.json") as $filename) {
            $userData = file_get_contents("$filename");
            $userData = json_decode($userData, true);
            $userList[] = $this->mapUser($userData);
        }
        return $userList;
    }
}