<?php

class SearchController extends BaseAlbumsTwigController {
    public $template = "search.twig";

    public function getContext(): array {
    
        $context = parent::getContext();


        $type = (isset($_GET["type"]) ? $_GET["type"] :"");
        $name = (isset($_GET["name"]) ? $_GET["name"] :"");
        $description = (isset($_GET["description"]) ? $_GET["description"] :"");
        $sql = <<<EOL
        SELECT id, name, description
        FROM albums
        WHERE (:name = '' OR name like CONCAT('%', :name, '%'))
        AND (:type = '' OR type = :type)
        AND (:description = '' OR description = :description)
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("type", $type);
        $query->bindValue("name", $name);
        $query->bindValue("description", $description);
        $query->execute();

        $context["objects"] = $query->fetchAll();
        return $context;    
    }
}