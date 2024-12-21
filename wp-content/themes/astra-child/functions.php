<?php
/**
 * Parasol Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Parasol
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_PARASOL_VERSION', '1.0.0' );

require 'custom-shortcodes.php';
/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'parasol-theme-css', get_stylesheet_directory_uri() . '/style.css', array( 'astra-theme-css' ), CHILD_THEME_PARASOL_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );
function loadup_scripts() {
	wp_enqueue_script( 'scriptjs', get_theme_file_uri() . '/build/scripts.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'owl-carousel', get_theme_file_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'OwlCarousel2Thumbs', get_theme_file_uri() . '/js/OwlCarousel2Thumbs.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'owl-style-min', get_theme_file_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-style-min', get_theme_file_uri() . '/css/owl.theme.min.css' );
	wp_enqueue_style( 'owl-style-def', get_theme_file_uri() . '/css/owl.theme.default.css' );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts', 'child_enqueue_styles', 15 );
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/blocks/testimonial' );
}
function new_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
function mytheme_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

function ti_custom_javascript() {
	?>
		<script>
			
			window.addEventListener("load", ()=>{
			var wrapper = document.getElementById("wrapper");

document.addEventListener("click", function (event) {
	if (!event.target.matches(".list")) return;

	// List view
	event.preventDefault();
	wrapper.classList.add("list");
	wrapper.classList.remove("grid-sm", "spaces-map", "grid-lg");
});

document.addEventListener("click", function (event) {
	if (!event.target.matches(".grid")) return;

	// 2 grid view
	event.preventDefault();
		wrapper.classList.add("grid-lg");
	wrapper.classList.remove("list", "grid-sm", "spaces-map");
});
				
document.addEventListener("click", function (event) {
	if (!event.target.matches(".grid-2")) return;

	// 3 grid view
	event.preventDefault();
	wrapper.classList.add("grid-sm");
	wrapper.classList.remove("list", "spaces-map", "grid-lg");
});		
				document.addEventListener("click", function (event) {
	if (!event.target.matches(".map")) return;
	// Map view
	event.preventDefault();
	wrapper.classList.add("spaces-map");
	wrapper.classList.remove("list");
});
				});	
			window.addEventListener("load", ()=>{
			var wrapper = document.getElementById("view-buttons");

document.addEventListener("click", function (event) {
	if (!event.target.matches(".list")) return;
	// List view
	event.preventDefault();
	wrapper.classList.add("list");
	wrapper.classList.remove("grid-sm", "spaces-map", "grid-lg");
});
document.addEventListener("click", function (event) {
	if (!event.target.matches(".grid")) return;
	// 2 grid view
	event.preventDefault();
		wrapper.classList.add("grid-lg");
	wrapper.classList.remove("list", "grid-sm", "spaces-map");
});			
document.addEventListener("click", function (event) {
	if (!event.target.matches(".grid-2")) return;
	// 3 grid view
	event.preventDefault();
	wrapper.classList.add("grid-sm");
	wrapper.classList.remove("list", "spaces-map", "grid-lg");
});			
document.addEventListener("click", function (event) {
	if (!event.target.matches(".map")) return;

	// Map view
	event.preventDefault();
	wrapper.classList.add("spaces-map");
	wrapper.classList.remove("list", "grid-lg", "grid-sm");
});
				});
		</script>
<script charset="utf-8" type="text/javascript" src=" //js.hsforms.net/forms/embed/v2.js "></script>
	<?php
}
add_action( 'wp_head', 'ti_custom_javascript' );
function my_acf_init() {
	acf_update_setting( 'google_api_key', '' );
}
add_action( 'acf/init', 'my_acf_init' );
function bootstrap_enqueue_styles() {
	wp_register_style( 'bootstrap', get_theme_file_uri() . '/bootstrap/css/bootstrap.min.css' );
	$dependencies = array( 'bootstrap' );
	wp_enqueue_style( 'bootstrap-style', get_theme_file_uri() . '/bootstrap/css/bootstrap.min.css' );
}
function bootstrap_enqueue_scripts() {
	$dependencies = array( 'jquery' );
	wp_enqueue_script( 'bootstrap-script', get_theme_file_uri() . '/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_styles', 1 );
add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_scripts', 1 );
add_filter( 'post_gallery', 'my_custom_gallery', 10, 3 );
add_filter( 'baguettebox_enqueue_assets', '__return_true' );
add_filter( 'acf/format_value/name=weekly_price_low', 'fix_number', 20, 3 );
add_filter( 'acf/format_value/name=weekly_price_max', 'fix_number', 20, 3 );
add_filter( 'acf/format_value/name=monthly_price_low', 'fix_number', 20, 3 );
add_filter( 'acf/format_value/name=monthly_price_max', 'fix_number', 20, 3 );
add_filter( 'acf/format_value/name=daily_price_low', 'fix_number', 20, 3 );
add_filter( 'acf/format_value/name=daily_price_max', 'fix_number', 20, 3 );
function fix_number( $value, $post_id, $field ) {
	$value = number_format( $value );
	return $value;
}
add_action( 'do_meta_boxes', 'ast_remove_plugin_metaboxes' );
/**
 * Remove Astra settings meta box for users that are not administrators
 */
