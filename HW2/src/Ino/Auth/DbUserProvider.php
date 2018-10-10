<?php


namespace Ino\Auth;


class DbUserProvider implements UserProvider
{
    /**
     * @var \PDO
     */
    private $link;

    public function __construct(\PDO $link)
    {
        $this->link = $link;
    }

    public function getUserById($id): ?User
    {
        $stmt = $this->link->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindValue(":id", $id);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "Ino\Auth\User");
        $user = $stmt->fetchAll();
        if ($user === false) {
            return null;
        }
        return $user;
    }

    public function saveUser(User $user): void
    {
        // TODO: Implement saveUser() method.
    }

    public function isUserExists($id): bool
    {
        // TODO: Implement isUserExists() method.
    }

    public function getAllUsers(): array
    {
        // TODO: Implement getAllUsers() method.
    }


}