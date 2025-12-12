<?php
/**
 * Demo Import System
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add demo import menu page
 */
function ascend_demo_import_menu() {
	add_theme_page(
		__( 'Demo Import', 'ascend' ),
		__( 'Demo Import', 'ascend' ),
		'manage_options',
		'ascend-demo-import',
		'ascend_demo_import_page'
	);
}

add_action( 'admin_menu', 'ascend_demo_import_menu' );

/**
 * Demo import page content
 */
function ascend_demo_import_page() {
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		
		<div class="ascend-demo-import">
			<h2><?php esc_html_e( 'Import Demo Content', 'ascend' ); ?></h2>
			<p><?php esc_html_e( 'Click the button below to import demo content, widgets, and settings.', 'ascend' ); ?></p>
			
			<div class="demo-import-options">
				<div class="demo-option">
					<h3><?php esc_html_e( 'Demo 1 - Corporate', 'ascend' ); ?></h3>
					<img src="<?php echo esc_url( ASCEND_URI . 'assets/images/demo-1.png' ); ?>" alt="Demo 1">
					<button class="button button-primary ascend-import-demo" data-demo="demo-1">
						<?php esc_html_e( 'Import Demo 1', 'ascend' ); ?>
					</button>
				</div>
				
				<div class="demo-option">
					<h3><?php esc_html_e( 'Demo 2 - Creative', 'ascend' ); ?></h3>
					<img src="<?php echo esc_url( ASCEND_URI . 'assets/images/demo-2.png' ); ?>" alt="Demo 2">
					<button class="button button-primary ascend-import-demo" data-demo="demo-2">
						<?php esc_html_e( 'Import Demo 2', 'ascend' ); ?>
					</button>
				</div>
				
				<div class="demo-option">
					<h3><?php esc_html_e( 'Demo 3 - E-commerce', 'ascend' ); ?></h3>
					<img src="<?php echo esc_url( ASCEND_URI . 'assets/images/demo-3.png' ); ?>" alt="Demo 3">
					<button class="button button-primary ascend-import-demo" data-demo="demo-3">
						<?php esc_html_e( 'Import Demo 3', 'ascend' ); ?>
					</button>
				</div>
			</div>
			
			<div id="import-progress" style="display:none;">
				<h3><?php esc_html_e( 'Importing...', 'ascend' ); ?></h3>
				<div class="progress-bar">
					<div class="progress-fill"></div>
				</div>
				<p class="progress-status"></p>
			</div>
		</div>
	</div>
	
	<style>
		.ascend-demo-import {
			max-width: 1200px;
		}
		.demo-import-options {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
			gap: 2rem;
			margin-top: 2rem;
		}
		.demo-option {
			border: 1px solid #ddd;
			padding: 1.5rem;
			border-radius: 8px;
			text-align: center;
		}
		.demo-option img {
			max-width: 100%;
			height: auto;
			border-radius: 4px;
			margin: 1rem 0;
		}
		.progress-bar {
			width: 100%;
			height: 30px;
			background: #f0f0f0;
			border-radius: 4px;
			overflow: hidden;
			margin: 1rem 0;
		}
		.progress-fill {
			height: 100%;
			background: #0066cc;
			width: 0;
			transition: width 0.3s ease;
		}
	</style>
	
	<script>
		jQuery(document).ready(function($) {
			$('.ascend-import-demo').on('click', function(e) {
				e.preventDefault();
				
				var demo = $(this).data('demo');
				var $progress = $('#import-progress');
				var $progressFill = $('.progress-fill');
				var $progressStatus = $('.progress-status');
				
				if (!confirm('<?php esc_html_e( 'This will import demo content. Continue?', 'ascend' ); ?>')) {
					return;
				}
				
				$progress.show();
				$progressStatus.text('<?php esc_html_e( 'Starting import...', 'ascend' ); ?>');
				
				// Simulate import progress (replace with actual AJAX calls)
				var progress = 0;
				var interval = setInterval(function() {
					progress += 10;
					$progressFill.css('width', progress + '%');
					
					if (progress >= 30 && progress < 60) {
						$progressStatus.text('<?php esc_html_e( 'Importing content...', 'ascend' ); ?>');
					} else if (progress >= 60 && progress < 90) {
						$progressStatus.text('<?php esc_html_e( 'Importing widgets...', 'ascend' ); ?>');
					} else if (progress >= 90 && progress < 100) {
						$progressStatus.text('<?php esc_html_e( 'Finalizing...', 'ascend' ); ?>');
					}
					
					if (progress >= 100) {
						clearInterval(interval);
						$progressStatus.text('<?php esc_html_e( 'Import completed!', 'ascend' ); ?>');
						alert('<?php esc_html_e( 'Demo content imported successfully!', 'ascend' ); ?>');
					}
				}, 500);
			});
		});
	</script>
	<?php
}

/**
 * AJAX handler for demo import
 */
function ascend_ajax_import_demo() {
	check_ajax_referer( 'ascend-demo-import', 'nonce' );
	
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( __( 'Permission denied', 'ascend' ) );
	}
	
	$demo = sanitize_text_field( $_POST['demo'] ?? '' );
	
	// Import logic would go here
	// This is a placeholder for the actual import functionality
	
	wp_send_json_success( __( 'Demo imported successfully', 'ascend' ) );
}

add_action( 'wp_ajax_ascend_import_demo', 'ascend_ajax_import_demo' );
