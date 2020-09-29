<script>
jQuery (function($){
	const wrapper = $('#wrapper-menu'),
				bttn = $('#bttn-nav'),
				menu = $('#main-menu');
	if(! wrapper[0] || ! bttn[0] || ! menu[0] ) return;
	menu.appendTo($('body'));
	setMenuPosition();
	// キーボード操作・hover両方対応できるようにする
	bttn.on('keydown mouseenter', setMenuPosition)

	function setMenuPosition(){
		let p_wrapper = wrapper.offset(),
				w_wrapper = wrapper.outerWidth(),
				w_body    = $('body').innerWidth();
		menu.css({
			'position' : 'absolute',
			'top' : p_wrapper.top,
			'right' : w_body - p_wrapper.left - w_wrapper,
		});
	}
});
</script>
