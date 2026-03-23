<?php
require_once 'LostAmericanaController.php';

class LostAmericanaImageController extends LostAmericanaController {
    public $template = "object_image.twig";
    
    public function getContext() : array {
        $context = parent::getContext();
        $context["is_image"] = 1;
        $context["image_url"] = "/images/lost-americana.jpg";
        return $context;
    }
}