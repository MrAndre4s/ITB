<?php
# Динамический title
add_theme_support('title-tag');

# Включаем меню
add_theme_support('menus');

# Подключение стилей
add_action('wp_enqueue_scripts', 'register_style');

# Подключение стандартного редактора Wordpress
add_filter('use_block_editor_for_post_type', function ($post_type) {
    return false;
}, 100);

function register_style()
{
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
}

# Регистрация сущностей
add_action('init', 'register_post_types');

function register_post_types()
{
    # Города
    register_post_type('city', [
        'label'  => null,
        'labels' => [
            'name'               => 'Города',
            'singular_name'      => 'Город',
            'add_new'            => 'Добавить город',
            'add_new_item'       => 'Добавление города',
            'edit_item'          => 'Редактирование города',
            'new_item'           => 'Новый город',
            'view_item'          => 'Смотреть город',
            'search_items'       => 'Искать город',
            'not_found'          => 'Город не найден',
            'not_found_in_trash' => 'Город не найден в корзине',
            'parent_item_colon'  => '',
            'menu_name'          => 'Города',
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => null,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'menu_position'       => 4,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => ['title'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ]);
    # Предприятия
    register_post_type('enterprises', [
        'label'  => null,
        'labels' => [
            'name'               => 'Предприятия',
            'singular_name'      => 'Предприятие',
            'add_new'            => 'Добавить предприятие',
            'add_new_item'       => 'Добавление предприятия',
            'edit_item'          => 'Редактирование предприятия',
            'new_item'           => 'Новое предприятие',
            'view_item'          => 'Смотреть предприятие',
            'search_items'       => 'Искать предприятие',
            'not_found'          => 'Предприятие не найдено',
            'not_found_in_trash' => 'Предприятие не найдено в корзине',
            'parent_item_colon'  => '',
            'menu_name'          => 'Предприятия',
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => null,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'menu_position'       => 4,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => ['title'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ]);
}
