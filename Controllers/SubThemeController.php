<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainThemeManager;
use model\Manager\PageManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class SubThemeController extends Abstract\AbstractController
{
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;
    private PageManager $pageManager;
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
        $this->pageManager = $this->getManager(PageManager::class);
    }
    public function addSubTheme() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);

        if(isset($_POST["unset:addSubTheme"])) {
            $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
            $cleanedData = $this->preparePostData($_POST);
            $insertTheme = $this->subThemeManager->addSubTheme($cleanedData);
            $_SESSION["systemMessage"] = $insertTheme ? "Subtheme added" : "An error occurred";
            header("Location: ?route=admin");
            exit();
        }


        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        $pages = $this->pageManager->selectAllPages();
        echo $this->twig->render('private/theme.addSub.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "csrfToken" => $this->csrfToken,
            "mainThemes" => $mainThemes,
            "subThemes" => $subThemes,
            "pages" => $pages,
        ]);
    }
}