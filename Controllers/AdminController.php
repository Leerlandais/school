<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;

class AdminController extends Abstract\AbstractController
{
    public function adminControls() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);
        echo $this->twig->render('private/private.admin.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage
        ]);
    }
}