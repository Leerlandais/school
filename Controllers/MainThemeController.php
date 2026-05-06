<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use Twig\Environment;

class MainThemeController extends Abstract\AbstractController
{
    private Main
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
    }
    public function addMainTheme() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);


        if(isset($_POST["unset:addTheme"])) {
           $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
           $cleanedData = $this->preparePostData($_POST);

        }
        echo $this->twig->render('private/theme.addMain.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "csrfToken" => $this->csrfToken
        ]);
    }
}