<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//do_action( 'woocommerce_before_checkout_form', $checkout );
?>
   <main class="site-main">
        <!--shop category start-->
        <section class="space-3">
            <div class="container">
               <div class="row">
                  <section id="primary" class="content-area col-lg-12">
                     <main id="main" class="site-main" role="main">
                        <article id="post-8" class="post-8 page type-page status-publish hentry">

                                <div class="entry-content">
                                    <div class="woocommerce">
													<?php

													// If checkout registration is disabled and not logged in, the user cannot checkout.
													if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
														echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
														return;
													}

													?>

													<form name="checkout" method="post" class="checkout woocommerce-checkout row" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

														<?php if ( $checkout->get_checkout_fields() ) : ?>

															<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
															<div class="col-md-7">
																<div class="col2-set" id="customer_details">
																	<div class="col-12">
																		<?php do_action( 'woocommerce_checkout_billing' ); ?>
																	</div>

																	<div class="col-12">
																		<?php do_action( 'woocommerce_checkout_shipping' ); ?>
																	</div>
																</div>
															</div>

															<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

														<?php endif; ?>

														<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>



														<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

														<div class="col-md-5">
														<h3 id="order_review_heading">Your order</h3>
															<div id="order_review" class="woocommerce-checkout-review-order">
																<?php do_action( 'woocommerce_checkout_order_review' ); ?>
															</div>
														</div>

														<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

													</form>

													<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
												</div>
                                </div><!-- .entry-content -->

                            </article><!-- #post-## -->

                        </main><!-- #main -->
                    </section>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>