<div class="wrap">
    <h1>BlogIt Plugin</h1>
    <?php settings_errors();?>
    <form action="options.php" method="post">
        <?php 
            settings_fields("blogit_options_group");
            do_settings_sections('blogit-plugin');
            submit_button();
        ?>
    </form>
</div>