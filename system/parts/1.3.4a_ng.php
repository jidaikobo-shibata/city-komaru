<?php /* デバイスの向きを横向きでのみ表示されるようにする */ ?>
    <style>
        .portrait-warning {
          display: none;
          position: fixed;
          left: 0;
          top: 0;
          right: 0;
          bottom: 0;
          width: 100vw;
          height: 100vh;
          background-color: white;
          color: black;
          justify-content: center;
          align-items: center;
          font-size: 6rem;
          text-align: center;
          z-index: 1000;
        }
    </style>

    <script>
      function checkOrientation() {
        const body = document.body;
        const wrapper =  document.querySelector('#wrapper');
        const warning = document.querySelector('.portrait-warning');

        if (window.matchMedia("(orientation: portrait)").matches) {
          // 縦向きの場合
          warning.style.display = 'flex'; // 警告メッセージを表示
          wrapper.style.display = 'none';
//          body.style.overflow = 'hidden';
        } else {
          // 横向きの場合
          warning.style.display = 'none'; // 警告メッセージを非表示
          wrapper.style.display = '';
//          body.style.overflow = '';
        }
      }

      // ページロード時と画面回転時にチェック
      window.addEventListener('load', checkOrientation);
      window.addEventListener('resize', checkOrientation);

			// 警告のレイヤでイベント伝播抑止
      warning.addEventListener('click', function(event) {
        event.stopPropagation();
      });
    </script>
