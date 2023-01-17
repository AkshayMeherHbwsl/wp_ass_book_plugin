<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://example.com
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 * @author     Akshay Meher <abc@gmail.com>
 */
class Wp_Book_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-book-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-book-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register custom post type "book"
	 */
	public function wp_book_custom_post_type_book() {

		$labels = array(
			'name'               => __( 'Books', 'wp-book' ),
			'singular_name'      => __( 'Book', 'wp-book' ),
			'menu_name'          => __( 'Books', 'wp-book' ),
			'name_admin_bar'     => __( 'Book', 'wp-book' ),
			'add_new'            => __( 'Add New', 'wp-book' ),
			'add_new_item'       => __( 'Add New Book', 'wp-book' ),
			'new_item'           => __( 'New Book', 'wp-book' ),
			'edit_item'          => __( 'Edit Book', 'wp-book' ),
			'view_item'          => __( 'View Book', 'wp-book' ),
			'all_items'          => __( 'All Books', 'wp-book' ),
			'search_items'       => __( 'Search Books', 'wp-book' ),
			'parent_item_colon'  => __( 'Parent Books:', 'wp-book' ),
			'not_found'          => __( 'No books found.', 'wp-book' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'wp-book' ),
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'wp-book' ),
			'public'             => true,
			'menu_icon'          => 'dashicons-book',
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'book' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'comments',
			),
		);

		register_post_type( 'book', $args );
	}

	/**
	 * Register custom hierarchical taxonomy 'Book Category'
	 */
	public function wp_book_custom_category() {

		$labels = array(
			'name'                       => _x( 'Book Categories', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Book Category', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Book Category', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'Add Book Category', 'text_domain' ),
			'add_new_item'               => __( 'Add New Book Category', 'text_domain' ),
			'edit_item'                  => __( 'Edit Book Category', 'text_domain' ),
			'update_item'                => __( 'Update Book Category', 'text_domain' ),
			'view_item'                  => __( 'View Book Category', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'Book Category', array( 'book' ), $args );
	}

	/**
	 * Register custom non-hierarchical taxonomy 'Book Tag'
	 */
	public function wp_book_custom_tag() {

		$labels = array(
			'name'                       => _x( 'Book Tags', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Book Tag', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Book Tag', 'text_domain' ),
			'all_items'                  => __( 'All Book Tags', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'Add Book Tag', 'text_domain' ),
			'add_new_item'               => __( 'Add New Book Tag', 'text_domain' ),
			'edit_item'                  => __( 'Edit Book Tag', 'text_domain' ),
			'update_item'                => __( 'Update Book Tag', 'text_domain' ),
			'view_item'                  => __( 'View Book Tag', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Book Tag', 'text_domain' ),
			'not_found'                  => __( 'Not Book Tag Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);

		register_taxonomy( 'Book Tag', array( 'book' ), $args );
	}

	/**
	 * Registers the custom table named bookmeta
	 */
	public function pw_register_bookmeta_table() {
		global $wpdb;
		$wpdb->bookmeta = $wpdb->prefix . 'bookmeta';
	}

	/**
	 * Creates custom meta box
	 */
	public function custom_metabox_books() {
		add_meta_box( 'custom-books-info', 'Books Info', array( $this, 'custom_books_info_function' ), array( 'book' ) );
	}

	/**
	 * Shows custom metabox books and get values for wp_booksmeta (if any).
	 *
	 * @since    1.0.0
	 * @param    object $post       Contains all information about post.
	 */
	public function custom_books_info_function( $post ) {
		$get_book_metadata = get_metadata( 'book', $post->ID );
		if ( count( $get_book_metadata ) > 0 ) {
			$author    = $get_book_metadata['author_name'][0];
			$price     = $get_book_metadata['price'][0];
			$publisher = $get_book_metadata['publisher'][0];
			$year      = $get_book_metadata['year'][0];
			$edition   = $get_book_metadata['edition'][0];
			$url       = $get_book_metadata['url'][0];
		} else {
			$author    = '';
			$price     = '';
			$publisher = '';
			$year      = '';
			$edition   = '';
			$url       = '';
		}
		wp_nonce_field( basename( __FILE__ ), 'custom_books_info_nonce' );
		?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="wpb-custom-author-name">Author Name</label></th>
					<td><input name="wpb-custom-author-name" type="text" id="wpb-custom-author-name" value="<?php echo $author; ?>" placeholder="Author Name" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-price">Book Price</label></th>
					<td><input name="wpb-custom-price" type="text" id="wpb-custom-price" value="<?php echo $price; ?>" placeholder="Book Price" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-publisher">Publisher</label></th>
					<td><input name="wpb-custom-publisher" type="text" id="wpb-custom-publisher" value="<?php echo $publisher; ?>" placeholder="Publisher" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-year">Year</label></th>
					<td><input name="wpb-custom-year" type="number" id="wpb-custom-year" value="<?php echo $year; ?>" placeholder="Year" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-edition">Edition</label></th>
					<td><input name="wpb-custom-edition" type="text" id="wpb-custom-edition" value="<?php echo $edition; ?>" placeholder="Edition" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-url">URL</label></th>
					<td><input name="wpb-custom-url" type="url" id="wpb-custom-url" value="<?php echo $url; ?>" placeholder="URL eg. https://example.com" class="regular-text" autocomplete="off"></td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Stores all metadata of custom post type 'Books' to custom table
	 *
	 * @since    1.0.0
	 * @param    integer $post_id       Contains Post ID.
	 * @param    object  $post          Contains all information about post.
	 */
	public function save_custom_metabox_data( $post_id, $post ) {

		if ( ! isset( $_POST['custom_books_info_nonce'] ) || ! wp_verify_nonce( $_POST['custom_books_info_nonce'], basename( __FILE__ ) ) ) {
			return $post_id;
		}

		$post_slug = 'book';

		if ( $post_slug != $post->post_type ) {
			return;
		}

		$author = '';
		if ( isset( $_POST['wpb-custom-author-name'] ) ) {
			$author = sanitize_text_field( $_POST['wpb-custom-author-name'] );
		} else {
			$author = '';
		}

		$price = '';
		if ( isset( $_POST['wpb-custom-price'] ) ) {
			$price = sanitize_text_field( $_POST['wpb-custom-price'] );
		} else {
			$price = '';
		}

		$publisher = '';
		if ( isset( $_POST['wpb-custom-publisher'] ) ) {
			$publisher = sanitize_text_field( $_POST['wpb-custom-publisher'] );
		} else {
			$publisher = '';
		}

		$year = '';
		if ( isset( $_POST['wpb-custom-year'] ) ) {
			$year = sanitize_text_field( $_POST['wpb-custom-year'] );
		} else {
			$year = '';
		}

		$edition = '';
		if ( isset( $_POST['wpb-custom-edition'] ) ) {
			$edition = sanitize_text_field( $_POST['wpb-custom-edition'] );
		} else {
			$edition = '';
		}

		$url = '';
		if ( isset( $_POST['wpb-custom-url'] ) ) {
			$url = sanitize_text_field( $_POST['wpb-custom-url'] );
		} else {
			$url = '';
		}

		update_metadata( 'book', $post_id, 'author_name', $author );
		update_metadata( 'book', $post_id, 'price', $price );
		update_metadata( 'book', $post_id, 'publisher', $publisher );
		update_metadata( 'book', $post_id, 'year', $year );
		update_metadata( 'book', $post_id, 'edition', $edition );
		update_metadata( 'book', $post_id, 'url', $url );

		update_metadata( 'post', $post_id, 'author_name', $author );
		update_metadata( 'post', $post_id, 'price', $price );
		update_metadata( 'post', $post_id, 'publisher', $publisher );
		update_metadata( 'post', $post_id, 'year', $year );
		update_metadata( 'post', $post_id, 'edition', $edition );
		update_metadata( 'post', $post_id, 'url', $url );

	}
}
