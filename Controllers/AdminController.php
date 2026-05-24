<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\ConnectionManager;
use model\Manager\MainThemeManager;
use model\Manager\PageManager;
use model\Manager\SchoolActiveManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class AdminController extends Abstract\AbstractController
{
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;
    private PageManager $pageManager;
    private ConnectionManager $connectionManager;

    private SchoolActiveManager $schoolActiveManager;
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
        $this->pageManager = $this->getManager(PageManager::class);
        $this->schoolActiveManager = $this->getManager(SchoolActiveManager::class);
        $this->connectionManager = $this->getManager(ConnectionManager::class);
    }
    public function adminControls() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);
        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        $pages = $this->pageManager->selectAllPages();
        $siteActive = $this->schoolActiveManager->checkIfActive();
        echo $this->twig->render('private/private.admin.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "mainThemes" => $mainThemes,
            "subThemes" => $subThemes,
            "pages" => $pages,
            "siteActive" => $siteActive,
        ]);
    }

    public function changeStatus() : void
    {
        if(!isset($_SESSION["siteActive"])) {
            $_SESSION["siteActive"] = 0;
        }
        $_SESSION["siteActive"]++;
        $this->schoolActiveManager->toggleSiteState();
        die();
    }

    public function visitLogs() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);

        $logs = $this->connectionManager->getVisitLogs();
        echo $this->twig->render('private/private.visitLogs.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "logs" => $logs,
        ]);
    }
}