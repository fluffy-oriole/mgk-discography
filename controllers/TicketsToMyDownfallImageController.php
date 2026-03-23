<?php
require_once "TicketsToMyDownfallController.php";

class TicketsToMyDownfallImageController extends TicketsToMyDownfallController {
    public $template = "object_image.twig";

    public function getContext() : array {
        $context = parent::getContext();
        $context["is_image"] = 1;
        $context["image_url"] = "/images/tickets-to-my-downfall.png";
        return $context;
    }
}