function ast_remove_plugin_metaboxes() {
	if ( ! current_user_can( 'administrator' ) ) {
		remove_meta_box( 'astra_settings_meta_box', 'page', 'side' ); // Remove Astra Settings in Pages
		remove_meta_box( 'astra_settings_meta_box', 'post', 'side' ); // Remove Astra Settings in Posts
		remove_meta_box( 'astra_settings_meta_box', 'faq', 'side' ); // Remove Astra Settings in FAQs
		remove_meta_box( 'astra_settings_meta_box', 'service', 'side' ); // Remove Astra Settings in Services
		remove_meta_box( 'astra_settings_meta_box', 'pop-up', 'side' ); // Remove Astra Settings in Pop-ups
		remove_meta_box( 'astra_settings_meta_box', 'space', 'side' ); // Remove Astra Settings in Spaces
		remove_meta_box( 'astra_settings_meta_box', 'testimonials', 'side' ); // Remove Astra Settings in Testimonials
		remove_meta_box( 'tagsdiv-highlight', 'space', 'side' ); // Remove Highlight settings in Spaces
		remove_meta_box( 'tagsdiv-neighborhood', 'space', 'side' ); // Remove neighborhood Settings in Spaces
	}
}
add_action(
	'admin_menu',
	function () {
		remove_meta_box( 'postcustom', 'post', 'normal' );
	}
);
add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to Resources
function cp_change_post_object() {
	$get_post_type                  = get_post_type_object( 'post' );
	$labels                         = $get_post_type->labels;
		$labels->name               = 'Resources';
		$labels->singular_name      = 'Resource';
		$labels->add_new            = 'Add Resource';
		$labels->add_new_item       = 'Add Resource';
		$labels->edit_item          = 'Edit Resource';
		$labels->new_item           = 'Resource';
		$labels->view_item          = 'View Resources';
		$labels->search_items       = 'Search Resources';
		$labels->not_found          = 'No Resources found';
		$labels->not_found_in_trash = 'No Resources found in Trash';
		$labels->all_items          = 'All Resources';
		$labels->menu_name          = 'Resources';
		$labels->name_admin_bar     = 'Resources';
}
// Allow SVG
add_filter(
	'wp_check_filetype_and_ext',
	function ( $data, $file, $filename, $mimes ) {
		global $wp_version;
		if ( $wp_version !== '4.7.1' ) {
			return $data;
		}
		$filetype = wp_check_filetype( $filename, $mimes );
		return array(
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		);
	},
	10,
	4
);
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
function fix_svg() {
	echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );
