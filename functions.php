<?php
/**
 * bmxschool functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bmxschool
 */

if (!function_exists("bmxschool_setup")):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bmxschool_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bmxschool, use a find and replace
		 * to change 'bmxschool' to the name of your theme in all the template files.
		 */
		load_theme_textdomain(
			"bmxschool",
			get_template_directory() . "/assets/languages"
		);

		// Add default posts and comments RSS feed links to head.
		add_theme_support("automatic-feed-links");

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support("title-tag");

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support("post-thumbnails");

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus([
			"primary" => esc_html__("Primary", "bmxschool"),
			"main-menu" => esc_html__("Main Menu", "bmxschool"),
			"image-menu" => esc_html__("Image Menu", "bmxschool"),
		]);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support("html5", [
			"search-form",
			"comment-form",
			"comment-list",
			"gallery",
			"caption",
		]);

		// Set up the WordPress core custom background feature.
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'bmxschool_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

		// Add theme support for selective refresh for widgets.
		add_theme_support("customize-selective-refresh-widgets");

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support("custom-logo", [
			"height" => 250,
			"width" => 250,
			"flex-width" => true,
			"flex-height" => true,
		]);

		add_theme_support("category-thumbnails");
	}
endif;
add_action("after_setup_theme", "bmxschool_setup");

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bmxschool_content_width()
{
	$GLOBALS["content_width"] = apply_filters("bmxschool_content_width", 640);
}
add_action("after_setup_theme", "bmxschool_content_width", 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bmxschool_widgets_init()
{
	register_sidebar([
		"name" => esc_html__("Sidebar", "bmxschool"),
		"id" => "sidebar-1",
		"description" => esc_html__("Add widgets here.", "bmxschool"),
		"before_widget" => '<section id="%1$s" class="widget %2$s">',
		"after_widget" => "</section>",
		"before_title" => '<h2 class="widget-title">',
		"after_title" => "</h2>",
	]);
}
add_action("widgets_init", "bmxschool_widgets_init");

/**
 * Enqueue scripts and styles.
 */
function bmxschool_scripts() {

	wp_enqueue_style( 'bmxschool-style', get_template_directory_uri() . '/dist/css/style.css', array(), '1.09');

	// Include our dynamic styles.
	// $custom_css = bmxschool_dynamic_styles();
	// wp_add_inline_style( 'bmxschool-style', $custom_css );

	wp_enqueue_script(
		"bmxschool-app",
		get_template_directory_uri() . "/dist/js/main.js",
		[],
		"",
		true
	);

	if (is_singular() && comments_open() && get_option("thread_comments")) {
		wp_enqueue_script("comment-reply");
	}

	/* 	if ( is_singular() && is_product()) {
		// wp_enqueue_script( 'single-product-add-to-cart', get_template_directory_uri() . '/dist/js/single-product-add-to-cart.js', array(), '10.45', true );

		// add_filter( 'wp_enqueue_scripts', 'wp_enqueue_my_scripts', 0 );
		// or if you enqueue your scripts on init action
		// add_action( 'init', 'wpse8170_enqueue_my_scripts', 0 );

		// function wp_enqueue_my_scripts() {
			wp_enqueue_script( 'easyzoom', get_template_directory_uri() . '/dist/js/easyzoom.js', array(), '1.0', true );
			wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/dist/js/magnific-popup.js', array(), '1.0', true );
			wp_enqueue_script( 'slick', get_template_directory_uri() . '/dist/js/slick.js', array(), '1.0', true );
			wp_enqueue_script( 'handleProductVariationChange', get_template_directory_uri() . '/dist/js/handleProductVariationChange.js', array(), '1.0', true );
			// my else scripts go here...
		// }

		wp_register_script('handleProductVariationChange', get_template_directory_uri() . '/dist/js/handleProductVariationChange.js', array('jquery') ); 
		wp_localize_script('handleProductVariationChange', 'ajax_params', 
		  array(
			  'ajaxurl' => admin_url('admin-ajax.php'),
		  ));
		// wp_enqueue_script('handleProductVariationChange');

	} */
}
add_action("wp_enqueue_scripts", "bmxschool_scripts");

/* FONTS */

function wpb_add_google_fonts()
{
	wp_enqueue_style(
		"wpb-google-fonts",
		"https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap",
		false
	);
}
add_action("wp_enqueue_scripts", "wpb_add_google_fonts");

add_theme_support( 'admin-bar', array( 'callback' => 'my_admin_bar_css') );
function my_admin_bar_css()
{
?>
<style type="text/css" media="screen">
html body {
    margin-top: 28px !important;
}
</style>
<?php
}

function my_login_logo_one() { 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<style type="text/css">
body.login div#login h1 a {
    background-image: url(<?php echo $image[0]; ?>);
    width: 100%;
    height: 100%;
    background-size: contain;
    padding-bottom: 30px;
}
</style>
<?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

add_theme_support('category-thumbnails');

add_theme_support( 'post-thumbnails' ); 

//YOAST

// Move Yoast to the bottom of WP page/post editor
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

//Increase size of yoast fb image for better quality
function set_custom_facebook_image_size( $img_size ) {
    return 'large';
}
add_filter( 'wpseo_opengraph_image_size', 'set_custom_facebook_image_size' );


function footer_copyright()
{
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = "";
	if ($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->lastdate;
		// if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
		// 	$copyright .= "-" . $copyright_dates[0]->lastdate;
		// }
		$output = $copyright;
	}
	return $output;
}


// Remove filters

remove_filter('term_description','wpautop');

// Posts navigation

function my_posts_navigation()
{
?>
<div class="post-navigation">

    <div>
        <?php
		$prev_post = get_adjacent_post(false, '', true);
		if(!empty($prev_post)) {
		echo '<a class="link-none" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><span class="post-navigation__prev">Poprzedni</span><p>' . mb_strimwidth( html_entity_decode($prev_post->post_title), 0, 60, '...' ) . '</p></a>'; }
		?>
    </div>

    <div>
        <?php
		$next_post = get_adjacent_post(false, '', false);
		if(!empty($next_post)) {
		echo '<a class="link-none" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"><span class="post-navigation__next">Następny</span><p>' . mb_strimwidth( html_entity_decode($next_post->post_title), 0, 60, '...' ) . '</p></a>'; }
		?>
    </div>

</div>

<?php
}

/* WOOCOMMERCE */

/*Declare WooCommerce support */
// function mytheme_add_woocommerce_support() {
// 	add_theme_support( 'woocommerce' );
// }
// add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// add_action( 'init', function(){
// 	add_post_type_support( 'product', 'page-attributes' );
// });

// function disable_woo_commerce_sidebar() {
// 	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
// }
// add_action('init', 'disable_woo_commerce_sidebar');

/* Hide shipping from cart template */

// add_filter( 'woocommerce_cart_needs_shipping', 'filter_cart_needs_shipping' );
// function filter_cart_needs_shipping( $needs_shipping ) {
//     if ( is_cart() ) {
//         $needs_shipping = false;
//     }
//     return $needs_shipping;
// }

// add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
// function reduce_min_strength_password_requirement( $strength ) {
//     // 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
//     return 1;
// }

// function custom_override_default_address_fields( $address_fields ) {
// 	$address_fields['address_1']['label'] = 'Ulica';
// 	$address_fields['address_1']['placeholder'] = '';
// 	$address_fields['address_2']['label'] = 'Numer domu/mieszkania';
// 	$address_fields['address_2']['placeholder'] = '';
// 	$address_fields['address_2']['required'] = true; // Making Address 2 field required

// 	return $address_fields;
// }
// add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );

/* Pole Numer domu/mieszkania - BILLING */

// function display_billing_address_2_field($billing_fields){

// 	$billing_fields['billing_address_2'] = array(
// 		'type' => 'text',
// 		'label' =>  __('Numer domu/mieszkania',  'woocommerce' ),
// 		'class' => array('validate-required'),
// 		'required' => true,
// 	);

//    return $billing_fields;
// }
// add_filter('woocommerce_billing_fields' , 'display_billing_address_2_field');

/* Pole Numer domu/mieszkania - SHIPPING */

// function display_shipping_address_2_field($billing_fields){

// 	$billing_fields['shipping_address_2'] = array(
// 		'type' => 'text',
// 		'label' =>  __('Numer domu/mieszkania',  'woocommerce' ),
// 		'class' => array('validate-required'),
// 		'required' => true,
// 	);

//    return $billing_fields;
// }
// add_filter('woocommerce_shipping_fields' , 'display_shipping_address_2_field');

/* Pole na NIP */

//    function display_billing_vat_fields($billing_fields){

// 	   $billing_fields['billing_nip'] = array(
// 		   'type' => 'text',
// 		   'label' =>  __('NIP',  'woocommerce' ),
// 		//    'placeholder'   => __( 'Uzupełnij aby otrzymać fakturę VAT' ),
// 		   'class' => array('form-row-wide'),
// 		   'required' => false,
// 		   'clear' => true,
// 		   'priority' => 35, // To change the field location increase or decrease this value
// 	   );

// 	   return $billing_fields;
//    }
//    add_filter('woocommerce_billing_fields' , 'display_billing_vat_fields');

/**
 * Save VAT Number in the order meta
 */
// function wpdesk_checkout_vat_number_update_order_meta( $order_id ) {
//     if ( ! empty( $_POST['billing_nip'] ) ) {
//         update_post_meta( $order_id, '_billing_nip', sanitize_text_field( $_POST['billing_nip'] ) );
//     }
// }
// add_action( 'woocommerce_checkout_update_order_meta', 'wpdesk_checkout_vat_number_update_order_meta' );

/**
 * Wyświetlenie pola NIP
 */
// function wpdesk_vat_number_display_admin_order_meta( $order ) {
//     echo '<p><strong>' . __( 'NIP', 'woocommerce' ) . ':</strong> ' . get_post_meta( $order->id, '_billing_nip', true ) . '</p>';
// }
// add_action( 'woocommerce_admin_order_data_after_billing_address', 'wpdesk_vat_number_display_admin_order_meta', 10, 1 );

/**
 * Wyświetlenie pola NIP w mailu
 */

// function wpdesk_vat_number_display_email( $keys ) {
//      $keys['NIP'] = '_billing_nip';
//      return $keys;
// }
// add_filter( 'woocommerce_email_order_meta_keys', 'wpdesk_vat_number_display_email' );

// function display_email_order_user_meta( $order, $sent_to_admin, $plain_text ) {
//     echo 'NIP: ' . get_post_meta( $order->id, '_billing_nip', true ) . '';
// }
// add_action('woocommerce_email_customer_details', 'display_email_order_user_meta', 30, 3 );

/* Pole "Chcę Fakturę" */

// function display_billing_faktura_firma($billing_fields){

// 	$billing_fields['billing_faktura_firma'] = array(
// 		'type' => 'checkbox',
// 		'label' =>  __('Chcę otrzymać fakturę VAT',  'woocommerce' ),
// 		'class' => array('woocommerce-form__label-for-checkbox'),
// 		'required' => false,
// 		'clear' => true,
// 		'priority' => 40, // To change the field location increase or decrease this value
// 	);

// 	return $billing_fields;
// }
// add_filter('woocommerce_billing_fields' , 'display_billing_faktura_firma');

/**
 * Zapisz wartość flagi "billing_faktura_firma" w order meta
 */
// function wpdesk_checkout_billing_faktura_firma_order_meta( $order_id ) {
//     if ( ! empty( $_POST['billing_faktura_firma'] ) ) {
//         update_post_meta( $order_id, '_billing_faktura_firma', sanitize_text_field( $_POST['billing_faktura_firma'] ) );
//     }
// }
// add_action( 'woocommerce_checkout_update_order_meta', 'wpdesk_checkout_billing_faktura_firma_order_meta' );

/**
 * Wyświetlenie wartość flagi "billing_faktura_firma" w panelu admina (Podgląd zamówienia)
 */
// function wpdesk_billing_faktura_firma_admin_order_meta( $order ) {

// 	$do_client_want_invoice_text;

// 	if (get_post_meta( $order->id, '_billing_faktura_firma', true ) == 1) {
// 		$do_client_want_invoice_text = "Tak";
// 	} else {
// 		$do_client_want_invoice_text = "Nie";
// 	}

//     echo '<p><strong>' . __( 'Chcę fakturę', 'woocommerce' ) . ':</strong> ' . $do_client_want_invoice_text . '</p>';
// }
// add_action( 'woocommerce_admin_order_data_after_billing_address', 'wpdesk_billing_faktura_firma_admin_order_meta', 10, 1 );

/**
 * Notify admin when a new customer account is created
 */
// function woocommerce_created_customer_admin_notification( $customer_id ) {
//   wp_send_new_user_notifications( $customer_id, 'admin' );
// }
// add_action( 'woocommerce_created_customer', 'woocommerce_created_customer_admin_notification' );

// function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $blogname ) {

// 	$user_count = count_users();

// 	$wp_new_user_notification_email['headers'] = 'From: Sklep <'.get_option('blogname').'@'.get_option('blogname').'.pl> \n\r cc: Admin <'.get_option('admin_email').'>';
//     $wp_new_user_notification_email['subject'] = sprintf( '[%s] Nowy użytkownik %s .', $blogname, $user_role, $user->user_login );
//     $wp_new_user_notification_email['message'] = sprintf( "%s ( %s ) zarejestrował się w Twoim sklepie %s.", $user->user_login, $user->user_email, $blogname ) .
// 	"\n" . sprintf("Gratulacje, to twój %d zarejestrowany użytkownik!", $user_count['total_users']);
//     return $wp_new_user_notification_email;
// }
// add_filter( 'wp_new_user_notification_email_admin', 'custom_wp_new_user_notification_email', 10, 3 );

/* MENUS */

// Mobile menu

add_filter("wp_nav_menu_objects", "my_wp_nav_menu_objects", 10, 2);

function my_wp_nav_menu_objects($items, $args)
{
	// loop
	foreach ($items as &$item) {
		// $item->title .= '<span>'. $item->classes . '</span>';
		// vars
		$menu_item_image = get_field("menu_item_image", $item);
		$menu_item_image_position_horizontal = get_field(
			"menu_item_image_position_horizontal",
			$item
		);
		$menu_item_image_position_vertical = get_field(
			"menu_item_image_position_vertical",
			$item
		);

		// var_dump($menu_item_image);

		// append bg image
		if ($menu_item_image) {
			// $item->title .= '<span>'. $item->classes . '</span>';
			$item->title .=
				'<div class="menu_item_image__wrapper"><span class="menu_item_image" style="background-image: url(' .
				$menu_item_image["url"] .
				"); background-position: " .
				$menu_item_image_position_horizontal .
				"% " .
				$menu_item_image_position_vertical .
				'%"></span></div>';
		}
	}
	// return
	return $items;
}

// // Add ACF field (Image menu)

// foreach( $items as &$item ) {
// 	// $item->title .= '<span>'. $item->classes . '</span>';
// 	// vars
// 	$menu_item_image = get_field('menu_item_image', $item);

// 			// append bg image
// 	if( $menu_item_image ) {
// 				// $item->title .= '<span>'. $item->classes . '</span>';
// 		$item->title .= ' <span class="menu-thumbnail-image test" style="background-image: url('. $menu_item_image .')"></span>';

// 	}
// }

add_filter("wp_nav_menu_objects", "wpdocs_add_menu_parent_class", 11, 3);

function wpdocs_add_menu_parent_class($items)
{
	$parents = [];

	// Collect menu items with parents.
	foreach ($items as $item) {
		if ($item->menu_item_parent && $item->menu_item_parent > 0) {
			$parents[] = $item->menu_item_parent;
		}
	}

	// Add class.
	foreach ($items as $item) {
		if (in_array($item->ID, $parents)) {
			$item->classes[] = "menu-parent-link"; //here attach the class
			// $item->title .= ' <span class="show-submenu"></span>';
		}
	}

	return $items;
}

function prefix_add_button_after_menu_item_children(
	$item_output,
	$item,
	$depth,
	$args
) {
	if (
		in_array("menu-item-has-children", $item->classes) ||
		in_array("page_item_has_children", $item->classes)
	) {
		$item_output = str_replace(
			$args->link_after . "</a>",
			$args->link_after .
				'</a><span class="show-submenu" aria-expanded="false" aria-pressed="false"></span>',
			$item_output
		);
	}

	return $item_output;
}
add_filter(
	"walker_nav_menu_start_el",
	"prefix_add_button_after_menu_item_children",
	10,
	4
);

class Has_Child_Walker_Nav_Menu extends Walker_Nav_Menu
{
	public function display_element(
		$element,
		&$children_elements,
		$max_depth,
		$depth,
		$args,
		&$output
	) {
		if (!$element) {
			return;
		}
		$element->has_children = !empty(
			$children_elements[$element->{$this->db_fields["id"]}]
		);
		parent::display_element(
			$element,
			$children_elements,
			$max_depth,
			$depth,
			$args,
			$output
		);
	}
}

/**
 * Add a custom menu item to the end of a specific menu that uses the wp_nav_menu() function
 */

// add_filter('wp_nav_menu_items','add_custom_menu_item', 10, 2);

// function add_custom_menu_item( $nav, $args ) {

// 	if( $args->theme_location == 'primary') {

// 		$search_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/search.svg");
// 		$account_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/account-icon-logged-out.svg");
// 		$cart_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/cart.svg");
// 		$heart_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/heart.svg");

// 		$custom_menu_item_content = '
// 			<div class="shop-icons-wrapper shop-icons-wrapper-desktop">

// 				<div class="search-icon-wrapper">
// 					<a class="">
// 						'.$search_icon.'
// 					</a>
// 				</div>

// 				<div class="heart-icon-wrapper">
// 					<a class="">
// 						'.$heart_icon.'
// 					</a>
// 				</div>

// 				<div class="myaccount-icon-wrapper">
// 					<a class="myaccount-link myaccount-link-unlogged wrapper-flex-column" href="'.get_permalink( wc_get_page_id( 'myaccount' ) ).'">
// 						'.$account_icon .'
// 					</a>
// 				</div>

// 				<div class="cart-icon-wrapper">
// 					<a class="cart-customlocation cart-customlocation-placeholder">
// 						<div class="cart-wrapper">
// 							<span class="cart-icon-wrapper">
// 								'.$cart_icon.'
// 								<span id="cart-counter">0</span>
// 							</span>

// 							</span>
// 						</div>
// 					</a>
// 				</div>

// 			</div>
// 		';

// 		return $nav."<li class='menu-item custom-menu-item'>".$custom_menu_item_content."</li>";
// 	}

// 	return $nav;
// }

/* SEARCH PRODUCTS */

// function search_products() {
// 	$search_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/search.svg");

// 	$search_products_content = '
// 		<div class="shop-icons-wrapper search-container">

// 			'.do_shortcode('[fibosearch]').'

// 		</div>
// 	';

// 	return $search_products_content;
// }

/* CUSTOMER PANEL */

// function customer_panel() {

// 	$account_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/account-icon-logged-out.svg");
// 	$cart_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/cart.svg");
// 	$heart_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/heart.svg");

// 	$customer_panel_content = '

// 		<div class="customer-panel">

// 			<div class="shop-icons-wrapper">

// 				<div class="heart-icon-wrapper">
// 					<a class="">
// 						'.$heart_icon.'
// 					</a>
// 				</div>

// 				<div class="myaccount-icon-wrapper">
// 					<a class="myaccount-link myaccount-link-unlogged wrapper-flex-column" href="'.get_permalink( wc_get_page_id( 'myaccount' ) ).'">
// 						'.$account_icon .'
// 					</a>
// 				</div>

// 				<div class="cart-icon-wrapper">
// 					<a class="cart-customlocation cart-customlocation-placeholder">
// 						<div class="cart-wrapper">
// 							<span class="cart-icon-wrapper">
// 								'.$cart_icon.'
// 								<span id="cart-counter">0</span>
// 							</span>

// 							</span>
// 						</div>
// 					</a>
// 				</div>

// 			</div>

// 		</div>
// 		';

// 		return $customer_panel_content;
// }

/**
 * Show number of items in a cart and their value
 */

/* add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	$cart_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/cart.svg");

	?>
<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('Pokaż koszyk', 'woothemes'); ?>">

    <div class="cart-wrapper">

        <?php
						echo $cart_icon
					?>

        <span id="cart-counter"><?php echo sprintf($woocommerce->cart->cart_contents_count);?></span>
    </div>

</a>
<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
} */

// Remove trash icon at cart page and then add a new one.

/* add_filter('woocommerce_cart_item_remove_link', 'remove_icon_and_add_text', 10, 2);

function remove_icon_and_add_text($string, $cart_item_key) {

	$remove_icon = file_get_contents(get_template_directory() . "/dist/dist/svg/remove.svg");

    $string = str_replace('class="remove"', '', $string);
    return str_replace('&times;', '<div class="cart-remove-icon">'.$remove_icon.'</div>', $string);
} */

/* function add_percentage_to_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // Get all variation prices
      $prices = $product->get_variation_prices();

      // Loop through variation prices
      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

      // Get all variation prices
      $children_ids = $product->get_children();

      // Loop through variation prices
      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = ( floatval( $prices['regular_price'][ $key ] ) - floatval( $price ) ) / floatval( $prices['regular_price'][ $key ] ) * 100;
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }
  return '<span class="onsale sales-badge">' . esc_html__( '-', 'woocommerce' ) . ' ' . $percentage . '</span>';
}

add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 ); */

// Alter WooCommerce View Cart Text
/* add_filter( 'gettext', function( $translated_text ) {
    if ( 'View cart' === $translated_text ) {
        $translated_text = 'Pokaż koszyk';
    }
    return $translated_text;
} ); */

//badge 'new' for recent products

/* function bbloomer_new_badge_shop_page() {
   global $product;
   $newness_days = 14;
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="itsnew">' . esc_html__( 'Nowość!', 'woocommerce' ) . '</span>';
   }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_new_badge_shop_page', 3 ); */

//badge 'bestseller'

// function bbloomer_best_badge_shop_page() {
//    global $product;
//    if ( has_term( 23, 'product_cat' ) ) {
// 	  echo '<div class="bestseller-wrapper">';
// 	  echo '<span class="bestseller"></span>';
// 	  echo '<span>' . esc_html__( 'bestseller', 'woocommerce' ) . '</span>';
// 	  echo '</div>';
//    }
// }
// add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_best_badge_shop_page', 3 );

// SINGLE PRODUCT LAYOUT

//Title
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// add_action( 'my_woocommerce_before_single_product', 'woocommerce_template_single_title', 5 );

//Sale Badge
// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
// add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 5 );

//Rating
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
// add_action( 'my_woocommerce_before_single_product', 'woocommerce_template_single_rating', 10 );

//Meta information
remove_action(
	"woocommerce_single_product_summary",
	"woocommerce_template_single_meta",
	40
);
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 60 );

