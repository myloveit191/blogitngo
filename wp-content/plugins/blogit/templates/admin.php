<div class="wrap">
    <h1>BlogIt Plugin</h1>
    <?php 
    // include_once( dirname(__FILE__,5) . '/wp-admin/options.php' );
    settings_errors();?>
    <form action="options.php" method="post">
        <table class="form-table">
        <?php 
            settings_fields("blogit_options_group");
            do_settings_sections('blogit-plugin');
           
        ?>
        </table>
        <?php  submit_button(); ?>
    </form>
</div>