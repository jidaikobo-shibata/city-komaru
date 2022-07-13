jQuery(function($) {
	console.log($('[name=agree_privacypolicy]'));
	// 個人情報保護方針への同意と送信ボタン
	$('[name=agree_privacypolicy]').each(function(){
		$(this).closest('form').find(':submit').prop('disabled', true);
	}).on('change', function(e){
		$(this).closest('form').find(':submit').prop('disabled', ! $(this).is(':checked'));
	});
});