if ( ! wp_next_scheduled( 'expire_events' ) ) {
	wp_schedule_event( time(), 'daily', 'expire_events' );
}

add_filter( 'wpgmp_infowindow_post_message', 'wpgmp_infowindow_post_message', 1, 2 );
function wpgmp_infowindow_post_message( $message, $map ) {
	global $post;
	// This will apply for map id 1.
	if ( $map->map_id == 3 ) {
	}
	return $message;
}
add_filter( 'wpgmp_render_shortcode', 'wpgmp_render_shortcode', 1, 2 );
function wpgmp_render_shortcode( $bool, $map ) {
	return $bool;
}
add_filter( 'wpgmp_featured_image_size', 'change_post_infowindow_size', 10, 3 );
function change_post_infowindow_size( $size, $post, $map ) {
	$size = ‘medium’;
	return $size;
}
add_action(
	'send_headers',
	function () {
		// X-Frame-Options
		header( 'X-Frame-Options: SAMEORIGIN' );
		// Content Security Policy (CSP)
		header( 'Content-Security-Policy: default-src \'self\' \'unsafe-inline\' \'unsafe-eval\' https: data:' );
		// X-XSS-Protection
		header( 'X-XSS-Protection: 1; mode=block' );
		// Prevent MIME-Type Sniffing
		header( 'X-Content-Type-Options: nosniff' );
		// Referrer-Policy
		header( 'Referrer-Policy: no-referrer-when-downgrade' );
		// HTTP Strict Transport Security (HSTS)
		header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains' );

		// Permissions-Policy
		header( 'Permissions-Policy: microphone=()' );
	},
	1
);

add_action( 'wp_enqueue_scripts', 'mytheme_deregister_scripts' );
function mytheme_deregister_scripts() {
	if ( is_home() || is_front_page() ) :
		wp_deregister_script( 'google-invisible-recaptcha' );
	endif;
}

// Redirect links to future posts to Coming Soon page.
add_action( 'wp', 'redirect_coming_soon_posts', 0 );
function redirect_coming_soon_posts() {
	global $wpdb;
	if ( $wpdb->last_result[0]->post_status == 'private' &&
	$wpdb->last_result[0]->post_date_gmt != '0000-00-00 00:00:00' &&
	! is_admin() ) :
		session_start();

		$_SESSION['next_post_id'] = $wpdb->last_result[0]->ID;
		wp_redirect( '/spaces', 301 );
		exit();
	endif;
}
function sess_start() {
	if ( ! session_id() ) {
		session_start(
			array(
				'read_and_close' => true,
			)
		);
	}
}
add_action( 'init', 'sess_start' );
add_action( 'wp_ajax_yourFunction', 'yourFunction' );
add_action( 'wp_ajax_nopriv_yourFunction', 'yourFunction' );

/**
 * ACF SVG filter to allow raw SVG code.
 */
add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_svg_tag', 10, 2 );



function acf_add_allowed_svg_tag( $tags, $context ) {
	if ( $context === 'acf' ) {
		$tags['svg']  = array(
			'xmlns'               => true,
			'width'               => true,
			'height'              => true,
			'preserveAspectRatio' => true,
			'fill'                => true,
			'viewbox'             => true,
			'role'                => true,
			'aria-hidden'         => true,
			'focusable'           => true,
		);
		$tags['path'] = array(
			'd'    => true,
			'fill' => true,
		);
	}

	return $tags;
}

