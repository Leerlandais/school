<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainThemeManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class SubThemeController extends Abstract\AbstractController
{
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
    }
    public function addSubTheme() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);
        $mainThemes = $this->mainThemeManager->getThemes();

        if(isset($_POST["unset:addSubTheme"])) {
           // $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
            $cleanedData = $this->preparePostData($_POST);
            $insertTheme = $this->subThemeManager->addSubTheme($cleanedData);
        }
        echo $this->twig->render('private/theme.addSub.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "csrfToken" => $this->csrfToken,
            "mainThemes" => $mainThemes,
        ]);
    }
}