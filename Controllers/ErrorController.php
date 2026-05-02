<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;

class ErrorController extends Abstract\AbstractController
{
    public function error404() : void
    {
        global $sessionRole;
        echo $this->twig->render('404.html.twig', [
            "sessionRole" => $sessionRole,
        ]);
    }
}