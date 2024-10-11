<?php

/**
 * Shipping Calculator
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/shipping-calculator.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.0.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_shipping_calculator'); ?>

<form class="woocommerce-shipping-calculator" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">

	<?php printf('<a href="#" class="shipping-calculator-button">%s</a>', esc_html(!empty($button_text) ? $button_text : __('Calculate shipping', 'woocommerce'))); ?>

	<section class="shipping-calculator-form card p-0 border border-grey" style="display:none;">
		<div class="card-body">

			<?php if (apply_filters('woocommerce_shipping_calculator_enable_country', true)) : ?>
				<p class="form-row form-row-wide" id="calc_shipping_country_field">
					<label for="calc_shipping_country" class="screen-reader-text"><?php esc_html_e('Country / region:', 'woocommerce'); ?></label>
					<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state country_select" rel="calc_shipping_state">
						<option value="default"><?php esc_html_e('Select a country / region&hellip;', 'woocommerce'); ?></option>
						<?php
						foreach (WC()->countries->get_shipping_countries() as $key => $value) {
							echo '<option value="' . esc_attr($key) . '"' . selected(WC()->customer->get_shipping_country(), esc_attr($key), false) . '>' . esc_html($value) . '</option>';
						}
						?>
					</select>
				</p>
			<?php endif; ?>

			<?php if (apply_filters('woocommerce_shipping_calculator_enable_state', true)) : ?>
				<p class="form-row form-row-wide" id="calc_shipping_state_field">
					<?php
					$current_cc = WC()->customer->get_shipping_country();
					$current_r  = WC()->customer->get_shipping_state();
					$states     = WC()->countries->get_states($current_cc);

					if (is_array($states) && empty($states)) {
					?>

				<div class="form-floating mb-4">
					<input id="calc_shipping_state" type="hidden" name="calc_shipping_state" class="form-control" placeholder="<?php esc_attr_e('State / County', 'woocommerce'); ?>">
					<label for="calc_shipping_state"><?php esc_attr_e('State / County', 'woocommerce'); ?></label>
				</div>
				<!-- /.form-floating -->

			<?php
					} elseif (is_array($states)) {
			?>
				<span class="form-floating mb-4">
					<label for="calc_shipping_state" class="screen-reader-text"><?php esc_html_e('State / County:', 'woocommerce'); ?></label>
					<select name="calc_shipping_state" class="state_select" id="calc_shipping_state" data-placeholder="<?php esc_attr_e('State / County', 'woocommerce'); ?>">
						<option value=""><?php esc_html_e('Select an option&hellip;', 'woocommerce'); ?></option>
						<?php
						foreach ($states as $ckey => $cvalue) {
							echo '<option value="' . esc_attr($ckey) . '" ' . selected($current_r, $ckey, false) . '>' . esc_html($cvalue) . '</option>';
						}
						?>
					</select>
				</span>
			<?php
					} else {
			?>

				<div class="form-floating mb-4">
					<input id="calc_shipping_state" type="text" value="<?php echo esc_attr($current_r); ?>" class="form-control" placeholder="<?php esc_attr_e('State / County', 'woocommerce'); ?>">
					<label class="screen-reader-text" for="calc_shipping_state"><?php esc_html_e('State / County:', 'woocommerce'); ?></label>
				</div>
				<!-- /.form-floating -->


			<?php
					}
			?>
			</p>
		<?php endif; ?>

		<?php if (apply_filters('woocommerce_shipping_calculator_enable_city', true)) : ?>
			<div class="form-floating mb-4" id="calc_shipping_city_field">
				<input id="calc_shipping_city" value="<?php echo esc_attr(WC()->customer->get_shipping_city()); ?>" type="text" class="form-control" placeholder="<?php esc_attr_e('City', 'woocommerce'); ?>" name="calc_shipping_city">
				<label for="calc_shipping_city"><?php esc_attr_e('City', 'woocommerce'); ?></label>
			</div>
			<!-- /.form-floating -->
		<?php endif; ?>


		<?php if (apply_filters('woocommerce_shipping_calculator_enable_postcode', true)) : ?>
			<div class="form-floating mb-4" id="calc_shipping_postcode_field">
				<input id="calc_shipping_postcode" value="<?php echo esc_attr(WC()->customer->get_shipping_postcode()); ?>" name="calc_shipping_postcode" type="text" class="form-control" placeholder="<?php esc_attr_e('Postcode / ZIP', 'woocommerce'); ?>">
				<label for="calc_shipping_postcode"><?php esc_html_e('Postcode / ZIP:', 'woocommerce'); ?></label>
			</div>
			<!-- /.form-floating -->
		<?php endif; ?>



		<p><button type="submit" name="calc_shipping" value="1" class="button btn btn-md btn-outline-primary rounded"><?php esc_html_e('Update', 'woocommerce'); ?></button></p>
		<?php wp_nonce_field('woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce'); ?>
		</div>
	</section>
</form>

<?php do_action('woocommerce_after_shipping_calculator'); ?>