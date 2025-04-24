<?php
get_header(); // Include the header

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post(); // Loop through articles
        ?>
        <div class="article-summary">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
        </div>
        <?php
    endwhile;

    // Pagination if there are more than one page of articles
    the_posts_pagination();

else :
    echo '<p>No articles found.</p>';
endif;

get_footer(); // Include the footer
?>
