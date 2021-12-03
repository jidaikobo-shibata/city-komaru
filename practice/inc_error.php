<?php
if (\Komarushi\Main::$is_test_pattern_code_failed):
  echo '<div style="width: 70%;border: 1px #333 solid; padding: 15px; margin: 20px auto;">障壁パターンコードの解析に失敗しました。障壁設定のない表示になります。障壁の再設定は<a href="../index.php#config">障壁（バリア）の設定</a>で行ってください。</div>';
endif;
