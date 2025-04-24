<?php
get_header(); // This includes the header from your theme

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post(); // Loop through the articles
        ?>
        <div class="article-content">
            <h1><?php the_title(); ?></h1>
            <div class="article-body">
                <?php the_content(); ?>
            </div>
            <div class="article-meta">
                <p>Posted on: <?php the_date(); ?></p>
            </div>
        </div>
        <?php
    endwhile;
else :
    echo '<p>No articles found.</p>';
endif;

get_footer(); // This includes the footer from your theme
?>
