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
            $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
            $cleanedData = $this->preparePostData($_POST);
            $insertPage = $this->pageManager->addNewPage($cleanedData);
            if($insertPage) {
                $_SESSION["systemMessage"] = "Page added";
                header("Location: ?route=buildPage&pageId=$insertPage");
                exit();
            }else {
                $_SESSION["systemMessage"] = "An error occurred";
                header("Location: ?route=admin");
                exit();
            }

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

    public function buildPage(array $getParams) : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);
        $pageId = $this->intClean($getParams["pageId"]);
        $pageDetails = $this->pageManager->getPageDetails($pageId);
        $pageBlocks = $this->pageManager->getPageBlocks($pageId);
        echo $this->twig->render("private/page.build.html.twig", [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "csrfToken" => $this->csrfToken,
            "pageDetails" => $pageDetails,
            "pageBlocks" => $pageBlocks,
        ]);
    }

    public function viewPage(array $getParams) : void
    {
        global $sessionRole, $systemMessage;
        $pageId = $this->intClean($getParams["id"]);
        $pageDetails = $this->pageManager->getPageDetails($pageId);
        $pageBlocks = $this->pageManager->getPageBlocks($pageId);
        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        $pages = $this->pageManager->selectAllPages();

        echo $this->twig->render("public/page.view.html.twig", [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "pageDetails" => $pageDetails,
            "pageBlocks" => $pageBlocks,
            "pages" => $pages,
            "mainThemes" => $mainThemes,
            "subThemes" => $subThemes,
        ]);
    }
}