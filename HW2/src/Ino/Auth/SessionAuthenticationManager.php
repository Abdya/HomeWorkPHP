<?php


namespace Ino\Auth;


class SessionAuthenticationManager implements AuthenticationManager
{
    /**
     * @var UserProvider
     */
    private $provider;

    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
    }

    public function getAuthenticatedUser(): User
    {
        if (empty($_SESSION["authenticated_user_id"])) {
            return null;
        }

        $userId = $_SESSION["authenticated_user_id"];

        return $this->provider->getUserById($userId);
    }

    public function setAuthenticatedUser(User $user): void
    {
        $_SESSION["authenticated_user_id"] = $user->getId();
    }
}