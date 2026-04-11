<?php
require_once "BaseAlbumsTwigController.php";

class ObjectInfoController extends BaseAlbumsTwigController {
    public $template = "object_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT description, info, id FROM albums WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        
        $context['is_info'] = true;
        $context['id'] = $this->params['id'];
        $context['info'] = $data['info'];
        $context['description'] = $data['description'];

        return $context;
    }
}