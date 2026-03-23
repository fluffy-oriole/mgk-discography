<?php
    $is_image = $url == '/lost-americana/image';
    $is_info = $url == '/lost-americana/info';
?>


<h1>Lost Americana</h1>
<div class="container mt-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/lost-americana/image">Картинка</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lost-americana/info">Описание</a>
        </li>
    </ul>
</div>

<div class="container mt-3 p-3" style="border: 1px solid grey;">
    <?php
        if ($is_image) {
            require "lost-americana_image.php";
        }
        else if ($is_info){
            require "lost-americana_info.php";
        }
        else {
            echo "Выберите что хотите посмотреть";
        }
    ?>
</div>
