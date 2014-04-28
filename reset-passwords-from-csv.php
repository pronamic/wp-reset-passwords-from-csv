<?php
/*
Plugin Name: Reset passwords from CSV
Plugin URI: http://www.happywp.com/plugins/reset-passwords-from-csv/
Description: Rset user passwords from a CSV file into WordPress.

Author: Pronamic
Author URI: http://www.pronamic.eu/

Version: 1.0.0
Requires at least: 3.0

Text Domain: reset_password_from_csv
Domain Path: /languages/

License: GPL

GitHub URI: https://github.com/pronamic/wp-reset-passwords-from-csv
*/

/**
 * Admin menu
 */
function reset_password_from_csv_admin_menu(){
	add_management_page(
		__( 'Reset passwords from CSV', 'reset_password_from_csv' ),
		__( 'Reset passwords from CSV', 'reset_password_from_csv' ),
		'manage_options',
		'reset_password_from_csv',
		'admin_page_reset_password_from_csv'
	);
}

add_action( 'admin_menu', 'reset_password_from_csv_admin_menu' );

/**
 * Page function
 */
function admin_page_reset_password_from_csv(){
	include 'admin/page-reset.php';
}
