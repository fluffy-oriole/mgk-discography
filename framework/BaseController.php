<?php

abstract class BaseController {
    public PDO $pdo;
    public array $params;

    public function process_response() {
        $method = $_SERVER['REQUEST_METHOD'];
        $context = $this->getContext();
        if ($method == 'GET') {
            $this->get($context);
        } else if ($method == 'POST') {
            $this->post($context);
        }
    }

    public function setParams(array $params) {
        $this->params = $params;
    }

    public function setPDO(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getContext() {
        return [];
    }

    public function get(array $context) {}

    public function post(array $context) {}

}