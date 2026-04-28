<?php

class BaseAlbumsTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT * FROM object_types");
        $types = $query->fetchAll();
        $context['types'] = $types;
        return $context;
    }
}