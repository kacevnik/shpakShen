        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/popup_img.js"></script>

<footer style="background-image: url(/wp-content/uploads/2017/09/EXO250_1920_1080-e1511035945270.jpg);">
    <div class="container">

        <div class="row">
            <div class="col-md-2 col-sm-2 col-sm-push-5 col-md-pull-5 col-xs-12">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                    <img src="<?php the_field('logotype'); ?>" />
                </a>
            </div>
            <div class="col-md-5 col-sm-5 col-sm-pull-2 col-md-pull-2 col-xs-6">
                <div class="block__left">
                    <span class="socials__item">
                        <span><?php the_field('pr_time'); ?></span>
                    </span>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6">
                <div class="socials">
                        <a href="#cart-popup" class="open-popup-link cart-customlocation cart__item cart-contents cart-contents">
                          <span>Ваша корзина:</span>
                          <strong>
                            <span class="woocommerce-Price-amount amount"><?php echo WC()->cart->cart_contents_total; ?>
                              <span class="woocommerce-Price-currencySymbol"> руб.</span>
                            </span>
                          </strong>
                        </a>
                </div>
            </div>
        </div>

    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <span><?php the_field('copyright'); ?></span>
                    <a href="mailto:<?php the_field('link_social', 'option'); ?>"><img src="/app/img/footer-soc2.png" alt="Email"></a>
                    <a href="<?php the_field('link_social', 'option'); ?>" target="_blank"><img src="/app/img/footer-soc1.png" alt="VK"></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="popup-order" class="white-popup mfp-hide">
    <div class="order-item">
        <h2>Заказать изделия</h2>
        <form id="form1">
            <!-- Hidden Required Fields -->
            <input type="hidden" name="project_name" value="Шпакшен Продакшен">
            <input type="hidden" name="admin_email" value="<?php the_field('email', 'option'); ?>">
            <input type="hidden" name="form_subject" value="Заказать изделия">
            <!-- END Hidden Required Fields -->
            <span>Выберите группу:</span>
            <div class="row">
                <div class="col-xs-6">
                    <p>
                        <input type="checkbox" name="Альбомы" id="test1" />
                        <label for="test1">Альбомы</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Блокноты" id="test2" />
                        <label for="test2">Блокноты</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Бабочки" id="test3" />
                        <label for="test3">Бабочки</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Кулинарные книги" id="test4" />
                        <label for="test4">Кулинарные книги</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Мамины сокровища" id="test5" />
                        <label for="test5">Мамины сокровища</label>
                    </p>
                </div>
                <div class="col-xs-6">
                    <p>
                        <input type="checkbox" name="Обложки" id="test6" />
                        <label for="test6">Обложки</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Для свадьбы" id="test7" />
                        <label for="test7">Для свадьбы</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Шкатулки" id="test8" />
                        <label for="test8">Шкатулки</label>
                    </p>
                    <p>
                        <input type="checkbox" name="Сертификаты и упаковка" id="test9" />
                        <label for="test9">Сертификаты и упаковка</label>
                    </p>
                </div>
            </div>
            <input type="text" name="ФИО" placeholder="ФИО">
            <input type="text" name="Телефон/Почта" placeholder="Телефон / Почта">
            <input type="text" name="Адрес доставки" placeholder="Адрес доставки">
            <select name="Способ доставки">
                <option value="Оплата при получении">Оплата при получении</option>
                <option value="Оплата картой">Оплата картой</option>
            </select>
            <textarea name="Комментарий" placeholder="Комментарий"></textarea>
            <button class="send">Отправить заявку</button>
        </form>
    </div>
</div>

<div class="block__thank_you1 block__thank_you">
    <div class="mfp-close-thn"></div>
    <h2><?php the_field('window_thn') ?></h2>
    <p><?php the_field('window_txt') ?></p>
</div>
<div class="block__thank_you2 block__thank_you">
    <div class="mfp-close-thn"></div>
    <h2><?php the_field('window_thn1') ?></h2>
    <p><?php the_field('window_txt1') ?></p>
</div>
<div id="cart-popup" class="white-popup mfp-hide">
  <h2>Купить изделие</h2>
  <?php echo do_shortcode("[woocommerce_cart]"); ?>
  <div class="clearfix"></div>
  <div class="white-popup-total__price">
    Итого: <strong>
        <?php
        /**
         * Cart totals
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see         https://docs.woocommerce.com/document/template-structure/
         * @author      WooThemes
         * @package     WooCommerce/Templates
         * @version     2.3.6
         */

        if ( ! defined( 'ABSPATH' ) ) {
            exit;
        }

        ?>
        <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

            <?php do_action( 'woocommerce_before_cart_totals' ); ?>

            <h2 class="hidden-lg hidden-md hidden-sm hidden-xs"><?php _e( 'Cart totals', 'woocommerce' ); ?></h2>

            <table cellspacing="0" class="shop_table shop_table_responsive">

                <tr class="cart-subtotal hidden-lg hidden-md hidden-sm hidden-xs">
                    <th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
                    <td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                </tr>

                <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                    <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                        <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                        <td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                    <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

                    <?php wc_cart_totals_shipping_html(); ?>

                    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

                <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

                    <tr class="shipping hidden-lg hidden-md hidden-sm hidden-xs">
                        <th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
                        <td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
                    </tr>

                <?php endif; ?>

                <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                    <tr class="fee hidden-lg hidden-md hidden-sm hidden-xs">
                        <th><?php echo esc_html( $fee->name ); ?></th>
                        <td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) :
                    $taxable_address = WC()->customer->get_taxable_address();
                    $estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
                            ? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
                            : '';

                    if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                            <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                                <th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
                                <td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr class="tax-total hidden-lg hidden-md hidden-sm hidden-xs">
                            <th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
                            <td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>

                <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

                <tr class="order-total">
                    <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                </tr>

                <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

            </table>

            <div class="wc-proceed-to-checkout hidden-lg hidden-md hidden-sm hidden-xs">
                <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
            </div>

            <?php do_action( 'woocommerce_after_cart_totals' ); ?>

        </div>
    </strong>
  </div>
  <?php echo do_shortcode("[woocommerce_checkout]"); ?>
</div>
<script>
$(function() {
    $(".issues__item").click(function() {
        $(".issues__item").removeClass("issues__item__active");         
        $(this).addClass("issues__item__active");
    })
});
</script>
<?php wp_footer(); ?>


</body>
</html>
