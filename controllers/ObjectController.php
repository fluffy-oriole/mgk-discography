<?php
require_once "BaseAlbumsTwigController.php";

class ObjectController extends BaseAlbumsTwigController {
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        $query = $this->pdo->prepare("SELECT info, description, image, id FROM albums WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        $context['is_image'] = true;
        $context['id'] = $this->params['id'];
        $context['description'] = $data['description'];
        
        if ($_GET["show"] == "image") { 
            $context['image'] = $data['image'];
            $context["is_image"] = true;
            $context["is_info"] = false;
            $this->template = "object_image.twig";
        }
        else if ($_GET["show"] == "info") {
            $context['info'] = $data['info'];
            $context["is_image"] = false;
            $context["is_info"] = true;
            $this->template = "object_info.twig";
        }
        
        else {            
            $context['id'] = $this->params['id'];
        }

        return $context;
    }
}