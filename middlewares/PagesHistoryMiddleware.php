<?php
require_once "../framework/BaseMiddleware.php";

class PagesHistoryMiddleware extends BaseMiddleware {
    
    public function apply(BaseController $controller, array $context)
    {
        $url = $_SERVER['REQUEST_URI'];
        $displayUrl = urldecode($url);

        if (strlen($displayUrl) > 35) {
            $displayUrl = substr($displayUrl, 0, 32) . '...';
        }

        if (!isset($_SESSION['pages'])) {
            $_SESSION['pages'] = [];
        }

        if (empty($_SESSION['pages']) || $_SESSION['pages'][0] != $displayUrl) {
            array_unshift($_SESSION['pages'], $displayUrl);
        }
        
        if (count($_SESSION['pages']) > 10) {
            array_pop($_SESSION['pages']);
        }
        
        $context['pages'] = $_SESSION['pages'];        
    }
}