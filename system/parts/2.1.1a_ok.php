<?php /* キーボードのフォーカス順序が妥当なドロップダウン */ ?>
<script>
	 jQuery (function($){
		 const bttn = $('.bttn-menu');
		 if(! bttn[0] ) return;

		 bttn.attr({
		 	"aria-expanded" : false,
		});
		 bttn.on('click', function(){
			 let $current_bttn = $(this);
			 bttn.not($current_bttn).attr('aria-expanded', false);
			 $('#'+bttn.not($current_bttn).attr('aria-controls')).hide();
			 $('#'+$current_bttn.attr('aria-controls')).slideToggle(function(){
				 $current_bttn.attr('aria-expanded', $(this).is(':visible') );
			 });
		 });
	 });
</script>
