<?php

class AlbumDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $this->params['id'];

        $sql =<<<EOL
        DELETE FROM albums WHERE id = :id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
        header("Location: /");
        exit;
    }
}