<?php
require_once "../framework/BaseMiddleware.php";

class PagesHistoryMiddleware extends BaseMiddleware {
    
    public function apply(BaseController $controller, array $context)
    {
        $url = $_SERVER['REQUEST_URI'];
        if (!isset($_SESSION['pages'])) {
            $_SESSION['pages'] = [];
        }

        if (empty($_SESSION['pages']) || end($_SESSION['pages']) != $url) {
            array_push($_SESSION['pages'], $url);
        }
        
        if (count($_SESSION['pages']) > 10) {
            array_shift($_SESSION['pages']);
        }
        
        $context['pages'] = $_SESSION['pages'];        
    }
}