<?php
get_header(); // Include the header

// Check if a taxonomy term is being queried
if ( isset( $_GET['topic'] ) ) {
    $topic_slug = sanitize_text_field( $_GET['topic'] );
    $args = array(
        'post_type' => 'article',
        'tax_query' => array(
            array(
                'taxonomy' => 'topic',
                'field'    => 'slug',
                'terms'    => $topic_slug,
            ),
        ),
    );
} else {
    // Default query for all articles
    $args = array(
        'post_type' => 'article',
    );
}

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
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

// Reset post data
wp_reset_postdata();

get_footer(); // Include the footer
?>