//SINGLE PRODUCT FUNCTIONALITIES

// “Add to cart” with AJAX

/* function woocommerce_ajax_add_to_cart_js() {
    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('woocommerce-ajax-add-to-cart', get_template_directory_uri() . '/dist/js/ajax-add-to-cart.js', array('jquery'), '', true);
    }
}
add_action('wp_enqueue_scripts', 'woocommerce_ajax_add_to_cart_js', 99);

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {

            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
            $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
            $variation_id = absint($_POST['variation_id']);
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
            $product_status = get_post_status($product_id);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

                do_action('woocommerce_ajax_added_to_cart', $product_id);

                if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                    wc_add_to_cart_message(array($product_id => $quantity), true);
                }

                WC_AJAX :: get_refreshed_fragments();
            } else {

                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);
            }

            wp_die();
} */

/* VARIATION GALLERY SCRIPTS */

// Render fields at the bottom of variations
/* add_action( 'woocommerce_product_after_variable_attributes', function( $loop, $variation_data, $variation ) {
    global $abcdefgh_i; // Custom global variable to monitor index
    $abcdefgh_i = $loop;
    // Add filter to update field name
    add_filter( 'acf/prepare_field', 'acf_prepare_field_update_field_name' );
    
    // Loop through all field groups
    $acf_field_groups = acf_get_field_groups();
    foreach( $acf_field_groups as $acf_field_group ) {
        foreach( $acf_field_group['location'] as $group_locations ) {
            foreach( $group_locations as $rule ) {
                // See if field Group has at least one post_type = Variations rule - does not validate other rules
                if( $rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == 'product_variation' ) {
                    // Render field Group
                    acf_render_fields( $variation->ID, acf_get_fields( $acf_field_group ) );
                    break 2;
                }
            }
        }
    }
    
    // Remove filter
    remove_filter( 'acf/prepare_field', 'acf_prepare_field_update_field_name' );
}, 10, 3 ); */

