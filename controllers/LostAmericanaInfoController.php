<?php
require_once 'LostAmericanaController.php';

class LostAmericanaInfoController extends LostAmericanaController {
    public $template = "lost-americana-info.twig";

    public function getContext() : array {
        $context = parent::getContext();
        $context["is_info"] = 1;
        return $context;
    }
}