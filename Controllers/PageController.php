<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainThemeManager;
use model\Manager\PageManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class PageController extends Abstract\AbstractController
{
    private PageManager $pageManager;
    private SubThemeManager $subThemeManager;
    private MainThemeManager $mainThemeManager;

    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->pageManager = $this->getManager(PageManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
    }

    public function addPage() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);

        if(isset($_POST["unset:addNewPage"])) {
            die(var_dump($_POST));
        }

        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        echo $this->twig->render("private/page.add.html.twig", [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "csrfToken" => $this->csrfToken,
            "subThemes" => $subThemes,
            "mainThemes" => $mainThemes,
        ]);
    }
}