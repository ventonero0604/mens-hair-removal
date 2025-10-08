<?php include './function/getProduct.php'; ?>

<?php include './components/head.php'; ?>

<body>
  <section class="ColumnLeft">
    <div class="ColumnLeft_header">
      <a href="/" class="logo">
        <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
      </a>
    </div>

    <?php include './components/search.php'; ?>
  </section>
  <header class="Header">
    <a href="/" class="logo">
      <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
    </a>
  </header>
  <main class="Privacy">

    <section class="privacy">
      <h3 class="title">調査概要</h3>
      <ul class="list">
        <li>
          <p class="text">
            当サイトに掲載されているコンテンツは、以下の概要に基づき制作を行なっております。
          </p>
        </li>
        <li>
          <p class="lead">
            評価について
          </p>
          <p class="text">
            当サイトのランキングは以下の数式で算出される総合評価に基づいています。<br>
            <br>
            <b>総合評価：以下3項目の平均</b><br>
            └アンケート投票数スコア<br>
            └アンケートクチコミスコア<br>
            └アクセス数スコア
          </p>
        </li>
        <li>
          <p class="lead">
            アンケート投票数スコア/クチコミスコアについて
          </p>
          <p class="text">
            <u><b>調査実施者</b></u><br>
            MYメンズ脱毛ガイド.com<br>
            <br>
            <u><b>調査目的</b></u><br>
            アンケートの回答結果により男性脱毛経験者に選ばれている脱毛クリニックを紹介するため。<br>
            <br>
            <u><b>調査対象</b></u><br>
            日本国内の脱毛クリニック利用経験者（男性のみ）<br>
            <br>
            <u><b>集計期間</b></u><br>
            2025年9月16日～2025年9月19日<br>
            <br>
            <u><b>調査方法</b></u><br>
            インターネットによる調査<br>
            <br>
            <u><b>有効回答数</b></u><br>
            177人
          </p>
        </li>
        <li>
          <p class="lead">
            アクセス数ポイントについて
          </p>
          <p class="text">
            <u><b>調査実施者</b></u><br>
                MYメンズ脱毛ガイド.com<br>
                <br>
                <u><b>調査目的</b></u><br>
                各社ホームページへのアクセス数により脱毛クリニック利用経験者に選ばれている脱毛クリニックを紹介するため。<br>
                <br>
                <u><b>調査対象</b></u><br>
                日本国内からのアクセス<br>
                ※同IPアドレス、同一企業（人物）と類推されるユーザーからのアクセスについては集計対象外<br>
                <br>
                <u><b>集計期間</b></u><br>
                過去30日間<br>
                <br>
                <u><b>調査方法</b></u><br>
                当サイト掲載サービスのホームページへのアクセス数を算出
          </p>
        </li>
      </ul>
    </section>

    <?php include './components/footer.php'; ?>
  </main>

  <section class="ColumnRight">
    <ul class="list">
      <li>
        <a href="index.php" class="text-lg">全身脱毛クリニック比較</a>
      </li>
      <li>
        <a href="lp_hige.php" class="text-lg">ヒゲ脱毛クリニック比較</a>
      </li>
      <li>
        <a href="privacy.php" class="text-base">運営者情報・プライバシーポリシー</a>
      </li>
      <li>
        <a href="survey.php" class="text-base">調査概要</a>
      </li>
    </ul>
  </section>

</body>

</html>