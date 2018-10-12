<?php


namespace Ino\Auth;


class User implements \JsonSerializable
{
    public const ROLE_ADMIN = "admin";

    public const ROLE_USER = "user";

    /**
     * @var mixed
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $passwordHash;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $role;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var string
     */
    private $timeReg;

    /**
     * @var string
     */
    private $timeEdit;

    /**
     * @var string
     */
    private $token;

    /**
     * @var integer
     */
    private $expireDate;

    /**
     * @var string
     */
    private $timeLogin;

    public function __construct(?string $login, ?string $email, ?string $name)
    {
        $this->login = $login;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function updateLoginTime(): void
    {
        $this->timeLogin = gmdate("Y-m-d H:i:s");
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @param string $passwordHash
     */
    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function isMatchingPassword(string $password): bool
    {
        return verify_the_fucking_password($password, $this->passwordHash);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getTimeReg(): ?string
    {
        return $this->timeReg;
    }

    /**
     * @param string $timeReg
     */
    public function setTimeReg(string $timeReg): void
    {
        $this->timeReg = $timeReg;
    }

    /**
     * @return string
     */
    public function getTimeEdit(): ?string
    {
        return $this->timeEdit;
    }

    /**
     * @param string $timeEdit
     */
    public function setTimeEdit(string $timeEdit): void
    {
        $this->timeEdit = $timeEdit;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getExpireDate(): int
    {
        return (int)$this->expireDate;
    }

    /**
     * @param int $expireDate
     */
    public function setExpireDate(int $expireDate): void
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return string
     */
    public function getTimeLogin(): ?string
    {
        return $this->timeLogin;
    }

    /**
     * @param string $timeLogin
     */
    public function setTimeLogin(string $timeLogin): void
    {
        $this->timeLogin = $timeLogin;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "login" => $this->login,
            "pass" => $this->passwordHash,
            "name" => $this->name,
            "email" => $this->email,
            "time_reg" => $this->timeReg,
            "role" => $this->role,
            "active" => $this->active,
            "time_edit" => $this->timeEdit,
            "token" => $this->token,
            "expire_date" => $this->expireDate,
            "time_login" => $this->timeLogin,
        ];
    }


}