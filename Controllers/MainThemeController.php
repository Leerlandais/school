<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainThemeManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class MainThemeController extends Abstract\AbstractController
{
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
    }
    public function addMainTheme() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);

        if(isset($_POST["unset:addTheme"])) {
           $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
           $cleanedData = $this->preparePostData($_POST);
           $insertTheme = $this->mainThemeManager->addTheme($cleanedData);
           $_SESSION["systemMessage"] = $insertTheme ? "Main Theme added" : "An error occurred";
            header("Location: ?route=admin");
            exit();
        }

        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        echo $this->twig->render('private/theme.addMain.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "csrfToken" => $this->csrfToken,
            "mainThemes" => $mainThemes,
            "subThemes" => $subThemes
        ]);
    }
}