<?php

// Exit on direct access
if (!defined('ABSPATH')) exit;

$tifm_disabled = 'false';
if (get_option('_tifm_feature_enabled') === 'disabled') {
  $tifm_disabled = 'true';
}

$tifm_scrollTo = false;
if (isset($_GET['scrollToSection']) && $_GET['scrollToSection'] === 'testPlugins') {
  $tifm_scrollTo = true;
}

?>
<div class="sfsi_tifm_tab_module_block">
  <?php if ($tifm_scrollTo) { ?>
  <input style="display: none;" hidden value="sfsi_tifm_module_scroll" id="sfsi_tifm_scroll_value" />
  <?php } ?>

  <h4>
    <?php _e('Test new plugins before installing:', 'ultimate-social-media-icons'); ?>
  </h4>

  <div class="row_onl">
    <p>
      <?php
        $tifm_translation1 = __('If this feature is activated, you’ll see “Try it out”-buttons on the screen where you can %s1%add new plugins%s2%.', 'ultimate-social-media-icons');
        $tifm_translation2 = __('Clicking on it will spin up a new WordPress instance with the respective plugin installed. Powered by %s1%.', 'ultimate-social-media-icons');

        $tifm_translation1 = str_replace('%s1%', '<a href="' . admin_url('plugin-install.php') . '">', $tifm_translation1);
        $tifm_translation1 = str_replace('%s2%', '</a>', $tifm_translation1) . '<br />';
        $tifm_translation2 = str_replace('%s1%', '<a href="https://tastewp.com" target="_blank">TasteWP</a>', $tifm_translation2);

        echo $tifm_translation1;
        echo $tifm_translation2;
      ?>
    </p>

    <div class="sfsi_tifm_radio_block text_options layout">
      <div class="row_tab">
        <ul class="enough_waffling">
          <li>
            <input type="radio" class="styled" value="true" name="sfsi_tifm_module"<?php echo ($tifm_disabled === 'false') ? ' checked' : '' ?>>
            <label><?php _e('Enable', 'ultimate-social-media-icons') ?></label>
          </li>
          <li>
            <input type="radio" class="styled" value="false" name="sfsi_tifm_module"<?php echo ($tifm_disabled === 'true') ? ' checked' : '' ?>>
            <label><?php _e('Disable', 'ultimate-social-media-icons') ?></label>
          </li>
        </ul>
      </div>
    </div>

    <div id="sfsi_tifm_success_save" style="display: none;color: green;">
      <?php _e('Settings saved.', 'ultimate-social-media-icons'); ?>
    </div>
    <div id="sfsi_tifm_error_save" style="display: none;color: red;">
      <?php _e('Error during settings save.', 'ultimate-social-media-icons'); ?>
    </div>
  </div>

</div>
