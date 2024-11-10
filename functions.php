<?php


/**
 *  https://developer.wordpress.org/themes/basics/theme-functions/
 */
require_once get_template_directory() . '/functions/setup.php'; // --- Theme setup ---
require_once get_template_directory() . '/functions/enqueues.php'; // --- Include CSS & JavaScript ---
require_once get_template_directory() . '/functions/images.php'; // --- Image settings ---
require_once get_template_directory() . '/functions/navmenus.php'; // --- Register navmenus ---
require_once get_template_directory() . '/functions/sidebars.php'; // --- Register sidebars ---
require_once get_template_directory() . '/functions/lib/class-wp-bootstrap-navwalker.php'; // --- Nav Walker ---


// --- Register Custom Post Types & Taxonomies --- //
foreach (glob(get_template_directory() . '/functions/cpt/*.php') as $cpt) {
  require_once $cpt;
};

// --- Add Theme Functions --- //
require_once get_template_directory() . '/functions/global.php'; // --- Various global functions ---
require_once get_template_directory() . '/functions/integrations/acf.php'; // --- ACF integration ---
require_once get_template_directory() . '/functions/integrations/acf-icon/acf-icon-picker.php'; // --- ACF integration ---
require_once get_template_directory() . '/functions/integrations/cf7.php'; // --- Contact Form 7 integration ---
// require_once get_template_directory() . '/functions/searchfilter.php'; // --- Search results filter ---
require_once get_template_directory() . '/functions/cleanup.php'; // --- Cleanup ---
require_once get_template_directory() . '/functions/custom.php'; // --- Custom user functions ---
require_once get_template_directory() . '/functions/admin.php'; // --- Custom user functions ---

require_once get_template_directory() . '/functions/global_function/html_block.php'; // --- Html Block functions ---


// --- Contact Mail PHP --- //
//require_once get_template_directory() . '/dist/assets/php/contact.php'; // --- Custom user functions ---


// --- ACF Gutenberg Blocks --- //
require_once get_template_directory() . '/functions/integrations/acf-gutenberg-block/acf-gutenberg-block.php'; // --- Custom user functions ---


// --- Add Comment Helper --- //
require_once get_template_directory() . '/functions/lib/comments-helper.php'; // --- Comments Helper ---
require_once get_template_directory() . '/functions/comments-reply.php'; // --- Comments Reply Functions ---

// --- Add like dislike function --- // 
require_once get_template_directory() . '/functions/lib/like_dislike.php'; // --- Like Dislike Functions ---



// --- Add like dislike function --- // 
require_once get_template_directory() . '/functions/lib/loadmore/loadmore.php'; // --- Load More Ajax Projects Functions ---



// --- Check ACF ---//
if (!function_exists('get_field')) {
  add_action('template_redirect', 'template_redirect_warning_missing_acf', 0);
  function template_redirect_warning_missing_acf()
  {
    wp_die(sprintf(__('This theme can\'t work without ACF PRO plugin. <a href="%s">Please login to admin</a>, and activate it !', 'codeweber'), wp_login_url()));
  }
}






// --- Customizer --- //
require_once get_template_directory() . '/functions/customize.php'; // --- Customizer ---


// --- Widgets ---//
require_once get_template_directory() . '/functions/widgets.php'; // --- Custom Widgets ---


// --- Classes --- //
require_once get_template_directory() . '/functions/cw_classes/cw_classes.php'; // --- Classes CW ---
require_once get_template_directory() . '/functions/classes/classes.php'; // --- Classes OLD ---


// --- Woocommerce ---//
if (class_exists('WooCommerce')) {
  require_once get_template_directory() . '/functions/woocommerce/woocommerce.php'; // --- Woocommerce Functions ---
}


// Регистрируем новый REST API endpoint
function cf7_forms_list_endpoint()
{
  register_rest_route('custom-api/v1', '/cf7-forms', [
    'methods' => 'GET',
    'callback' => 'get_cf7_forms_list',
    'permission_callback' => '__return_true', // Доступ разрешён для всех (опционально)
  ]);
}

// Функция для получения списка форм CF7
function get_cf7_forms_list()
{
  if (!defined('WPCF7_VERSION')) {
    return new WP_Error('cf7_not_active', 'Плагин Contact Form 7 не установлен или не активирован.', ['status' => 404]);
  }

  // Параметры для получения всех форм CF7
  $args = [
    'post_type' => 'wpcf7_contact_form',
    'posts_per_page' => -1, // Получаем все формы
  ];
  $forms_query = new WP_Query($args);

  // Если формы не найдены
  if (!$forms_query->have_posts()) {
    return new WP_Error('no_forms_found', 'Формы не найдены.', ['status' => 404]);
  }

  // Создаем массив с данными форм
  $forms_data = [];
  while ($forms_query->have_posts()) {
    $forms_query->the_post();
    $forms_data[] = [
      'id' => get_the_ID(),
      'title' => get_the_title(),
    ];
  }

  // Сбрасываем запрос WP_Query
  wp_reset_postdata();

  return rest_ensure_response($forms_data);
}

// Хук для регистрации endpoint'а
add_action('rest_api_init', 'cf7_forms_list_endpoint');





function add_custom_script_to_footer()
{
?>
  <script>
    window.addEventListener("DOMContentLoaded", function() {
      // Выбираем все элементы с классом "tel-mask"
      document.querySelectorAll(".tel-mask").forEach(function(e) {
        var a;

        function t(e) {
          e.keyCode && (a = e.keyCode);
          this.selectionStart < 3 && e.preventDefault();
          var t = "+7 (___) ___-__-__",
            i = 0,
            s = t.replace(/\D/g, ""),
            n = this.value.replace(/\D/g, ""),
            r = t.replace(/[_\d]/g, function(e) {
              return i < n.length ? n.charAt(i++) || s.charAt(i) : e;
            }),
            t =
            (-1 != (i = r.indexOf("_")) &&
              (i < 5 && (i = 3), (r = r.slice(0, i))),
              t
              .substr(0, this.value.length)
              .replace(/_+/g, function(e) {
                return "\\d{1," + e.length + "}";
              })
              .replace(/[+()]/g, "\\$&"));

          (!(t = new RegExp("^" + t + "$")).test(this.value) ||
            this.value.length < 5 ||
            (47 < a && a < 58)) &&
          (this.value = r),
          "blur" == e.type && this.value.length < 5 && (this.value = "");
        }

        // Назначаем события каждому полю с маской
        e.addEventListener("input", t, false);
        e.addEventListener("focus", t, false);
        e.addEventListener("blur", t, false);
        e.addEventListener("keydown", t, false);
      });
    });
  </script>
<?php
}

add_action('wp_footer', 'add_custom_script_to_footer');
