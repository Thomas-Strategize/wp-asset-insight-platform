<?php
/* Template Name: Article Filter */

get_header(); // Include the header

// Display the filter form
?>
<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <select name="topic">
        <option value="">Select a Topic</option>
        <?php
        // Get all topics
        $terms = get_terms( array( 'taxonomy' => 'topic', 'orderby' => 'name' ) );
        foreach ( $terms as $term ) :
            ?>
            <option value="<?php echo $term->slug; ?>" <?php selected( $_GET['topic'], $term->slug ); ?>>
                <?php echo $term->name; ?>
            </option>
            <?php
        endforeach;
        ?>
    </select>
    <button type="submit">Filter</button>
</form>

<?php
// If a topic filter is applied
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

get_footer();
?>
