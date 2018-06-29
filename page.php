<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php the_field('production_time'); ?>
<section class="about">
    <nav class="staticHeader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-btn" onclick="myFunction(this);">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <ul>
                    <?php

// check if the repeater field has rows of data
if( have_rows('menu_m') ):

    // loop through the rows of data
    while ( have_rows('menu_m') ) : the_row();

        // display a sub field value
        echo'<li><a href="';the_sub_field('tmple_link');echo'" class="page-scroll">';the_sub_field('tmple_menu');echo'</a></li>';

    endwhile;

else :

    // no rows found

endif;

?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2><?php the_field('block_about_me_tittle'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <div class="about__img">
                    <img src="<?php the_field('block_about_me_img'); ?>" >
                </div>
            </div>
            <div class="col-md-7 col-sm-6">
                <?php the_field('block_about_me_text'); ?>
            </div>
        </div>
    </div>
</section>

<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Мои изделия</h2>
            </div>
        </div><!--end row -->
        <?php
            global $product;

            $args_category_list = array(
                'fields'         => 'all',
                'hide_empty'     => 1
            );

            $category_sistem_list = get_terms( 'product_cat', $arargs_category_listgs );
            // echo '<pre>';
            // print_r($category_sistem_list);
            // echo '</pre>';
            foreach ($category_sistem_list as $category_sistem_list_item) {
        ?>
        <!-- DEGIN ITEM CATEGORY-->
        <div class="row" id="<?php echo $category_sistem_list_item->slug; ?>">
            <div class="col-md-12">
                <h3><?php echo $category_sistem_list_item->name; ?></h3>
            </div><!--end col-md-12 -->
        </div><!--end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel">
                    <!-- BEGIN OWL-CAROUSEL ITEM & PRODUCT -->
                    <?php
                        $arg_post_sistem = array(
                          'tax_query' => array(
                              array(
                                  'taxonomy' => 'product_cat',
                                  'field' => 'slug',
                                  'terms' => $category_sistem_list_item->slug
                              )
                          ),
                          'post_type' => 'product',
                          'posts_per_page' => -1
                        );

                        $loop = new WP_Query( $arg_post_sistem );

                        while ( $loop->have_posts() ) : $loop->the_post();

                            $nal = $product->get_availability()['class'];
                            if($nal == 'out-of-stock'){
                                $nal_class     = 'no_instock_css';
                                $nav_class_div = ' no-active-button';
                                $nal_text      = 'На данный момент товара нет';
                            }else{
                                $nal_class = 'instock_css';
                                $nav_class_div = '';
                                $nal_text  = 'Осталось всего 1';
                            }

                            $price = get_post_meta( get_the_ID(), '_regular_price', true);
                    ?>
                    <div class="item<?php echo $nav_class_div; ?>">
                        <div class="gallery">
                            <a href="<?php echo get_the_post_thumbnail_url( $loop->ID, 'full' ); ?>" data-fancybox="image_<?php echo the_ID(); ?>" class="item__img">
                                <img src="<?php echo get_the_post_thumbnail_url( $loop->ID, 'custom-thumbnails' ); ?>">
                                <?php the_content(); ?>
                            </a>
                            <div class="item__price"><?php echo $price; ?> руб.</div>
                            <div class="hide_galary">
                            <?php 
                                $attachment_ids = $product->get_gallery_attachment_ids();

                                foreach( $attachment_ids as $attachment_id ) {
                            ?>
                                    <a href="<?php echo wp_get_attachment_image_src( $attachment_id, 'full')[0]; ?>" data-fancybox="image_<?php echo the_ID(); ?>">
                                        <img src="<?php echo wp_get_attachment_image_src( $lattachment_id, 'thumbnail')[0]; ?>">
                                    </a>
                            <?php
                                }
                            ?>
                            </div><!-- end hide_galary -->
                            <h4><?php the_title(); ?></h4>
                            <span>
                                <span class="<?php echo $nal_class; ?>"><?php echo $nal_text; ?></span>
                            </span>
                            <div class="add-to-cart-btn">
                                <?php woocommerce_template_loop_add_to_cart_custom( $loop->post, $product ); ?>
                                <a href="#popup-order" class="open-popup-link item__order">Заказать</a>
                            </div><!-- end add-to-cart-btn -->
                        </div><!-- end gallery -->
                    </div><!-- end item -->
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                    <!-- END OWL-CAROUSEL ITEM & PRODUCT -->
                </div><!--end owl-carousel -->
            </div><!--end col-md-12 -->
        </div><!--end row -->
        <!-- END ITEM CATEGORY-->
    <?php } ?>
    </div><!--end container -->
</section>

<section class="issues">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2><?php the_field('an_on_ques_tittle'); ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">


                <?php if( have_rows('an_on_ques') ): ?>

                    <?php while( have_rows('an_on_ques') ): the_row();

                            // vars

                    $title = get_sub_field('question');
                    $content = get_sub_field('answer');

                    ?>

                    <div class="issues__item">
                        <span><?php echo $title; ?></span>
                        <div class="more-text">+</div>
                        <p><?php echo $content; ?></p>

                    </div>
                    
                    
                    
                    
                    

                <?php endwhile; ?>

            <?php endif; ?>

            <p class="issues__descr"><?php the_field('delivery'); ?></p>

        </div>
        

    </div>

</div>
</section>
<?php get_footer(); ?>