function enqueue_my_custom_script() {
	// Only enqueue the script on single posts
	if ( is_single() ) {
		wp_enqueue_script(
			'my-custom-js',
			get_template_directory_uri() . '/js/my-custom-script.js',
			array( 'jquery' ),
			null,
			true
		);

		// Pass the post ID to the script
		wp_localize_script(
			'my-custom-js',
			'post_data',
			array(
				'post_id' => get_the_ID(),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_custom_script' );


function load_post_content() {
	$post_id = intval( $_POST['post_id'] );
	$post    = get_post( $post_id );

	if ( $post ) {
		$response = array(
			'title'   => get_the_title( $post ),
			'content' => apply_filters( 'the_content', $post->post_content ),
		);
		wp_send_json( $response );
	} else {
		wp_send_json_error( 'Post not found.' );
	}
}

add_action( 'wp_ajax_load_post_content', 'load_post_content' );
add_action( 'wp_ajax_nopriv_load_post_content', 'load_post_content' );

// /**
//  * Custom REST API Endpoint for Pop-Ups.
//  */

function pop_up_quickview_endpoint( $data ) {
    $post_id = $data['id']; // Get the Post ID from the request
    $post = get_post( $post_id ); // Retrieve the post object

    if ( ! $post || $post->post_type !== 'pop-up' ) {
        return new WP_Error( 'no_post', 'Post not found', array( 'status' => 404 ) );
    }

    // Get ACF fields
    $acf_fields = get_fields( $post_id );

    // Format dates
    $date_format_in = 'Ymd';
    $date_format_out = 'm/d/Y';
    $start_date = isset( $acf_fields['start_date'] ) 
        ? DateTime::createFromFormat( $date_format_in, $acf_fields['start_date'] )->format( $date_format_out ) 
        : 'Start date not available';
    $end_date = isset( $acf_fields['end_date'] ) 
        ? DateTime::createFromFormat( $date_format_in, $acf_fields['end_date'] )->format( $date_format_out ) 
        : 'End date not available';

    // Extract location post titles
    $location_ids = isset( $acf_fields['location'] ) ? $acf_fields['location'] : array();
    $location_titles = [];

    if ( is_array( $location_ids ) ) {
        foreach ( $location_ids as $location_id ) {
            $location_titles[] = get_the_title( $location_id );
        }
    } elseif ( is_numeric( $location_ids ) ) {
        $location_titles[] = get_the_title( $location_ids );
    }

    // Prepare gallery data
    $gallery = [];
    if ( isset( $acf_fields['gallery'] ) && is_array( $acf_fields['gallery'] ) ) {
        foreach ( $acf_fields['gallery'] as $image ) {
            $gallery[] = [
                'url' => $image['sizes']['medium_large'] ?? $image['url'],
                'alt' => $image['alt'] ?? '',
            ];
        }
    }

    // Ensure type_of_event is an array
    $type_of_event = [];
    if ( isset( $acf_fields['type_of_event'] ) ) {
        $type_of_event = is_array( $acf_fields['type_of_event'] ) 
            ? $acf_fields['type_of_event'] 
            : explode( ',', $acf_fields['type_of_event'] ); // Split string into array
    }

    // Response data
    $response = array(
        'id'              => $post_id,
        'title'           => get_the_title( $post ),
        'start_date'      => $start_date,
        'end_date'        => $end_date,
        'status'          => $acf_fields['status'] ?? 'No status available',
        'type_of_event'   => array_map( 'trim', $type_of_event ), // Ensure clean array
        'excerpt'         => wp_trim_words( get_the_excerpt( $post_id ), 25, '...' ),
        'location_titles' => ! empty( $location_titles ) ? implode( ', ', $location_titles ) : 'No location available',
        'gallery'         => $gallery,
    );

    return $response;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', '/pop-up/(?P<id>\\d+)', array(
        'methods'  => 'GET',
        'callback' => 'pop_up_quickview_endpoint',
        'args'     => array(
            'id' => array(
                'required'          => true,
                'validate_callback' => function ( $param ) {
                    return is_numeric( $param );
                },
            ),
        ),
    ) );
} );


function enqueue_child_quickview_scripts() {
    // Enqueue the quickview JavaScript file
    wp_enqueue_script(
        'quickview-scripts', // Handle
        get_stylesheet_directory_uri() . '/build/quickview.js', // Path to the JS file in the child theme
        array('jquery'), // Dependencies
        '1.0.0', // Version
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_child_quickview_scripts');
