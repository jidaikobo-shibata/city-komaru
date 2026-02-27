<?php

/* 簡単な方法で制限時間を延長できるフォーム */ ?>
<script>
const timeout_val = 2 * 60 * 1000,
            new_area = $('#new-area'),
            renew_area = $('#renew-area');
var timeout = function() {
                var response = window.confirm('入力時間が切れました。制限時間を延長しますか？');
                if( ! response ){
//                  document.registration.reset();
                    $(document.registration).find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);

                        $('#registration-new').prop("checked", true);
                        renew_area.hide().find(':input').attr('disabled', true);
                        new_area.show().find(':input').removeAttr('disabled');
                }
                setTimeout(timeout, timeout_val);
}
setTimeout(timeout, timeout_val);
</script>
