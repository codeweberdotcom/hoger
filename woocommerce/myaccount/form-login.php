<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

	<div class="position-relative">
		<div class="u-columns row" id="customer_login">
			<div class="u-column1 col-12 col-md-6">
				<div class="card h-100">
					<div class="card-body">
					<?php endif; ?>
					<h2 class="card-title mb-4"><?php esc_html_e('Login', 'woocommerce'); ?></h2>
					<form class="woocommerce-form woocommerce-form-login login text-start mb-3 needs-validation" method="post">
						<?php do_action('woocommerce_login_form_start'); ?>
						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-floating mb-4">
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" placeholder="<?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class=' required'>*</span>" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required />
							<label class="nowrap" for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
							<?php // @codingStandardsIgnoreLine 
							?>
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-floating password-field mb-4">
							<input class="woocommerce-Input woocommerce-Input--text input-text form-control" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" type="password" name="password" id="password" autocomplete="off" required />
							<span class="password-toggle"><i class="uil uil-eye"></i></span>
							<label for="password"></label>
						</p>
						<?php do_action('woocommerce_login_form'); ?>
						<p class="form-row ">
						<div class="form-check mb-4">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox form-check-input" name="rememberme" type="checkbox" id="rememberme" value="forever" checked />
							<label role="button" class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme form-check-label" for="rememberme"><?php esc_html_e('Remember me', 'woocommerce'); ?></label>
						</div>
						<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
						<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn btn-primary btn-icon btn-icon-start rounded" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
						</p>
						<p class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="alert-link hover"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
						</p>

						<?php do_action('woocommerce_login_form_end'); ?>
					</div>
				</div>
				</form>

				<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

			</div>
			<div class="u-column2 col-12 col-md-6">
				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title mb-4"><?php esc_html_e('Register', 'woocommerce'); ?></h2>
						<form method="post" class="woocommerce-form woocommerce-form-register register needs-validation" <?php do_action('woocommerce_register_form_tag'); ?>>
							<?php do_action('woocommerce_register_form_start'); ?>

							<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required ">*</span></label>
									<input class="nowrap" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required /><?php // @codingStandardsIgnoreLine 
																																																																																																	?>
								</p>
							<?php endif; ?>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-floating mb-4">
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" placeholder="<?php esc_html_e('Email address', 'woocommerce'); ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" required />
								<label class="nowrap" for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<?php // @codingStandardsIgnoreLine 
								?>
							</p>
							<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-floating">
									<input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" name="password" id="reg_password" autocomplete="new-password" />
									<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								</p>
							<?php else : ?>
								<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>
							<?php endif; ?>
							<?php do_action('woocommerce_register_form'); ?>
							<p class="woocommerce-form-row form-row">
								<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
								<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit btn btn-primary btn-icon btn-icon-start rounded" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
							</p>
							<?php do_action('woocommerce_register_form_end'); ?>
					</div>
					<!--/.card-body -->
				</div>
				</form>
			</div>
		</div>

	</div>
	<div class="position-relative">
		<div class="shape bg-dot blue rellax w-16 h-17" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem; z-index: 0;"></div>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>