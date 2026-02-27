<?php /* キーボードトラップ（サイト内検索） */ ?>
<?php
$label_search  = '<label for="search-text" class="visually-hidden">サイト内検索</label>';
if (\Komarushi\Main::getBarrierStatus('1.3.1g') == 'ng') :
    $label_search  = '<span class="visually-hidden">サイト内検索</span>';
endif;
?>
<form action="./do-not-test.php" method="GET">
<?php echo $label_search; ?><input type="text" name="s" id="search-text" size="20" value="">
<input type="submit" id="search" value="検索">
</form>
<script>
jQuery(function($){
  const input = $('#search-text'),
        bttn = $('#search'),
        search_obj = input.add(bttn);
  let flg = false;
  search_obj.on('blur', function(){
    if(flg){
      flg = false;
    }else{
      search_obj.not(this).focus();
    }
  });
  $('*').on('mousedown',function(e){
    if($(this).is(search_obj)){
      e.stopPropagation();
      return;
    }
    flg = true;
  });
});
</script>
