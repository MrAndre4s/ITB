<?php
get_header();
$title = get_the_title();
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