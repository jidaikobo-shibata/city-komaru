<?php

/* トップページの「あなたにもできる取り組み」（ホバーコンテンツは非表示にする手段がなく、かつ画面内の意味のある要素を覆っている） */ ?>

    <style>
.tooltip {
    display: none;
    position: fixed; /* 固定表示 */
    top: 50%; /* 画面の縦中央 */
    left: 50%; /* 画面の横中央 */
    transform: translate(-50%, -50%); /* 中央揃え */
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.9);
    color: #fff;
    border-radius: 10px;
    font-size: 1.6em;
    z-index: 1000;
    width: 50vw; /* 横幅を調整 */
    height: 30vh; /* 高さを調整 */
    overflow: hidden; /* 内容が見え切らない場合でも隠す */
    text-align: center; /* テキストを中央揃え */
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

    // 現在表示されているツールチップを記録
    let activeTooltip = null;

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

        document.body.appendChild(tooltip); // ツールチップをbodyに追加

        // マウスオーバー時
        item.addEventListener("mouseenter", () => {
            showTooltip(item, tooltip);
        });

        // キーボードフォーカス時
        item.addEventListener("focus", () => {
            showTooltip(item, tooltip);
        });
    });

    function showTooltip(item, tooltip) {
        // 既に他のツールチップが表示されている場合、それを非表示にする
        if (activeTooltip && activeTooltip !== tooltip) {
            activeTooltip.classList.remove("visible");
            activeTooltip.style.display = "none";
        }

        // 新しいツールチップを表示
        tooltip.style.display = "block";
        tooltip.style.position = "fixed";
        tooltip.style.top = "20%";
        tooltip.style.left = "50%";
        tooltip.style.transform = "translate(-50%, -50%)";
        tooltip.classList.add("visible");

        // 現在表示中のツールチップを更新
        activeTooltip = tooltip;
    }
});
</script>
