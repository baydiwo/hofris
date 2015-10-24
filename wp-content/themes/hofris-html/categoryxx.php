<?php include "header.php"; ?>

        <article class="category">
            <div class="container">
                <?php the_breadcrumb(); ?>

                <ul class="list-unstyled list-inline">
                <?php
                // WP_Query arguments
$args = array (
    'pagination'             => true,
    'paged'                  => '5',
    'posts_per_page'         => '5',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post(); ?>
        <li>
                        <div class="col-lg-4">
                            <a href="<?php the_permalink(); ?>"><img src="<?php //echo $image['url'] ?>" height="337" width="368" alt="" class="img-responsive"></a>
                        </div>
                        <div class="col-lg-8">
                            <div class="description">
                                <a href="<?php the_permalink(); ?>">
                                    <!-- <span class="cat-title">kesehatan</span> -->
                                    <h2><?php the_title(); ?></h2>
                                    <p><?php echo wp_trim_words( get_the_content(), 75, '' ); ?></p>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php wp_link_pages(); ?>
    <?php }
} else {
    // no posts found
}

// Restore original Post Data
wp_reset_postdata();
                 ?>


                </ul>
<?php the_posts_navigation(); ?>
                <!-- pagination -->
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="page-nav">
                            <ul class="pagination pagination-lg">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </article>

        <?php include "footer.php"; ?>
