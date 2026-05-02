<?php

namespace model\Manager;
use model\Abstract\AbstractManager;
class ConnectionManager extends AbstractManager
{
    public function logoutUser() : void
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    public function loginUser(array $userData) : bool
    {
        $stmt = $this->db->prepare("SELECT * FROM school_users WHERE user_name = :name");
        $stmt->execute(['name' => $userData['user_name']]);
        $user = $stmt->fetch();
        if($user && password_verify($userData['user_pass'], $user['user_pass']))
        {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['user_role'] = $user['user_role'];
            return true;
        }

        return false;
    }
    
}