<?php

namespace Controllers;


use Factory\ManagerFactory;
use model\Manager\ConnectionManager;
use Twig\Environment;


class ConnectionController extends Abstract\AbstractController
{
    private ConnectionManager $connectionManager;

    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        /*
         * Instantiates Managers needed for this Controller
         * Avoids instantiation of unneeded Managers
         */
        parent::__construct($twig, $managerFactory);
        $this->connectionManager = $this->getManager(ConnectionManager::class);
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
        echo $this->twig->render('public/public.index.html.twig', [
            'systemMessage' => $systemMessage,
            'sessionRole' => $sessionRole
        ]);
    }

    public function login() : void
    {
        global $sessionRole, $systemMessage;
        if(isset($_POST["unset:loginUser"])) {
            $cleanedData = $this->preparePostData($_POST);
            die(var_dump($cleanedData, $_POST));
        }
        echo $this->twig->render('public/public.login.html.twig', [
            'systemMessage' => $systemMessage,
            'sessionRole' => $sessionRole,
            'csrfToken' => $this->csrfToken
        ]);
    }
}