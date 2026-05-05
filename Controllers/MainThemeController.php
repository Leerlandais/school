<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;

class MainThemeController extends Abstract\AbstractController
{
    public function addMainTheme() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);

        echo $this->twig->render('private/theme.addMain.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage
        ]);
    }
}