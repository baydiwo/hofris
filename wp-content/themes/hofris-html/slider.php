<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
<?php
// WP_Query arguments
$args = array (
    'post_status'            => array('publish','future'),
    'post_type' => 'slider',
    // 'category__in' => array( 5),
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post(); ?>
        <?php
            $image = get_field('image');
            $image2 = get_field('image_2');
            $image3 = get_field('image_3');
            $image4 = get_field('image_4');
            $image5 = get_field('image_5');
            $cat = get_field('category');
            $cat2 = get_field('category_2');
            $cat3 = get_field('category_3');
            $cat4 = get_field('category_4');
            $cat5 = get_field('category_5');
            // $category = get_field('category');
            // $title = get_field('title');
            // $text = get_field('text');
            // $link = get_field('link');
        ?>
        <?php if ($image != null) { ?>
        <a href="<?php the_field('link'); ?>"><img src="<?php the_field('image') ?>" alt="<?php the_field('title'); ?>"
            <?php if (get_field('title_1') != null) {?>
            title="
            <a href='<?php the_field('link'); ?>'><h3><?php echo get_cat_name( $cat ) ?></h3>
            <h2><?php the_field('title') ?></h2>
            <p><?php the_field('text') ?> ...</p></a>" />
            <?php } ?>
        </a>
        <?php } ?>
        <?php if ($image2 != null) { ?>
        <a href="<?php the_field('link_2'); ?>"><img src="<?php the_field('image_2') ?>" alt="<?php the_field('title_2'); ?>"
            <?php if (get_field('title_2') != null) {?>
            title="
            <a href='<?php the_field('link_2'); ?>'><h3><?php echo get_cat_name( $cat2 ); ?></h3>
            <h2><?php the_field('title_2') ?></h2>
            <p><?php the_field('text_2') ?> ...</p></a>" />
            <?php } ?>
        </a>
        <?php } ?>
        <?php if ($image3 != null) { ?>
        <a href="<?php the_field('link_3'); ?>"><img src="<?php the_field('image_3') ?>" alt="<?php the_field('title_3'); ?>"
            <?php if (get_field('title_3') != null) {?>
            title="
            <a href='<?php the_field('link_3'); ?>'><h3><?php echo get_cat_name( $cat3 ); ?></h3>
            <h2><?php the_field('title_3') ?></h2>
            <p><?php the_field('text_3') ?> ...</p></a>" />
            <?php } ?>
        </a>
        <?php } ?>
        <?php if ($image4 != null) { ?>
        <a href="<?php the_field('link_4'); ?>"><img src="<?php the_field('image_4') ?>" alt="<?php the_field('title_4'); ?>"
            <?php if (get_field('title_4') != null) {?>
            title="
            <a href='<?php the_field('link_4'); ?>'><h3><?php echo get_cat_name( $cat4 ); ?></h3>
            <h2><?php the_field('title_4') ?></h2>
            <p><?php the_field('text_4') ?> ...</p></a>" />
            <?php } ?>
        </a>
        <?php } ?>
        <?php if ($image5 != null) { ?>
        <a href="<?php the_field('link_5'); ?>"><img src="<?php the_field('image_5') ?>" alt="<?php the_field('title_5'); ?>"
            <?php if (get_field('title_5') != null) {?>
            title="
            <a href='<?php the_field('link_5'); ?>'><h3><?php echo get_cat_name( $cat5 ); ?></h3>
            <h2><?php the_field('title_5') ?></h2>
            <p><?php the_field('text_5') ?> ...</p></a>" />
            <?php } ?>
        </a>
        <?php } ?>

    <?php
     }
} else {
    // no posts found
} wp_reset_postdata();
 ?>
    </div>
</div>
