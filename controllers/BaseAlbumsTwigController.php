<?php

class BaseAlbumsTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT DISTINCT type FROM albums");
        $types = $query->fetchAll();
        $context['types'] = $types;
        return $context;
    }
}