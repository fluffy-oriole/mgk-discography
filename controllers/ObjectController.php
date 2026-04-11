<?php
require_once "BaseAlbumsTwigController.php";

class ObjectController extends BaseAlbumsTwigController {
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT description, id FROM albums WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        
        $context['id'] = $this->params['id'];
        $context['description'] = $data['description'];

        return $context;
    }
}