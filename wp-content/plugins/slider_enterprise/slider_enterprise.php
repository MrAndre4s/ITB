<?php

/**
 * Plugin Name: Слайдер предприятий
 * Description: Выводит предприятия по городам
 * Author: Бабкин Андрей
 * Version: 1.0
 */

add_action('wp_enqueue_scripts', 'add_plugin_assets');

function add_plugin_assets()
{
    wp_enqueue_style('main-se-css', plugin_dir_url(__FILE__) . 'css/main.css', array(), '1.0');

    wp_enqueue_script('main-se-js', plugin_dir_url(__FILE__) . 'js/main.js', array(), '1.0', true);
}

function getEnterprises($id)
{
    $args = array(
        'post_type' => 'enterprises',
        'posts_per_page' => -1,
        'meta_query' => array(
            'city' => array(
                'key' => 'city',
                'value' => $id,
                'compare' => '=',
            ),
        ),
    );

    $enterprises = new WP_Query($args);
    $enterprisesPosts = $enterprises->posts;

    return $enterprisesPosts;
}

add_action('get_footer', 'add_slider');

function add_slider()
{
    $args = array(
        'post_type' => 'city',
        'posts_per_page' => -1
    );
    $city = new WP_Query($args);
    $cityPosts = $city->posts;

    if (empty($cityPosts)) return;

    ob_start();
?>
    <section class="se-section">
        <div class="se-section__togglers">
            <? $flag = true; ?>
            <? foreach ($cityPosts as $city) : ?>
                <?
                $active = ($flag) ? 'se-section__toggler--active' : '';
                $flag = false;
                $fieldsCity = get_fields($city->ID);
                $enterprisesPosts = getEnterprises($city->ID);

                if ($enterprisesPosts) :
                ?>
                    <button class="se-section__toggler <?= $active ?>" data-toggler="<?= $city->ID ?>"><?= $fieldsCity['name'] ?></button>
                <? endif; ?>
            <? endforeach ?>
        </div>
        <div class="se-section__contents">
            <? $flagContent = true; ?>
            <? foreach ($cityPosts as $key => $city) : ?>
                <?
                $active = ($flagContent) ? 'se-section__content--active' : '';
                $flagContent = false;
                $enterprisesPosts = getEnterprises($city->ID);

                if ($enterprisesPosts) :
                ?>
                    <div class="se-section__content <?= $active ?>" data-content="<?= $city->ID ?>">
                        <? if (count($enterprisesPosts) > 1) : ?>
                            <a class="se-section__content-slider-navigation se-section__content-slider-navigation--prev" data-nav="prev"></a>
                        <? endif; ?>
                        <div class="se-section__content-slider">
                            <? $flagItem = true; ?>
                            <? foreach ($enterprisesPosts as $subKey => $plant) : ?>
                                <?
                                $fieldsPlant = get_fields($plant->ID);
                                $activeItem = ($flagItem) ? 'se-section__content-slider-item--active' : '';
                                $flagItem = false;
                                ?>
                                <div class="se-section__content-slider-item <?= $activeItem ?>" data-index="<?= ++$subKey ?>">
                                    <div class="se-section__item-top">
                                        <?
                                        $logo = $fieldsPlant['logo'];
                                        if ($logo) :
                                        ?>
                                            <div class="se-section__item-left">
                                                <img class="se-section__item-img" src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
                                            </div>
                                        <? endif; ?>
                                        <div class="se-section__item-right">
                                            <h1 class="se_section__item-title"><?= $fieldsPlant['name'] ?></h1>
                                            <? $cityName = get_field('name', $city->ID); ?>
                                            <p class="se_section__item-city"><?= $cityName ?></p>
                                            <? if ($fieldsPlant['address']) : ?>
                                                <p class="se_section__item-address"><?= $fieldsPlant['address'] ?></p>
                                            <? endif; ?>
                                        </div>
                                    </div>
                                    <? if ($fieldsPlant['services']) : ?>
                                        <ul class="se-section__item-bottom">
                                            <? foreach ($fieldsPlant['services'] as $service) : ?>
                                                <li class="se-section_item-bottom-service"><?= $service['service'] ?></li>
                                            <? endforeach; ?>
                                        </ul>
                                    <? endif; ?>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <? if (count($enterprisesPosts) > 1) : ?>
                            <a class="se-section__content-slider-navigation se-section__content-slider-navigation--next" data-nav="next"></a>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            <? endforeach; ?>
        </div>
    </section>
<?php
    $content = ob_get_contents();
    ob_end_clean();

    print($content);
}
