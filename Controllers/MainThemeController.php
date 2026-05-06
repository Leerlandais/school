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
           $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
           $cleanedData = $this->preparePostData($_POST);
           die(var_dump($cleanedData));
        }
        echo $this->twig->render('private/theme.addMain.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "csrfToken" => $this->csrfToken
        ]);
    }
}