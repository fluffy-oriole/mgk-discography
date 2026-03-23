  <?php
    require_once '../controllers/MainController.php';
    require_once '../controllers/TicketsToMyDownfallController.php';
    require_once '../controllers/TicketsToMyDownfallImageController.php';
    require_once '../controllers/TicketsToMyDownfallInfoController.php';
    require_once '../vendor/autoload.php';
    require_once "../controllers/Controller404.php";
    require_once '../controllers/LostAmericanaController.php';
    require_once '../controllers/LostAmericanaImageController.php';
    require_once '../controllers/LostAmericanaInfoController.php';


    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    $url = $_SERVER["REQUEST_URI"];

    $url = $_SERVER["REQUEST_URI"];

    $title = "";
    $template = "";
    $context = [];
    $controller = new Controller404($twig);

    if ($url == "/") {
      $controller = new MainController($twig);
    } else if (preg_match("#^/tickets-to-my-downfall/image#", $url)) {
      $controller = new TicketsToMyDownfallImageController($twig);
    } elseif (preg_match("#^/tickets-to-my-downfall/info#", $url)) {
      $controller = new TicketsToMyDownfallInfoController($twig);
    } elseif (preg_match("#^/tickets-to-my-downfall#", $url)) {
        $controller = new TicketsToMyDownfallController($twig);
    } elseif (preg_match("#^/lost-americana/image#", $url)) {
        $controller = new LostAmericanaImageController($twig);
    } elseif (preg_match("#^/lost-americana/info#", $url)) {
        $controller = new LostAmericanaInfoController($twig);
    } elseif (preg_match("#^/lost-americana#", $url)) {    
        $controller = new LostAmericanaController($twig);
    }
    $context["title"] = $title;
    if ($controller) {
        $controller->get();
    }