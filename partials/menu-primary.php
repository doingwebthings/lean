<div class="container-fluid">
    <div class="row">
        <header class="top-header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </div>
                <?php wp_nav_menu(array(
                    'menu'            => 'primary',
                    'theme_location'  => 'primary',
                    'depth'           => 2,
                    'container'       => 'div',
                    'container_id'    => 'navbar-primary-collapse',
                    'container_class' => 'collapse navbar-collapse',
                    'menu_class'      => 'nav navbar-nav',
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker(),
                )); ?>
            </nav>
        </header>
    </div>
</div>
