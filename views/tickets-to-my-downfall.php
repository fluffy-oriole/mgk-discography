<?php
    $is_image = $url == '/tickets-to-my-downfall/image';
    $is_info = $url == '/tickets-to-my-downfall/info';
?>


<h1>Tickets To My Downfall</h1>
<div class="container mt-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?= $is_image ? "active" : '' ?>" aria-current="page" href="/tickets-to-my-downfall/image">Картинка</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/tickets-to-my-downfall/info">Описание</a>
        </li>
    </ul>
</div>

<div class="container mt-3 p-3" style="border: 1px solid grey;">
    <?php
        if ($is_image) {
            require "tickets-to-my-downfall_image.php";
        }
        else if ($is_info){
            require "tickets-to-my-downfall_info.php";
        }
        else {
            echo "Выберите что хотите посмотреть";
        }
    ?>
</div>
