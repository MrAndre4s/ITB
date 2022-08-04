<?php
// Template Name:  Главная страница (Шаблон)
get_header();
define('ID', get_the_ID());
$title = get_the_title(ID);
?>

<section class="section">
    <h1 class="section__title">
        <?= $title ?>
    </h1>
    <? if (get_the_content()) : ?>
        <div class="section__content">
            <? the_content(); ?>
        </div>
    <? endif; ?>
</section>

<? get_footer(); ?>