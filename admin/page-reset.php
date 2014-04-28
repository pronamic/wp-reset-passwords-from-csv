<div class="wrap">
	<h2><?php echo get_admin_page_title(); ?></h2>

	<form enctype="multipart/form-data" action="" method="POST">
		<table class="form-table">
			<tr>
				<th>
					<label for="file-input"><?php _e( 'File', 'reset_password_from_csv' ); ?></label>
				</th>
				<td>
					<input id="file-input" type="file" name="file" />
				</td>
			</tr>
		</table>

		<?php submit_button( __( 'Reset', 'reset_password_from_csv' ) ); ?>
	</form>

	<?php

	$handle = false;

	if ( isset( $_FILES['file'] ) ) {
		$error = $_FILES['file']['error'];

		if ( UPLOAD_ERR_OK == $error ) {
			$filename = $_FILES['file']['tmp_name'];

			$handle = fopen( $filename, 'r' );
		}
	}

	if ( false !== $handle ) : ?>

		<table class="widefat">
			<thead>
				<tr>
					<th scope="col"><?php _e( 'Username', 'reset_password_from_csv' ); ?></th>
					<th scope="col"><?php _e( 'Password', 'reset_password_from_csv' ); ?></th>
					<th scope="col"><?php _e( 'User ID', 'reset_password_from_csv' ); ?></th>
				</tr>
			</thead>

			<tbody>

				<?php while ( false !== ( $data = fgetcsv( $handle, null, ',' ) ) ) : ?>

					<tr>
						<?php

						$username = $data[0];
						$password = $data[1];

						?>
						<td>
							<?php echo $username; ?>
						</td>
						<td>
							<?php echo $password; ?>
						</td>
						<td>
							<?php

							$user = get_user_by( 'login', $username );

							if ( false !== $user ) {
								echo $user->ID;

								wp_set_password( $password, $user->ID );
							}

							?>
						</td>
					</tr>

				<?php endwhile; ?>

			</tbody>
		</table>

	<?php endif; ?>
</div>