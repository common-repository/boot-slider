<?php
// Slider Item
function bt_slider_item_shortcode( $atts ) {
   extract(shortcode_atts(array(
      'cat' => '',
   ), $atts));
    
    // The Query
    query_posts( array( 
        'post_type' => 'bt-slider', 
        'posts_per_page' => -1,
        'bt-cat' => $cat,
    ));

    // The Loop
    while ( have_posts() ) : the_post();
    $image = get_the_post_thumbnail_url();
    ?>
<div class="carousel-item">
    <img src="<?php echo $image; ?>" class="d-block w-100" alt="<?php the_title(); ?>">
    <div class="carousel-caption d-none d-md-block">
        <h5><?php the_title(); ?></h5>
        <p><?php the_content(); ?></p>
    </div>
</div>
<?php
    endwhile;

    // Reset Query
    wp_reset_query();
}
add_shortcode( 'bt_slider_item', 'bt_slider_item_shortcode' );

// Boot Slider Shortcode
function bt_slider_shortcode( $atts ) {
   extract(shortcode_atts(array(
      'id' => '1',
      'cat' => '',
      'speed' => 3000,
      'caption' => '',
   ), $atts));
    
    ?>
<div id="bt-slider<?php echo $id; ?>" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
                // The Query
                query_posts( array( 
                    'post_type' => 'bt-slider', 
                    'posts_per_page' => -1,
                    'bt-cat' => $cat,
                ));

                // The Loop
                $i = 0;
                while ( have_posts() ) : the_post();
                $ms = 1;
                $i++;
                $num = $i - $ms;
                    ?>
        <button type="button" data-bs-target="#bt-slider<?php echo $id; ?>" data-bs-slide-to="<?php echo $num; ?>"></button>
        <?php
                endwhile;
                ?>
    </div>
    <div class="carousel-inner">
        <?php echo do_shortcode('[bt_slider_item cat='.$cat.']'); ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bt-slider<?php echo $id; ?>" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bt-slider<?php echo $id; ?>" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // Slider
        var myCarousel = document.querySelector('#bt-slider<?php echo $id; ?>')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: <?php echo $speed; ?>,
            wrap: false
        })

        // Active class
        jQuery("#bt-slider<?php echo $id; ?> .carousel-item:first").addClass("active");
        jQuery("#bt-slider<?php echo $id; ?> .carousel-indicators button:first").addClass("active");

        // Hide caption
        jQuery("#bt-slider<?php echo $id; ?> .carousel-caption").addClass("bt_cap_<?php echo $caption; ?>");
    });

</script>
<?php
}

add_shortcode( 'boot_slider', 'bt_slider_shortcode' );
