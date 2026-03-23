<?php
require_once 'TwigBaseController.php';

class LostAmericanaController extends TwigBaseController {
    public $title = "Lost Americana";
    public  $template = "__object.twig";

    public function getContext() : array {
        $context = parent::getContext();
        $context["url_title"] = "lost-americana";
        return $context;
    }
}