<?php /* リンクフォーカス時ブラー */ ?>
<script type="text/javascript">
jQuery (function($){
  $('a, button, [type=submit], [type=button]').on('focus',function(){
    this.blur();
  });
});
</script>
