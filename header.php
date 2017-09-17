<!DOCTYPE html>
<html>
  <head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>
      <div class="container">
      <header class="row">
              <h1 class="col-md-8"><a><?php bloginfo('name'); ?></a></h1>
              <h2 class="col-md-4"><?php bloginfo('description'); ?></h2>
      </header>
          <nav class="row navbar navbar-default">
		<div>
			
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	          <button aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand visible-xs-block" href="#">Menu</a>
	        </div>
	        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
	          <?php wp_nav_menu(array(
					'theme_location' => 'premier',
					'container'         => 'div',
                	'container_class'   => '',
        			'container_id'      => '',
                	'menu_class'        => 'nav navbar-nav navbar-right',
                	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                	'walker' => new Bootstrap_Walker_Nav_Menu(),
				) );
				?>
			<?php wp_nav_menu(array(
					'theme_location' => 'deuxieme',
					'container'         => 'div',
                	'container_class'   => '',
        			'container_id'      => '',
                	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker' => new Bootstrap_Walker_Nav_Menu(),
					'menu_class' => 'nav navbar-nav navbar-right'
				) );
				?>
                    <ul class="social-links nav navbar-nav">
                        <?php if( have_rows('ajoutez_vos_reseaux_sociaux','option') ):
                            while ( have_rows('ajoutez_vos_reseaux_sociaux','option') ) : the_row(); ?>
                        <li><?php //print_r(get_sub_field('plateforme')); ?>
                            
                            <a href="<?php if( have_rows('url') ):while ( have_rows('url') ) : the_row();if( get_row_layout() == 'url' ):the_sub_field('url');elseif( get_row_layout() == 'email' ):echo 'mailto:'.get_sub_field('url');endif;endwhile;endif;?>" title="<?php echo get_sub_field('plateforme')['label'].' ';bloginfo('name'); ?>" target="_blank"><i class="fa <?php echo get_sub_field('plateforme')['value']; ?>"></i></a></li>
                        <?php endwhile;endif; ?>
						<?php if(get_option('mail')){?>
							<li class="mail hidden-md"><a href="<?php echo get_option('mail'); ?>" title="Mail à <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
						<?php }?>
					</ul><!-- data-toggle="tooltip" data-placement="bottom"  -->
                </div>
        </div>
        </nav>
