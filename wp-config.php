<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'itb' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q]=7ynrS%P-1$5!V.]wYqFjp,M&DR_`!%/dH//kq~9a72)CQU%._J5K~5@tSV9>?' );
define( 'SECURE_AUTH_KEY',  '$2O8|yI+X<Sl<f}M,P^Dszu<ztb6^$wC(t9v(W5qnSxUj(yNlv%W%KAS6j$`VC9&' );
define( 'LOGGED_IN_KEY',    ':`~0pr0pd(Ab%c7( WysDZZ1O<6Wgoa=v3c!#*75TxylX``]vApVjr$n{yv#LO>i' );
define( 'NONCE_KEY',        '9Jj}HayeX<j0VjPx/p7Yx,SK*aBj 0UUoNNoG|GB)FfTbUu1uWi=w:$apF2JWmhE' );
define( 'AUTH_SALT',        'Ge8Z%nG(<2*]iV.M~ i^A<8cVBX0M<GML+q}SDrva&}lyx&+a0s#O+Cn,N/v/jE4' );
define( 'SECURE_AUTH_SALT', '`4T?sO4VBT`<0f@9|qVswV:LZiLkn,g}^%v+Eov8FxSnb$%4WKIFPnU?G-1)Jn-`' );
define( 'LOGGED_IN_SALT',   'wpUlIoPMN.sTb_g|!BR(_fng4s;_jPezr+1+{>C9ZOy3 M28_ki201WWf)kooc%Z' );
define( 'NONCE_SALT',       'T1^pb68vTZ+yt_zg1Q},y(6I:Zt-!Wgt.gMK-E+P4h)WB5>`;:]d8%Ut:r&9{hW=' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
