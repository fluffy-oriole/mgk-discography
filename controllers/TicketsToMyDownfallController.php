<?php
require_once "TwigBaseController.php";

class TicketsToMyDownfallController extends TwigBaseController {
    public $title = "Tickets To My Downfall";
    public $template = "__object.twig";

    public function getContext() : array {
        $context = parent::getContext();
        $context["url_title"] = "tickets-to-my-downfall";
        return $context;
    }
}