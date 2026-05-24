<?php

namespace Controllers;


use Factory\ManagerFactory;
use model\Manager\ConnectionManager;
use model\Manager\MainThemeManager;
use model\Manager\PageManager;
use model\Manager\SchoolActiveManager;
use model\Manager\SubThemeManager;
use Twig\Environment;


class ConnectionController extends Abstract\AbstractController
{
    private ConnectionManager $connectionManager;
    private MainThemeManager $mainThemeManager;
    private SubThemeManager $subThemeManager;
    private PageManager $pageManager;

    private SchoolActiveManager $schoolActiveManager;

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
        $this->pageManager = $this->getManager(PageManager::class);
        $this->schoolActiveManager = $this->getManager(SchoolActiveManager::class);
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
        if(!isset($_SESSION["session_logged"])) {
            $_SESSION["session_logged"] = false;
            $ip = $_SERVER['REMOTE_ADDR'];
            if($ip !== MY_CONNECT) {
                $this->logSiteVisit($ip);
            }
        }
        $testSiteActive = $this->schoolActiveManager->checkIfActive();
        if(!$testSiteActive) {
            $this->siteClosed();
            exit();
        }
        $mainThemes = $this->mainThemeManager->getThemes();
        $subThemes = $this->subThemeManager->getSubThemes();
        $pages = $this->pageManager->selectAllPages();
        echo $this->twig->render('public/public.index.html.twig', [
            'systemMessage' => $systemMessage,
            'sessionRole' => $sessionRole,
            'pages' => $pages,
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

    private function logSiteVisit($ip) : bool
    {
        $visitData = [
            "visit_ip" => $ip,
            "visit_date" => date("Y-m-d H:i:s"),
        ];
        $makeLog = $this->connectionManager->recordVisit($visitData);
        return $makeLog;
    }
}