  <?php 
    require_once '../vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);
    $url = $_SERVER["REQUEST_URI"];

    $url = $_SERVER["REQUEST_URI"];

    $title = "";
    $template = "";
    $context = [];

    if ($url == "/") {
      $title = "Главная";  
      $template = "main.twig";
    } elseif (preg_match("#^/tickets-to-my-downfall#", $url)) {
        $title = "Tickets To My Downfall";
        $template = "object.twig";
        $context["url_title"] = "tickets-to-my-downfall";

        $is_info = $url == "/tickets-to-my-downfall/info";
        $is_image = $url == "/tickets-to-my-downfall/image";
        $context["is_info"] = $is_info;
        $context["is_image"] = $is_image;

        $context["image_url"] = "/images/tickets-to-my-downfall.png";

        if ($is_image) {
          $template = "object_image.twig";
        }
        else if ($is_info) {
          $template = "tickets-to-my-downfall-info.twig";
        }

    } elseif (preg_match("#^/lost-americana#", $url)) {
        $title = "Lost Americana";
        $template = "object.twig";
        $context["url_title"] = "lost-americana";

        $is_info = $url == "/lost-americana/info";
        $is_image = $url == "/lost-americana/image";
        $context["is_info"] = $is_info;
        $context["is_image"] = $is_image;

        $context["image_url"] = "/images/lost-americana.jpg";

        if ($is_image) {
          $template = "object_image.twig";
        }
        else if ($is_info) {
          $template = "lost-americana-info.twig";
        }
    }
    $context["title"] = $title;
    echo $twig->render($template, $context);