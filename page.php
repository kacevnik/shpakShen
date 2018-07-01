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
<div id="cart-popup" class="white-popup">
    <h2>Купить изделие</h2>
    <?php
    wc_print_notices();

    do_action( 'woocommerce_before_cart' ); ?>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>

    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
        <thead>
            <tr>
                <th class="product-thumbnail">Товар</th>
                <th class="product-name"></th>
                <th class="product-quantity">Кол-во</th>
                <th class="product-price">Стоимость</th>
            </tr>
        </thead>
        <tbody>
            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>
                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">



                        <td class="product-thumbnail">
                        <?php
                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                        if ( ! $product_permalink ) {
                            echo wp_kses_post( $thumbnail );
                        } else {
                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
                        }
                        ?>
                        </td>

                        <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                        <?php
                        if ( ! $product_permalink ) {
                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                        } else {
                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" "return: false;">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                        }

                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                        // Meta data.
                        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                        // Backorder notification.
                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>' ) );
                        }
                        ?>
                        </td>

                        <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                        <?php
                        if ( $_product->is_sold_individually() ) {
                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                        } else {
                            $product_quantity = woocommerce_quantity_input( array(
                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                'input_value'  => $cart_item['quantity'],
                                'max_value'    => $_product->get_max_purchase_quantity(),
                                'min_value'    => '0',
                                'product_name' => $_product->get_name(),
                            ), $_product, false );
                        }

                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                        ?>
                        </td>

                        <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                            ?>
                            <?php
                                // @codingStandardsIgnoreLine
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove remove__custom" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    __( 'Remove this item', 'woocommerce' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>

            <?php do_action( 'woocommerce_cart_contents' ); ?>

            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
        </tbody>
    </table>
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
    <?php
        /**
         * Cart collaterals hook.
         *
         * @hooked woocommerce_cross_sell_display
         * @hooked woocommerce_cart_totals - 10
         */
        do_action( 'woocommerce_cart_collaterals' );
    ?>
</div>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo get_template_directory_uri(); ?>/send.php" enctype="multipart/form-data" novalidate="novalidate" id="form_order">
    <input type="hidden" value="Новый заказ" name="form">
    <input type="hidden" value="" name="products" id="products">
    <div id="customer_details">
        <div class="woocommerce-billing-fields">
            <h3></h3>
            <div class="woocommerce-billing-fields__field-wrapper">
                <p class="form-row">
                    <input type="text" class="input-text " name="name" placeholder="ФИО" value="" autocomplete="given-name" autofocus="autofocus" required>
                </p>
                <p class="form-row">
                    <input type="tel" class="input-text" name="phone" placeholder="Телефон / Почта" value="" autocomplete="tel" required>
                </p>
                <p class="form-row validate-required validate-state">
                    <input type="text" class="input-text" value="" placeholder="Адрес доставки" name="adress" autocomplete="address-level1">
                </p>
            </div>
        </div>
        <div class="woocommerce-shipping-fields">
            
        </div>
        <div class="woocommerce-additional-fields">
            <p class="form-row wps-drop">
                <select name="oplata" class="select ">
                    <option value="Не выбранно">Выберите способ оплаты</option>
                    <option value="Оплата при получении">Оплата при получении</option>
                    <option value="Оплата картой">Оплата картой</option>
                </select>
            </p>
            <div class="woocommerce-additional-fields__field-wrapper">
                <p class="form-row ">
                    <textarea name="comments" class="input-text " placeholder="Примечание к заказу" rows="2" cols="5"></textarea>
                </p>
            </div>
        </div>
    </div>
    <input type="submit" class="send button alt" name="submit" value="Подтвердить заказ" id="send_order">
</form>

<?php do_action( 'woocommerce_after_cart' ); ?>
</div><!-- cart-popup -->

<a id="thanks_link" data-fancybox data-src="#thanks" href="javascript:;">Спасибо</a>
<div id="thanks">
    <h2>Спасибо за покупку! Я свяжусь с вами в ближайшее время!</h2>
</div>
<?php get_footer(); ?>
