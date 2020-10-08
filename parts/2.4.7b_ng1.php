<?php /* リンクフォーカス時ブラー */ ?>
<script type="text/javascript">
jQuery (function($){
  $('a').on('focus',function(){
    this.blur();
  });
});
</script>
