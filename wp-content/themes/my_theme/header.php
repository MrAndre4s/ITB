<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header__left">
                <h1 class="header__left-title">
                    <a href="/">
                        SITE TITLE
                    </a>
                </h1>
            </div>
            <div class="header__right-menu">
                <? $menu = wp_get_nav_menu_items('main_menu'); ?>
                <? foreach ((array)$menu as $item) : ?>
                    <a class="header__right-item" href="<?= $item->url ?>"><?= $item->title ?></a>
                <? endforeach; ?>
            </div>
        </header>