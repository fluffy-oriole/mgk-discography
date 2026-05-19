<?php
require_once "BaseAlbumsTwigController.php";

class ObjectTypeCreateController extends BaseAlbumsTwigController {
    public $template = "object_type_create.twig";

    public function get($context)
    {
        parent::get($context);
    }

    public function post($context) {
        
        $title = $_POST['type_name'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
        INSERT INTO object_types (type_name, type_image)
        VALUES(:type_name, :image_url)
        EOL;


        $query = $this->pdo->prepare($sql);

        $query->bindValue("type_name", $title);
        $query->bindValue("image_url", $image_url);
        $query->execute();
        
        $context['message'] = 'Вы успешно создали объект';
        $context['id'] = $this->pdo->lastInsertId();

        $this->get($context);
        
    }
}