<?php


namespace Ino\Auth;


interface UserProvider
{
    /**
     * @param $id
     * @return User|null
     */
    public function getUserById($id): ?User;

    /**
     * @param $login
     * @return User|null
     */
    public function getUserByLogin($login): ?User;

    /**
     * @param User $user
     * @return void
     */
    public function saveUser(User $user): void;

    /**
     * @param $id
     * @return boolean
     */
    public function isUserExists($id): bool;

    public function getAllUsers(): array;
}
