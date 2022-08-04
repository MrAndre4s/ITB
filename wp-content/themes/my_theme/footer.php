    <footer class="footer">
        <div class="footer__left">
            <h1 class="footer__left-title">
                <a href="/">
                    SITE TITLE
                </a>
            </h1>
        </div>
        <div class="footer__right-menu">
            <? $menu = wp_get_nav_menu_items('main_menu'); ?>
            <? foreach ((array)$menu as $item) : ?>
                <a class="footer__right-item" href="<?= $item->url ?>"><?= $item->title ?></a>
            <? endforeach; ?>
        </div>
    </footer>
    </div>
    <?php wp_footer(); ?>
    </body>

    </html>