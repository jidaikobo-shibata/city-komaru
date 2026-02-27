<?php /* トップページ以外でhを打鍵するとトップページに移動する */

if (\Komarushi\Main::whoAmI() != 'index') :
    ?>
<script>
document.addEventListener('keydown', function(event) {
  if (event.key === 'h') {
    window.location.href = './<?php echo \Komarushi\Main::modeString(false) ?>';
  }
});
</script>
    <?php
endif;
