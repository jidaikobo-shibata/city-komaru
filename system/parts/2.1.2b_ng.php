<?php /* タブキーで抜けられないキーボードトラップ（ページ末尾のテキストエリア） */ ?>
<script>
jQuery (function($){
  $('#feedback-text').on('keydown', function(e){
    if (e.code === "Tab") {
      e.preventDefault();
      const el = e.target,
      val = el.value,
      pos = el.selectionStart;
      el.value = val.substr(0, pos) + '\t' + val.substr(pos, val.length);
      el.setSelectionRange(pos + 1, pos + 1);
    }
  });
});
</script>
