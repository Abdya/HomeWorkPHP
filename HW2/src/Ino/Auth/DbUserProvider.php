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
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "Ino\Auth\User", [null, null, null]);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user === false) {
            return null;
        }
        return $user;
    }

    public function getUserByLogin($login): ?User
    {
        $sql = $this->link->prepare("SELECT * FROM users WHERE login = :login");
        $sql->bindValue(":login", $login);
        $sql->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "Ino\Auth\User", [null, null, null]);
        $sql->execute();
        $user = $sql->fetch();
        return $user !== false ? $user : null;
    }

    public function saveUser(User $user): void
    {
        if ($user->getId() === null) {
            $sql = $this->link->prepare("INSERT INTO users SET login = :login, passwordHash = :passwordHash, `name` = :name, email = :email, timeReg = :timeReg, role = :role, active = :active, timeEdit = :timeEdit, token = :token, FROM_UNIXTIME(expireDate = :expireDate), timeLogin = :timeLogin");
            $this->populateSqlUserData($user, $sql);
            $sql->execute();
            $user->setId($this->link->lastInsertId());
        } else {
            $sql = $this->link->prepare("UPDATE users SET login = :login, passwordHash = :passwordHash, `name` = :name, email = :email, timeReg = :timeReg, role = :role, active = :active, timeEdit = :timeEdit, token = :token, expireDate = FROM_UNIXTIME(:expireDate), timeLogin = :timeLogin WHERE id = :id");
            $sql->bindValue(":id", $user->getId());
            $this->populateSqlUserData($user, $sql);
            $sql->execute();
        }
    }

    private function populateSqlUserData(User $user, \PDOStatement $sql): void
    {
        $sql->bindValue(":login", $user->getLogin());
        $sql->bindValue(":passwordHash", $user->getPasswordHash());
        $sql->bindValue(":name", $user->getName());
        $sql->bindValue(":email", $user->getEmail());
        $sql->bindValue(":timeReg", $user->getTimeReg());
        $sql->bindValue(":role", $user->getRole());
        $sql->bindValue(":active", (int)$user->isActive());
        $sql->bindValue(":timeEdit", $user->getTimeEdit());
        $sql->bindValue(":token", $user->getToken());
        $sql->bindValue(":expireDate", $user->getExpireDate());
        $sql->bindValue(":timeLogin", $user->getTimeLogin());
    }

    public function isUserExists($login): bool
    {
        return $this->getUserByLogin($login) !== null;
    }

    public function getAllUsers(): array
    {
        $stmt = $this->link->prepare('SELECT * FROM users');
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "Ino\Auth\User", [null, null, null]);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
