<?php

class LogoutController extends TwigBaseController {
    public $template = "login.twig";
    public $title = "Авторизация";

    public function post(array $context) {
        $_SESSION['is_logged'] = false;
        header('Location: /login');
        exit;
    }
}