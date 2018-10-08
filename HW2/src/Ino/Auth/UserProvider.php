<?php


namespace Ino\Auth;


interface UserProvider
{
    /**
     * @param $id
     * @return User
     */
    public function getUserById($id): User;

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
