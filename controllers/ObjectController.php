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

        $context['id'] = $this->params['id'];
        $context['description'] = $data['description'];
        
        if(isset($_GET["show"])) {
            if ($_GET["show"] == "image") { 
            $context['image'] = $data['image'];
            $context["is_image"] = true;
            $this->template = "object_image.twig";
            }
            else if ($_GET["show"] == "info") {
                $context['info'] = $data['info'];
                $context["is_info"] = true;
                $this->template = "object_info.twig";
            }
        }

        return $context;
    }
}