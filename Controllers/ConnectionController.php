<?php

namespace Controllers;


use Factory\ManagerFactory;
use model\Manager\ConnectionManager;
use model\Manager\MainThemeManager;
use model\Manager\SubThemeManager;
use Twig\Environment;


class ConnectionController extends Abstract\AbstractController
{
    private ConnectionManager $connectionManager;
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;

    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        /*
         * Instantiates Managers needed for this Controller
         * Avoids instantiation of unneeded Managers
         */
        parent::__construct($twig, $managerFactory);
        $this->connectionManager = $this->getManager(ConnectionManager::class);
        $this->mainThemeManager = $this->getManager(MainThemeManager::class);
        $this->subThemeManager = $this->getManager(SubThemeManager::class);
    }
    public function logout()
    {
        $this->connectionManager->logoutUser();
        header("Location: ./");
        exit;
    }

    public function index() : void
    {
        global $sessionRole, $systemMessage;
        $balise = [
            "type" => "h1",
            "class" => "head-1-center", // this is a self-defined TW class (variants include head-1-left, head-2-... etc)
        ];
        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        echo $this->twig->render('public/public.index.html.twig', [
            'systemMessage' => $systemMessage,
            'sessionRole' => $sessionRole,
            'tag' => $balise,
            "mainThemes" => $mainThemes,
            "subThemes" => $subThemes,
        ]);
    }

    public function login() : void
    {
        global $sessionRole, $systemMessage;
        if(isset($_POST["unset:loginUser"])) {
            $this->verifyCsrfToken($_POST["csrf:csrf_token"]);
            $cleanedData = $this->preparePostData($_POST);
            $loginAttempt = $this->connectionManager->loginUser($cleanedData);
            if(!$loginAttempt) {
                $_SESSION["systemMessage"] = "Login failed";
                header("Location: ./");
                exit;
            }else {
                header("Location: ?route=admin");
            }

        }
        echo $this->twig->render('public/public.login.html.twig', [
            'systemMessage' => $systemMessage,
            'sessionRole' => $sessionRole,
            'csrfToken' => $this->csrfToken
        ]);
    }
}