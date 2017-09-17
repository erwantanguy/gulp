<?php get_header(); ?>

	<section class="row" role="main">
            <article class="col-md-8">
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                <main>
                    <figure class="circle">
                        <?php the_post_thumbnail('vignetteAccueil'); ?>
                    </figure>
                    <figure class="de">
                        <?php the_post_thumbnail('vignetteAccueil'); ?>
                        <div class="ellipse"></div>
                    </figure>
                    <?php the_content(); ?>
                </main>
            </article>
            <aside class="col-md-4">
                <?php get_sidebar(); ?>
            </aside>
	</section>



<?php get_footer(); ?>
