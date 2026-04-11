<?php
require_once "BaseAlbumsTwigController.php";

class ObjectImageController extends BaseAlbumsTwigController {
    public $template = "object_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT description, image, id FROM albums WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        
        $context['is_image'] = true;
        $context['id'] = $this->params['id'];
        $context['image'] = $data['image'];
        $context['description'] = $data['description'];

        return $context;
    }
}