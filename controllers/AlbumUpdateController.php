<?php

class AlbumUpdateController extends BaseAlbumsTwigController {
    public $template = "album_object_update.twig";

    public function get($context) {
        $id = $this->params['id'];

        $sql = <<<EOL
        SELECT * FROM albums WHERE id = :id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();

        $data = $query->fetch();

        $context['album'] = $data;

        parent::get($context);
    }

    public function post($context) {
        $id = $this->params['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        
        if ($_FILES['image']['tmp_name'] != '') {
            $sql = <<<EOL
            UPDATE albums SET name=:title, description=:description,
            type_id=:type, info=:info, image=:image_url WHERE id=:id
            EOL;
        }
        else {
            $sql = <<<EOL
            UPDATE albums SET name=:title, description=:description,
            type_id=:type, info=:info WHERE id=:id
            EOL;
        }
        
        $query = $this->pdo->prepare($sql);

        $query->bindValue("id", $id);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        if ($_FILES['image']['tmp_name'] != '') {
            $query->bindValue("image_url", $image_url);
        }
        $query->execute();
        
        $context['message'] = 'Вы успешно изменили объект';

        $this->get($context);
    }
}