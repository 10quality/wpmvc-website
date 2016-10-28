<?php if ( current_user_can( 'manage_options' ) ) : ?>
    <p>This sidebar section does not contain any widget yet.</p>
    <p>Please go to the <a href="<?= admin_url( '/widgets.php' ) ?>">widgets section</a> at the admin dashboard and add some.</p>
<?php endif ?>