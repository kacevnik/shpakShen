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
        </div>

        <!-- BEGIN BLOCK -->

    <!-- END BLOCK -->

    <!-- BEGIN BLOCK -->
    <div class="row" id="block2">
    <h3>Альбомы</h3>
<?php echo do_shortcode("[product_category category='albomy' per_page='12']"); ?>

    </div>

<!-- END BLOCK -->
<!-- BEGIN BLOCK -->
<div class="row" id="block3">
<h3>Блокноты</h3>
<?php echo do_shortcode("[product_category category='bloknoty' ]"); ?>
</div>
<!-- END BLOCK -->
<!-- BEGIN BLOCK -->
<div class="row" id="block4">
<h3>Кулинарные книги</h3>
<?php echo do_shortcode("[product_category category='kulinarnye-knigi' ]"); ?>
</div>
<!-- END BLOCK -->

<!-- BEGIN BLOCK -->
<div class="row" id="block5">
<h3>Мамины сокровища</h3>
<?php echo do_shortcode("[product_category category='maminy-sokrovishha' ]"); ?>
</div>
<!-- END BLOCK -->
<!-- BEGIN BLOCK -->
<div class="row" id="block6">
<h3>Обложки</h3>
<?php echo do_shortcode("[product_category category='oblozhki' ]"); ?>
</div>
<!-- END BLOCK -->
<!-- BEGIN BLOCK -->
<div class="row" id="block7">
<h3>Для свадьбы</h3>
<?php echo do_shortcode("[product_category category='shkatulki' ]"); ?>
</div>
<!-- END BLOCK -->

<!-- BEGIN BLOCK -->
<div class="row" id="block8">
<h3>Подарочные сертификаты</h3>
<?php echo do_shortcode("[product_category category='sertifikaty-i-upakovka' ]"); ?>
</div>

</div>
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
