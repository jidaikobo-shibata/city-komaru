<?php

/* トップページの「あなたにもできる取り組み」（ホバーコンテンツは1.5秒で消えてしまう） */ ?>

    <style>
.tooltip {
    display: none;
    position: absolute;
    bottom: -50px; /* 初期位置 */
    left: 50%;
    transform: translateX(-50%);
    padding: 10px;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    white-space: normal; /* 自動改行を許可 */
    width: 500px; /* ツールチップの最大幅を倍に設定 */
    word-wrap: break-word; /* 長い単語で折り返しを許可 */
    word-break: break-word; /* 単語を途中で改行可能にする */
    z-index: 10;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    font-size: 0.9em;
    box-sizing: border-box;
}

.tooltip.visible {
    display: block;
}
    </style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // メッセージをJavaScript側で保持
    const messages = {
        effor1: "省エネは、エネルギーの無駄遣いを減らし、効率的に活用する取り組みです。具体的には、家電製品の省エネルギーモードの活用、LED照明の使用、断熱材を利用した冷暖房の効率化などがあります。これにより、電力消費を削減し、地球温暖化を防ぐ効果が期待できます。",
        effor2: "ごみ減は、廃棄物の発生を抑え、環境負荷を軽減する取り組みです。不要なプラスチック包装の削減やリサイクル可能な素材の利用、生ごみのコンポスト化などを推進します。これにより、廃棄物処理の負担を軽減し、資源を有効活用することが可能になります。",
        effor3: "地産地消は、地域で生産された農産物や商品を地元で消費する取り組みです。これにより、輸送にかかるエネルギーを削減できるだけでなく、地域経済の活性化や新鮮な食材の供給が実現します。地元の生産者を支援する効果も期待されます。",
        effor4: "エコバッグは、使い捨てのビニール袋の代わりに再利用可能なバッグを利用する取り組みです。これにより、プラスチックごみの削減が進み、海洋汚染や資源浪費の抑制につながります。日常の買い物に取り入れるだけで、環境保護に貢献することができます。"
    };

    // section#your-effort内の画像を取得

    // section#your-effort内の画像を取得
    const section = document.querySelector("#your-effort");
    const items = section.querySelectorAll("img");

    items.forEach(item => {
        // 吹き出しを動的に生成
        const tooltip = document.createElement("div");
        tooltip.className = "tooltip";

        // IDをキーにしてメッセージを取得
        const message = messages[item.id];
        tooltip.textContent = message || "メッセージが見つかりません。";

        // aria-describedbyの対象となるIDを設定
        const tooltipId = `tooltip-${item.id}`;
        tooltip.id = tooltipId;

        item.parentElement.appendChild(tooltip);

        // マウスオーバー時
        item.addEventListener("mouseenter", () => {
            showTooltip(item, tooltip);
        });

        // キーボードフォーカス時
        item.addEventListener("focus", () => {
            showTooltip(item, tooltip);
        });

        // マウスアウト時
        item.addEventListener("mouseleave", () => {
            hideTooltip(tooltip);
        });

        // キーボードフォーカスアウト時
        item.addEventListener("blur", () => {
            hideTooltip(tooltip);
        });
    });

    function showTooltip(item, tooltip) {
        const rect = item.getBoundingClientRect();
        tooltip.style.bottom = `${rect.height + 10}px`; // 画像の下に配置
        tooltip.style.left = "50%";
        tooltip.classList.add("visible");

        // 1.5秒後にツールチップを消す
        setTimeout(() => {
            tooltip.classList.remove("visible");
        }, 1500);
    }

    function hideTooltip(tooltip) {
        tooltip.classList.remove("visible");
    }
});
</script>
