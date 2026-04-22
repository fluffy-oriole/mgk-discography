<?php
require_once "BaseAlbumsTwigController.php";

class ObjectController extends BaseAlbumsTwigController {
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        if (isset($_GET["show"])){
            if ($_GET["show"] == "image") {
                $query = $this->pdo->prepare("SELECT description, image, id FROM albums WHERE id= :my_id");
                $query->bindValue("my_id", $this->params['id']);
                $query->execute();
                $data = $query->fetch();
                
                $context['is_image'] = true;
                $context['id'] = $this->params['id'];
                $context['image'] = $data['image'];
            }
            else {
                $query = $this->pdo->prepare("SELECT description, info, id FROM albums WHERE id= :my_id");
                $query->bindValue("my_id", $this->params['id']);
                $query->execute();

                $data = $query->fetch();
                
                $context['is_info'] = true;
                $context['id'] = $this->params['id'];
                $context['info'] = $data['info'];
            }
        }
        else {
            $query = $this->pdo->prepare("SELECT description, id FROM albums WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();

            $data = $query->fetch();
            
            $context['id'] = $this->params['id'];
        }

        
        $context['description'] = $data['description'];

        return $context;
    }

    public function get() {
        if (isset($_GET["show"])){
            if ($_GET["show"] == "image"){
                $this->template = "object_image.twig";
            }
            else {
                $this->template = "object_info.twig";
            }
        }

        parent::get();
    }
}