// Filter function to update field names
/* function  acf_prepare_field_update_field_name( $field ) {
    global $abcdefgh_i;
    $field['name'] = preg_replace( '/^acf\[/', "acf[$abcdefgh_i][", $field['name'] );
    return $field;
}
     */
// Save variation data
/* add_action( 'woocommerce_save_product_variation', function( $variation_id, $i = -1 ) {
    // Update all fields for the current variation
    if ( ! empty( $_POST['acf'] ) && is_array( $_POST['acf'] ) && array_key_exists( $i, $_POST['acf'] ) && is_array( ( $fields = $_POST['acf'][ $i ] ) ) ) {
        foreach ( $fields as $key => $val ) {
            update_field( $key, $val, $variation_id );
        }
    }
}, 10, 2 );
 */

/* add_action('acf/input/admin_footer', 'my_acf_input_admin_footer'); */

/* function my_acf_input_admin_footer() {
?>
<script type="text/javascript">
(function($) {
    $(document).on('woocommerce_variations_loaded', function() {
        acf.do_action('append', $('#post'));
    })
})(jQuery);
</script>
<?php      
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6130aca96fd38',
	'title' => 'Variable Products',
	'fields' => array(
		array(
			'key' => 'field_6130acba404e1',
			'label' => 'variation gallery',
			'name' => 'variation_gallery',
			'type' => 'gallery',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'insert' => 'append',
			'library' => 'all',
			'min' => '',
			'max' => '',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product_variation',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

function get_variation_gallery_with_ajax() {

	$variation_value = $_POST['variation_value'];
	$product_id = $_POST['product_id'];
	$product = new WC_product($product_id);

	$variation_object_for_ajax  = (object) [
		'product_id' => $product_id,
		'variation_id' => [],
		'variation_value' => $variation_value,
		'variation_main_image_url_thumbnail' => [],
		'variation_main_image_url_fullsize' => [],
		'variation_gallery_urls_thumbnails' => [],
		'variation_gallery_urls_fullsize' => [],
		'console_log' => [],
	];

	$product_gallery = $product->get_gallery_image_ids();

	if ( $product_gallery ) {
		foreach ( $product_gallery as $gallery_picture_id ) {
			array_push($variation_object_for_ajax->product_gallery_urls_thumbnails, wp_get_attachment_image_src($gallery_picture_id, "thumbnail"));
			array_push($variation_object_for_ajax->product_gallery_urls_fullsize, wp_get_attachment_image_src($gallery_picture_id, "fullsize"));
	}}

	$args = array(
		'post_type'     => 'product_variation',
		'numberposts'   => -1,
		'post_parent'   => $product_id // get parent post-ID
	);

	$variations = get_posts( $args );

	foreach ( $variations as $variation ) {

		$variation_ID = $variation->ID;
		$product_variation = new WC_Product_Variation( $variation_ID );
		$variation_name = implode(" / ", $product_variation->get_variation_attributes());

		$variation_main_image_id = $product_variation->get_image_id();

		if ($variation_name == $variation_value) {

			array_push($variation_object_for_ajax->variation_id, $variation_ID);
			array_push($variation_object_for_ajax->variation_gallery_urls_thumbnails, wp_get_attachment_image_src($variation_main_image_id, "thumbnail"));
			array_push($variation_object_for_ajax->variation_gallery_urls_fullsize, wp_get_attachment_image_src($variation_main_image_id, "fullsize"));
			
		}
	}

	$variation_gallery = get_post_meta( $variation_object_for_ajax->variation_id[0] , 'variation_gallery', true );

	if ($variation_gallery) {
		foreach($variation_gallery as $gallery_picture_id) :
			array_push($variation_object_for_ajax->variation_gallery_urls_thumbnails, wp_get_attachment_image_src($gallery_picture_id, "thumbnail"));
			array_push($variation_object_for_ajax->variation_gallery_urls_fullsize, wp_get_attachment_image_src($gallery_picture_id, "full"));
		endforeach;
	}

	print_r(json_encode($variation_object_for_ajax ));
		
	die();

}

add_action( 'wp_ajax_nopriv_get_variation_gallery_with_ajax', 'get_variation_gallery_with_ajax' );
add_action( 'wp_ajax_get_variation_gallery_with_ajax', 'get_variation_gallery_with_ajax' );

function get_product_main_image_and_gallery_with_ajax() {

	$variation_value = $_POST['variation_value'];
	$product_id = $_POST['product_id'];
	$product = new WC_product($product_id);

	$product_main_image_and_gallery  = (object) [
		'product_id' => $product_id,
		'product_main_image_url' => [],
		'product_gallery_urls_thumbnails' => [],
		'product_gallery_urls_fullsize' => [],
		'variation_value' => $variation_value,
		'console_log' => [],
	];

	$product_main_image_url_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), "thumbnail ");
	$product_main_image_url_fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), "fullsize");

	array_push($product_main_image_and_gallery->product_gallery_urls_thumbnails, $product_main_image_url_thumbnail);
	array_push($product_main_image_and_gallery->product_gallery_urls_fullsize, $product_main_image_url_fullsize);

	$product_gallery = $product->get_gallery_image_ids();

	if ( $product_gallery ) {
		foreach ( $product_gallery as $gallery_picture_id ) {
			array_push($product_main_image_and_gallery->product_gallery_urls_thumbnails, wp_get_attachment_image_src($gallery_picture_id, "thumbnail"));
			array_push($product_main_image_and_gallery->product_gallery_urls_fullsize, wp_get_attachment_image_src($gallery_picture_id, "fullsize"));
	}}

	print_r(json_encode( $product_main_image_and_gallery ));
		
	die();

}

add_action( 'wp_ajax_nopriv_get_product_main_image_and_gallery_with_ajax', 'get_product_main_image_and_gallery_with_ajax' );
add_action( 'wp_ajax_get_product_main_image_and_gallery_with_ajax', 'get_product_main_image_and_gallery_with_ajax' ); */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . "/inc/custom-header.php";

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . "/inc/template-tags.php";

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . "/inc/template-functions.php";

/**
 * Customizer additions.
 */
require get_template_directory() . "/inc/customizer.php";

/**
 * Generating dynamic sytles.
 */
require get_template_directory() . "/inc/dynamic-styles.php";