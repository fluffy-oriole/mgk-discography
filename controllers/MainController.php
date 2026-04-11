<?php
require_once "BaseAlbumsTwigController.php";

class MainController extends BaseAlbumsTwigController {
    public $title = "Главная";
    public $template = "main.twig";

    public function getContext(): array {
        $context = parent::getContext();
        if (isset($_GET["type"])) {
            $query = $this->pdo->prepare("SELECT * FROM albums WHERE type = :type");
            $query->bindValue("type", $_GET["type"]);
            $query->execute();
        }
        else {
            $query = $this->pdo->query("SELECT * FROM albums");
        }
        
        $context["albums"] = $query->fetchAll();
        return $context;
    }
}