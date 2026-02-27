<?php

/* 雰囲気の違うボタンにしたかったのでdivをボタンにしている */ ?>
<div id="feedback-button">送信</div>
<script>
jQuery (function($){
  $('#feedback-button').on('click',function(){
    $(this).parent('form').submit();
  })
});
</script>
