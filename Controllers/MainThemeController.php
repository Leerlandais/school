<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;

class MainThemeController extends Abstract\AbstractController
{
    public function addMainTheme() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);


        if(isset($_POST["unset:addTheme"])) {
            die(var_dump($_POST));
        }
        echo $this->twig->render('private/theme.addMain.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "csrfToken" => $this->csrfToken
        ]);
    }
}