<?php
require_once 'TicketsToMyDownFallController.php';

class TicketsToMyDownFallInfoController extends TicketsToMyDownFallController {
    public $template = "tickets-to-my-downfall-info.twig";

    public function getContext() : array {
        $context = parent::getContext();
        $context["is_info"] = 1;
        return $context;
    }
}