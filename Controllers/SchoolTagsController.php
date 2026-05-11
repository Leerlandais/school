<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainThemeManager;
use model\Manager\PageManager;
use model\Manager\SchoolTagsManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class SchoolTagsController extends Abstract\AbstractController
{
    private SchoolTagsManager $schoolTagsManager;
    private PageManager $pageManager;
    private SubThemeManager $subThemeManager;
    private MainThemeManager $mainThemeManager;

    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->schoolTagsManager = $this->getManager(SchoolTagsManager::class);
        $this->pageManager = $this->getManager(PageManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);

    }
    public function addNewTag(): void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);
        $tags = $this->schoolTagsManager->getAllTags();
        $pages = $this->pageManager->selectAllPages();
        $subThemes = $this->subThemeManager->getSubThemes();
        $mainThemes = $this->mainThemeManager->getThemes();

        if(isset($_POST["unset:addNewTag"])) {
            $cleanedData = $this->preparePostData($_POST);
            $addTag = $this->schoolTagsManager->addNewTag($cleanedData);
            $_SESSION["systemMessage"] = $addTag ? "Tag added" : "An error occurred";
            header("Location: ?route=admin");
        }
        echo $this->twig->render("private/tag.add.html.twig", [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "tags" => $tags,
            "pages" => $pages,
            "subThemes" => $subThemes,
            "mainThemes" => $mainThemes,
            "csrfToken" => $this->csrfToken,
        ]);
    }
}