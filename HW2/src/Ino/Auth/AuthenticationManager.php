<?php

namespace Ino\Auth;


interface AuthenticationManager
{
    /**
     * @return User
     */
    public function getAuthenticatedUser(): User;

    /**
     * @param User $user
     */
    public function setAuthenticatedUser(User $user): void;
}