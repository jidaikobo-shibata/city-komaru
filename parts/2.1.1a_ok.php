<script>
	 jQuery (function($){
		 const bttn = $('#bttn-nav'),
					 menu = $('#main-menu');
		 if(! bttn[0] || ! menu[0] ) return;

		 bttn.attr({
		 	"aria-expanded" : false,
				"aria-controls" : "main-menu"
		});
		 bttn.on('click', function(){
			 menu.slideToggle(function(){
				 bttn.attr('aria-expanded', $(this).is(':visible') );
			 });
		 });
	 });
</script>
