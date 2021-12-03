jQuery(function($) {
/*
 * バリアを個別に指定する、を選択時、ディスクロージャオープン。
 * 問題を含んだ〜を選択時には、ディスクロージャクローズ。
 * もともとのディスクロージャの機能は殺す。
 */
	const radioButton = $('input[name="code_type"]')
				detailsArea = $('#individual_set'),
				detailsSummary = $('#individual_set summary');
	radioButton.on({
		'change' : toggleIndividualSet,
		'click'  : function(){event.stopPropagation()}
	});
	detailsSummary.on('click', function(){
		radioButton.eq(1).prop('checked', true).trigger('change');
		return false;
	});
	function toggleIndividualSet(event){
		target = !event ? radioButton.eq(1): $(event.target);
		if(target.val() == 'individual'){
			detailsArea.attr('open', '');
		}else{
			detailsArea.removeAttr('open');
		}
	}
});

jQuery(function($) {
 // 障壁パターンコード
	if(! location.search || location.search.substring(1) != 'test') return;

});
