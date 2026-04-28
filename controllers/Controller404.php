<?php
require_once "BaseAlbumsTwigController.php";

class Controller404 extends BaseAlbumsTwigController {
    public $template = "404.twig";
    public $title = "Страница не найдена";
    public function get($context) {
        http_response_code(404);
        parent::get($context);
    }
}