<?php

namespace Ino\Auth;


interface AuthenticationManager
{
    /**
     * @return User
     */
    public function getAuthenticatedUser();

    /**
     * @param User $user
     */
    public function setAuthenticatedUser(User $user): void;
}
