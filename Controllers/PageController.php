<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\PageManager;
use Twig\Environment;

class PageController extends Abstract\AbstractController
{
    private PageManager $pageManager;

    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->pageManager = $this->getManager(PageManager::class);
    }

    public function addPage() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);

        echo $this->twig->render("private/page.add.html.twig", [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "csrfToken" => $this->csrfToken,
        ]);
    }
}