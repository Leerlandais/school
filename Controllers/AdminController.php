<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainThemeManager;
use model\Manager\SubThemeManager;
use Twig\Environment;

class AdminController extends Abstract\AbstractController
{
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);

    }
    public function adminControls() : void
    {
        global $sessionRole, $systemMessage;
        $this->checkPermissions("ROLE_ADMIN", $sessionRole);
        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        echo $this->twig->render('private/private.admin.html.twig', [
            "sessionRole" => $sessionRole,
            "systemMessage" => $systemMessage,
            "mainThemes" => $mainThemes,
            "subThemes" => $subThemes,
        ]);
    }
}