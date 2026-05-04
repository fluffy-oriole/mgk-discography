<?php

class LoginController extends TwigBaseController {
    public $template = "login.twig";
    public $title = "Авторизация";

    public $context = [];

    public function post(array $context) {
        $sql =<<<EOL
        SELECT id FROM users WHERE login = :login AND password = :password
        EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindvalue('login', $_POST["login"]);
        $query->bindvalue('password', $_POST["password"]);
        $query->execute();
        $users = $query->fetchAll();

        if (count($users) > 0) {
            $_SESSION['is_logged'] = true;
            header('Location: /');
        exit;
        }
        else {
            $this->get($context);
        }
    }
}