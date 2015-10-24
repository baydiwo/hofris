<?php include "header.php"; ?>

        <article class="category">
            <div class="container">
                <?php the_breadcrumb(); ?>

                <ul class="list-unstyled list-inline">
                    <?php
                    global $post;
                    //$categories = get_the_category($post->ID);
                    //query_posts( $query_string . '&posts_per_page=2' );
                     ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php $image = get_field('image'); ?>
                    <li>
                        <div class="col-lg-4">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url'] ?>" height="337" width="368" alt="" class="img-responsive"></a>
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
                    <?php endwhile; ?>
                </ul>

                <!-- pagination -->
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="page-nav">
                            <ul class="pagination pagination-lg">
                                <li>
                                    <?php previous_posts_link( '&laquo; Prev' ); ?>
                                </li>
                                <!-- <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li> -->
                                <li>
                                    <?php next_posts_link( 'Next &raquo;', '' ); ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </article>

        <?php include "footer.php"; ?>
