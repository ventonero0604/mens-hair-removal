<?php include './function/getProduct.php'; ?>

<?php include './components/head.php'; ?>

<body>
  <section class="ColumnLeft">
    <div class="ColumnLeft_header">
      <a href="/" class="logo">
        <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
      </a>
      <p class="area">
        <?php
        if (isset($_GET['area']) && $_GET['area'] != 0 && !empty($compare1['areaNameJp'])) {
          echo htmlspecialchars($compare1['areaNameJp']) . '版';
        } else {
          echo $currentMonth . '月最新版';
        }
        ?>
      </p>
    </div>
    <?php $searchFormId = 'searchForm1';
    include './components/search.php'; ?>
  </section>
  <header class="Header">
    <a href="/" class="logo">
      <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
    </a>
    <p class="area">
      <?php
      if (isset($_GET['area']) && $_GET['area'] != 0 && !empty($compare1['areaNameJp'])) {
        echo htmlspecialchars($compare1['areaNameJp']) . '版';
      } else {
        echo $currentMonth . '月最新版';
      }
      ?>
    </p>
  </header>
  <main class="Top">
    <section class="Kv">
      <h1>
        <img src="./img/kv-hige.png" alt="2025年 最新トレンド メンズ医療脱毛 比較5選">
      </h1>
    </section>

    <section class="LogoList">
      <div class="logo-marquee">
        <div class="logo-track">
          <?php
          // ./img/logoディレクトリからロゴファイルを取得
          $logoDir = './img/logo/';
          $logoFiles = array_filter(scandir($logoDir), function ($file) {
            return !in_array($file, ['.', '..', '.DS_Store']) &&
              preg_match('/\.(png|jpg|jpeg|gif|svg)$/i', $file);
          });

          // ロゴを2回繰り返して表示（マーキー効果のため）
          for ($i = 0; $i < 2; $i++) {
            foreach ($logoFiles as $index => $file) {
              $logoNumber = $index + 1;
              echo '<div class="Logo">';
              echo '<img src="' . $logoDir . htmlspecialchars($file) . '" alt="ロゴ' . $logoNumber . '">';
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
    </section>

    <section class="PageLink">
      <a href="index.php">
        <img src="./img/ico-all.png" alt="">
        <p>
          <em>全身脱毛</em>ページはこちら
        </p>
      </a>
    </section>

    <section class="Compare">
      <div class="header">
        <h3 class="lead">
          <img src="./img/ico-money.svg" alt="">
          <p class="text">
            <em>コスパ</em>と<em>満足度</em>で選ぶ
          </p>
        </h3>
        <div class="title">
          <p class="upper">
            <span class="name"><?php
                                if (isset($_GET['area']) && $_GET['area'] != 0 && !empty($compare1['areaNameJp'])) {
                                  echo htmlspecialchars($compare1['areaNameJp']);
                                } else {
                                  echo $currentMonth . '月最新版';
                                }
                                ?></span><?php echo isset($_GET['area']) && $_GET['area'] != 0 ? 'の' : ''; ?>
          </p>
          <p class="bottom">
            メンズヒゲ脱毛クリニック<em class="gradient"><span class="number">3</span><span class="text">選</span></em>
          </p>
        </div>
      </div>
      <div class="content -list">
        <ul class="list">
          <?php
          $rankings = [$compare1, $compare2, $compare3];
          $rankImages = ['./img/img-no1.png', './img/img-no2.png', './img/img-no3.png'];
          $rankNumbers = [1, 2, 3];
          // ヒゲ脱毛用のURLマッピング
          $higeUrls = ['linkUrlHige01', 'linkUrlHige02', 'linkUrlHige03'];

          foreach ($rankings as $index => $ranking):
            // 現在のランキング位置に応じたヒゲ脱毛用URLを設定
            $currentHigeUrl = $ranking[$higeUrls[$index]] ?? '#';
          ?>
            <li class="item">
              <img class="rank" src="<?php echo $rankImages[$index]; ?>" alt="<?php echo $rankNumbers[$index]; ?>">
              <div class="body">
                <div class="left">
                  <a href="<?php echo htmlspecialchars($currentHigeUrl); ?>" class="logo">
                    <img src="./img/logo/<?php echo $ranking['imageLogo'] ?: 'regina.png'; ?>" alt="<?php echo htmlspecialchars($ranking['service'] ?? ''); ?>">
                  </a>
                  <div class="rate">
                    <div class="stars">
                    </div>
                    <p class="value js-value">
                      <?php echo htmlspecialchars($ranking['rate'] ?? '4.5'); ?>
                    </p>
                  </div>
                  <a href="<?php echo htmlspecialchars($currentHigeUrl); ?>" class="name">
                    <?php echo htmlspecialchars($ranking['service'] ?? ''); ?>
                  </a>
                </div>
                <div class="right">
                  <ul class="compare">
                    <li>
                      <div class="header -first">
                        ひげ脱毛
                      </div>
                      <div class="info">
                        <img src="<?php echo flagToIcon($ranking['flagCompareHige']); ?>" alt="">
                        <div class="texts">
                          <p class="text">
                            <?php echo $ranking['plan01TotalPrice']; ?>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="header">
                        全身脱毛
                      </div>
                      <div class="info">
                        <img src="<?php echo flagToIcon($ranking['flagCompareBody']); ?>" alt="">
                        <div class="texts">
                          <p class="text">
                            <?php echo $ranking['planBodyTotalPrice']; ?>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="header -last">
                        脱毛器
                      </div>
                      <div class="info">
                        <img src="<?php echo flagToIcon($ranking['flagCompareMachine']); ?>" alt="">
                        <?php echo generateMachineLabels($ranking); ?>
                      </div>
                    </li>
                  </ul>
                  <div class="comment">
                    <img src="./img/img-compare-person.png" alt="">
                    <p class="text">
                      <?php echo htmlspecialchars($ranking['pickupCopy'] ?? ''); ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="footer">
                <div class="ButtonUnit">
                  <p class="tooltip"><em>最安値</em>のネット予約</p>
                  <a href="<?php echo htmlspecialchars($currentHigeUrl); ?>" class="Button -primary -medium">公式サイトはコチラ</a>
                </div>
                <div class="ButtonUnit">
                  <p class="attention">店舗一覧/コース…等</p>
                  <a href="#<?php echo htmlspecialchars($ranking['strAnchor'] ?? ''); ?>" class="Button -detail">詳細を見る</a>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="content -table">
        <?php
        $compareRankings = [$compare1, $compare2, $compare3];
        // ヒゲ脱毛用のURLマッピング（テーブル用）
        $tableHigeUrls = ['linkUrlHige01', 'linkUrlHige02', 'linkUrlHige03'];
        ?>
        <table class="table table-sticky">
          <tbody>
            <tr>
              <th>
                <span class="text-sm">クリニック名</span>
              </th>
              <?php foreach ($compareRankings as $tableIndex => $ranking):
                // テーブル用のヒゲ脱毛URLを設定
                $tableHigeUrl = $ranking[$tableHigeUrls[$tableIndex]] ?? '#';
              ?>
                <td>
                  <div class="item">
                    <a href="<?php echo htmlspecialchars($tableHigeUrl); ?>" class="logo">
                      <img src="./img/logo/<?php echo htmlspecialchars($ranking['imageLogo'] ?? 'regina.png'); ?>" alt="<?php echo htmlspecialchars($ranking['service'] ?? ''); ?>">
                    </a>
                    <div class="rate">
                      <div class="stars">
                      </div>
                      <p class="value js-value">
                        <?php echo htmlspecialchars($ranking['rate'] ?? '4.5'); ?>
                      </p>
                    </div>
                    <a href="<?php echo htmlspecialchars($tableHigeUrl); ?>" class="name">
                      <?php echo htmlspecialchars($ranking['service'] ?? ''); ?>
                    </a>
                  </div>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                <img src="./img/ico-hige.png" alt="">
                ヒゲ脱毛料金
              </th>
              <?php foreach ($compareRankings as $ranking): ?>
                <td>
                  <div class="item">
                    <img src="<?php echo flagToIcon($ranking['flagCompareHige']); ?>" alt="" class="icon">
                    <div class="texts">
                      <p class="text text-xs">
                        <?php echo $ranking['plan01TotalPrice']; ?>
                      </p>
                    </div>
                  </div>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                <img src="./img/ico-all.png" alt="">
                全身脱毛
              </th>
              <?php foreach ($compareRankings as $ranking): ?>
                <td>
                  <div class="item">
                    <img src="<?php echo flagToIcon($ranking['flagCompareBody']); ?>" alt="" class="icon">
                    <div class="texts">
                      <p class="text text-xs">
                        <?php echo $ranking['planBodyTotalPrice']; ?>
                      </p>
                    </div>
                  </div>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                <img src="./img/ico-tool.png" alt="">
                脱毛器
              </th>
              <?php foreach ($compareRankings as $ranking): ?>
                <td>
                  <div class="item">
                    <img src="<?php echo flagToIcon($ranking['flagCompareMachine']); ?>" alt="" class="icon">
                    <div class="labels">
                      <?php echo generateMachineLabels($ranking); ?>
                      <div class="label -white">
                        <?php echo htmlspecialchars($ranking['machineSumarry'] ?? ''); ?>
                      </div>
                    </div>
                  </div>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                <img src="./img/ico-care.png" alt="">
                痛みのケア
              </th>
              <?php foreach ($compareRankings as $ranking): ?>
                <td>
                  <div class="item">
                    <img src="<?php echo flagToIcon($ranking['flagCompareCare']); ?>" alt="" class="icon">
                    <div class="texts">
                      <p class="text text-sm">
                        <?php echo $ranking['care']; ?>
                      </p>
                    </div>
                  </div>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                <img src="./img/ico-clinic.png" alt="">
                院数
              </th>
              <?php foreach ($compareRankings as $ranking): ?>
                <td>
                  <div class="item">
                    <img src="<?php echo flagToIcon($ranking['flagCompareNumOfClinic']); ?>" alt="" class="icon">
                    <div class="texts">
                      <a href="#" class="link js-modal" data-service="<?php echo htmlspecialchars($ranking['service'] ?? ''); ?>" data-logo="<?php echo htmlspecialchars($ranking['imageLogo'] ?? 'regina.png'); ?>">全国<?php echo htmlspecialchars($ranking['numOfClinic'] ?? '0'); ?>院</a>
                    </div>
                  </div>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                総評
              </th>
              <?php foreach ($compareRankings as $ranking): ?>
                <td>
                  <p class="text-[1.1rem] text-left leading-tight">
                    <?php echo htmlspecialchars($ranking['pickupCopy'] ?? ''); ?>
                  </p>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <th>
                公式サイト
              </th>
              <?php foreach ($compareRankings as $tableIndex2 => $ranking):
                // 公式サイトボタン用のヒゲ脱毛URLを設定
                $tableHigeUrl2 = $ranking[$tableHigeUrls[$tableIndex2]] ?? '#';
              ?>
                <td>
                  <a href="<?php echo htmlspecialchars($tableHigeUrl2); ?>" class="Button -primary -small leading-tight">公式<br>サイト</a>
                </td>
              <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="Choice">
      <div class="header">
        <div class="lead">
          <div class="left">必見</div>
          <div class="right">
            あとで公開しない
          </div>
        </div>
        <h2 class="title">
          <span class="highlight">脱毛クリニックの選び方</span><span class="gradient"><em>2</em>つ</span>
        </h2>
      </div>
      <ul class="list">
        <li class="item">
          <div class="itemHeader">
            <p class="number">1</p>
            <p class="title">
              メンズ脱毛は<spna class="red">基本痛い！</spna><br>
              料金は<span class="highlight">麻酔代込みで比較</span>しよう
            </p>
          </div>
          <div class="itemBody">
            <img src="./img/img-choice-1.png" alt="">
            <div class="texts">
              <p class="title">
                <span class="highlight">麻酔込み</span>ならそんな時でも安心
              </p>
              <p class="text">
                男性は女性に比べて毛が濃い部位が多いため、ひげ脱毛をはじめとするメンズ脱毛では、レーザーの出力を高くする必要があります。<br>
                その結果として生じるのが「痛み」です。もちろん、多くのクリニックでは冷却機能などで痛みを軽減する工夫がされていますが、部位によっては涙が出るほど痛みを感じることもあります。<br>
                そのため、メンズ脱毛を検討する際は「料金に麻酔が含まれているか」を前提に、クリニックを比較することをおすすめします。
              </p>
            </div>
          </div>
        </li>
        <li class="item">
          <div class="itemHeader">
            <p class="number">2</p>
            <p class="title">
              <spna class="red">毛の濃さや部位</spna>で変わる<br>
              <span class="highlight">脱毛器を複数選べる</span>クリニックが<span class="red">◎</span>
            </p>
          </div>
          <div class="itemBody">
            <img src="./img/img-choice-2.png" alt="">
            <div class="texts">
              <p class="text">
                脱毛器の種類を選べるクリニックなら、自分の毛質や痛みの感じ方に合わせた施術が可能。濃い毛に強い「熱破壊式」、産毛に対応し痛みが少ない「蓄熱式」など、最適な方法を選べるのがメリットです
              </p>
            </div>
          </div>
        </li>
      </ul>
    </section>

    <section class="Ranking">
      <div class="header">
        <p class="lead">
          <span class="label">
            <?php
            if (isset($_GET['area']) && $_GET['area'] != 0 && !empty($compare1['areaNameJp'])) {
              echo htmlspecialchars($compare1['areaNameJp']) . '版';
            } else {
              echo $currentMonth . '月最新版';
            }
            ?>
          </span>
          <em>実績</em>と<em>コスパ</em>で選ぶ
        </p>
        <div class="title">
          <img src="./img/ico-crown.png" alt="">
          <h2 class="text">
            人気の脱毛クリニック<span class="color">TOP<em>3</em></span>
          </h2>
        </div>
      </div>
      <div class="content">
        <?php
        $rankings = [$compare1, $compare2, $compare3];
        $rankImages = ['./img/img-ranking-badge-1.png', './img/img-ranking-badge-2.png', './img/img-ranking-badge-3.png'];
        $rankNumbers = [1, 2, 3];
        // ランキングセクション用のヒゲ脱毛URL
        $rankingHigeUrls = ['linkUrlHige01', 'linkUrlHige02', 'linkUrlHige03'];

        foreach ($rankings as $index => $ranking):
          // ランキング用のヒゲ脱毛URLを設定
          $rankingHigeUrl = $ranking[$rankingHigeUrls[$index]] ?? '#';
        ?>
          <aside class="Rank">
            <div class="Rank_header" id="<?php echo $ranking['strAnchor']; ?>">
              <h3 class="Rank_header_title">
                <img src="<?php echo $rankImages[$index]; ?>" alt="<?php echo $rankNumbers[$index]; ?>">
                <a href="<?php echo htmlspecialchars($rankingHigeUrl); ?>">
                  <?php echo htmlspecialchars($ranking['clinicName'] ?? ''); ?>
                </a>
              </h3>
              <p class="Rank_header_lead">
                <span class="Rank_header_lead_label">POINT</span>
                <span class="Rank_header_lead_text">
                  <?php echo htmlspecialchars($ranking['rankingCopy'] ?? ''); ?>
                </span>
              </p>
            </div>
            <div class="Rank_kv">
              <img src="./img/ranking/<?php echo htmlspecialchars($ranking['imageBanner'] ?? 'no1.jpg'); ?>" alt="">
            </div>
            <div class="Rank_rate">
              <div class="Rank_rate_stars">
              </div>
              <p class="Rank_rate_value js-value">
                <?php echo htmlspecialchars($ranking['rate'] ?? '4.5'); ?>
              </p>
            </div>
            <div class="ButtonUnit -full">
              <p class="tooltip -inside"><em>最安値</em>のネット予約</p>
              <a href="<?php echo htmlspecialchars($rankingHigeUrl); ?>" class="Button -primary -large">公式サイトはコチラ</a>
            </div>
            <ul class="Rank_info">
              <li>
                <div class="Rank_info_title">
                  <img src="./img/img-ranking-badge.png" alt="">
                  <?php echo htmlspecialchars($ranking['point01Title'] ?? ''); ?>
                </div>
                <p class="Rank_info_text">
                  <?php echo htmlspecialchars($ranking['point01Description'] ?? ''); ?>
                </p>
              </li>
              <li>
                <div class="Rank_info_title">
                  <img src="./img/img-ranking-badge.png" alt="">
                  <?php echo htmlspecialchars($ranking['point02Title'] ?? ''); ?>
                </div>
                <p class="Rank_info_text">
                  <?php echo htmlspecialchars($ranking['point02Description'] ?? ''); ?>
                </p>
              </li>
              <li>
                <div class="Rank_info_title">
                  <img src="./img/img-ranking-badge.png" alt="">
                  <?php echo htmlspecialchars($ranking['point03Title'] ?? ''); ?>
                </div>
                <p class="Rank_info_text">
                  <?php echo htmlspecialchars($ranking['point03Description'] ?? ''); ?>
                </p>
              </li>
            </ul>
            <div class="Rank_price">
              <div class="Rank_title">
                <img src="./img/ico-yen.svg" alt="">
                <p class="Rank_title_text">
                  料金プラン
                </p>
              </div>
              <table class="Rank_price_table">
                <thead>
                  <tr>
                    <th>部位</th>
                    <th>総額</th>
                    <th>1回あたり</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $planNumbers = ['01', '02', '03', '04'];
                  foreach ($planNumbers as $planNum):
                    // データが存在するかチェック
                    $planTitle = $ranking['plan' . $planNum . 'Title'] ?? '';
                    $planTotalPrice = $ranking['plan' . $planNum . 'TotalPrice'] ?? '';
                    $planOncePrice = $ranking['plan' . $planNum . 'OncePrice'] ?? '';

                    // タイトルが空またはnullの場合は行を非表示
                    if (empty($planTitle) || $planTitle === null):
                      continue;
                    endif;
                  ?>
                    <tr>
                      <td>
                        <img src="./img/parts/<?php echo htmlspecialchars($ranking['plan' . $planNum . 'Icon'] ?? ''); ?>" alt="" class="w-10 justify-self-center">
                        <p class="font-bold text-md mt-1">
                          <?php echo htmlspecialchars($planTitle); ?>
                        </p>
                      </td>
                      <td class="total">
                        <p>
                          <?php echo $planTotalPrice; ?>
                        </p>
                      </td>
                      <td class="spot"><?php echo $planOncePrice; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <tr>
                    <td>
                      <img src="./img/ico-all.png" alt="" class="w-10 justify-self-center">
                      <p class="font-bold text-md mt-1">
                        <?php echo htmlspecialchars($ranking['planBodyTitle'] ?? ''); ?>
                      </p>
                    </td>
                    <td class="total">
                      <p>
                        <?php echo $ranking['planBodyTotalPrice']; ?>
                      </p>
                    </td>
                    <td class="spot"><?php echo $ranking['planBodyOncePrice']; ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="<?php echo htmlspecialchars($ranking['linkUrlForm'] ?? '#'); ?>" class="Rank_price_link">料金プランの詳細をチェック >></a>
            </div>
            <div class="Rank_machine">
              <div class="Rank_title">
                <img src="./img/ico-machine.svg" alt="">
                <p class="Rank_title_text">
                  取り扱い脱毛器
                </p>
              </div>
              <ul class="Rank_machine_list">
                <?php
                $machineNumbers = ['01', '02', '03', '04'];
                foreach ($machineNumbers as $machineNum):
                  $machineName = $ranking['machine' . $machineNum . 'Name'];
                  if (!empty($machineName)): // nameが空でない場合のみ表示
                ?>
                    <li>
                      <div class="Rank_machine_header">
                        <p class="Rank_machine_header_title">
                          <?php echo htmlspecialchars($ranking['machine' . $machineNum . 'Name'] ?? ''); ?>
                        </p>
                      </div>
                      <div class="Rank_machine_body">
                        <figure class="Rank_machine_body_image">
                          <img src="./img/machine/<?php echo htmlspecialchars($ranking['machine' . $machineNum . 'Image'] ?? ''); ?>" alt="">
                        </figure>
                        <div class="Rank_machine_content">
                          <p class="Rank_machine_content_label">
                            タイプ
                          </p>
                          <p class="Rank_machine_content_text">
                            <span class="red"><?php echo htmlspecialchars($ranking['machine' . $machineNum . 'Type'] ?? ''); ?></span>
                          </p>
                          <p class="Rank_machine_content_label">
                            痛み
                          </p>
                          <p class="Rank_machine_content_text">
                            <?php echo htmlspecialchars($ranking['machine' . $machineNum . 'Pain'] ?? ''); ?>
                          </p>
                          <p class="Rank_machine_content_label">
                            特長
                          </p>
                          <p class="Rank_machine_content_text">
                            <?php echo htmlspecialchars($ranking['machine' . $machineNum . 'Feature'] ?? ''); ?>
                          </p>
                        </div>
                      </div>
                    </li>
                <?php
                  endif; // nameが空でない場合の終了
                endforeach; // ループの終了
                ?>
              </ul>
            </div>
            <div class="Rank_shops">
              <div class="Rank_title">
                <img src="./img/ico-building.svg" alt="">
                <p class="Rank_title_text">
                  店舗一覧
                </p>
              </div>
              <?php if (isset($_GET['area']) && $_GET['area'] != 0): ?>
                <p class="Rank_shops_title">
                  \ <span class="red"> <?php echo htmlspecialchars($compare1['areaNameJp'] ?? ''); ?>にお住いの方の最寄り店舗</span>はこちら /
                </p>
              <?php endif; ?>
              <div class="Rank_shops_content">
                <?php
                // 現在のランキングのサービスに応じたピックアップ店舗を取得
                $currentPickupStore = getPickupStoreByService($stores, $ranking['service'], $ranking['clinicName']);
                ?>
                <?php if ($currentPickupStore): ?>
                  <div class="Rank_shops_pickup">
                    <div class="Rank_shops_pickup_header">
                      <a href="<?php echo htmlspecialchars($ranking['linkUrlForm'] ?? '#'); ?>" class="Rank_shops_pickup_header_link"><?php echo htmlspecialchars($currentPickupStore['clinicName'] ?? ''); ?></a>
                    </div>
                    <div class="Rank_shops_pickup_body">
                      <div class="Rank_shops_pickup_body_item">
                        <figure class="Rank_shops_pickup_body_item_icon">
                          <img src="./img/ico-building.svg" alt="">
                        </figure>
                        <div class="Rank_shops_pickup_body_item_text">
                          <?php echo htmlspecialchars(($currentPickupStore['prefectureName'] ?? '') . ($currentPickupStore['town'] ?? '') . ($currentPickupStore['address'] ?? '')); ?>
                        </div>
                      </div>
                      <div class="Rank_shops_pickup_body_item">
                        <figure class="Rank_shops_pickup_body_item_icon">
                          <img src="./img/ico-train.svg" alt="">
                        </figure>
                        <div class="Rank_shops_pickup_body_item_text">
                          <?php echo htmlspecialchars($currentPickupStore['accses'] ?? ''); ?>
                        </div>
                      </div>
                    </div>
                    <a href="<?php echo htmlspecialchars($ranking['linkUrlForm'] ?? '#'); ?>" class="Button -reserve">
                      無料カウンセリング予約
                    </a>
                  </div>
                <?php endif; ?>

                <?php
                // 現在のランキングのサービス名に応じた店舗のみをフィルタリング
                $filteredStores = getFilteredStoresByService($stores, $ranking['service']);
                ?>
                <?php if (!empty($filteredStores)): ?>
                  <?php $regionIndex = 1; ?>
                  <?php foreach ($filteredStores as $regionName => $storeList): ?>
                    <div class="Rank_shops_area">
                      <input type="checkbox" id="expand-shops<?php echo $regionIndex; ?>-<?php echo $index; ?>" class="Rank_shops_toggle" hidden>
                      <label for="expand-shops<?php echo $regionIndex; ?>-<?php echo $index; ?>" class="Rank_shops_button">
                        <span class="text"><?php echo htmlspecialchars($regionName ?? ''); ?></span>
                        <span class="icon"></span>
                      </label>
                      <ul class="Rank_shops_list">
                        <?php foreach ($storeList as $store): ?>
                          <li class="Rank_shops_item">
                            <div class="Rank_shops_item_header">
                              <a href="<?php echo htmlspecialchars($ranking['linkUrlForm'] ?? '#'); ?>" class="Rank_shops_item_header_link"><?php echo htmlspecialchars($store['clinicName'] ?? ''); ?></a>
                            </div>
                            <div class="Rank_shops_item_body">
                              <div class="Rank_shops_item_body_item">
                                <figure class="Rank_shops_item_body_item_icon">
                                  <img src="./img/ico-building.svg" alt="">
                                </figure>
                                <div class="Rank_shops_item_body_item_text">
                                  <?php echo htmlspecialchars(($store['prefectureName'] ?? '') . ($store['town'] ?? '') . ($store['address'] ?? '')); ?>
                                </div>
                              </div>
                              <div class="Rank_shops_item_body_item">
                                <figure class="Rank_shops_item_body_item_icon">
                                  <img src="./img/ico-train.svg" alt="">
                                </figure>
                                <div class="Rank_shops_item_body_item_text">
                                  <?php echo htmlspecialchars($store['accses'] ?? ''); ?>
                                </div>
                              </div>
                            </div>
                            <a href="<?php echo htmlspecialchars($ranking['linkUrlForm'] ?? '#'); ?>" class="Button -reserveSmall">
                              無料カウンセリング予約
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                    <?php $regionIndex++; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="ButtonUnit -full">
              <p class="tooltip -inside"><em>最安値</em>のネット予約</p>
              <a href="<?php echo htmlspecialchars($ranking['linkUrlForm'] ?? '#'); ?>" class="Button -primary -large">公式サイトはコチラ</a>
            </div>
            <?php if (!empty($ranking['noticeCommon']) && $ranking['noticeCommon'] !== 'noticeCommon'): ?>
              <div class="Rank_small">
                <small>
                  <?php echo htmlspecialchars($ranking['noticeCommon']); ?>
                </small>
              </div>
            <?php endif; ?>
          </aside>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="Faq">
      <h3 class="Faq_header">
        <img src="./img/ico-question.svg" alt="">
        よくある質問
      </h3>
      <ul class="Faq_list">
        <li class="Faq_item">
          <input type="checkbox" id="faq-1" class="Faq_toggle" hidden>
          <label for="faq-1" class="Faq_question">
            <span class="Faq_question_text">医療脱毛は何回くらい通う必要がありますか？</span>
            <span class="Faq_question_arrow"></span>
          </label>
          <div class="Faq_answer">
            <p>個人差はありますが、一般的に5～8回程度の施術が目安となります。毛の濃さや部位により異なりますが、3回目頃から効果を実感していただけることが多いです。</p>
            <p>ヒゲなど濃い部位は8～12回、腕や脚などは5～6回程度が平均的な回数です。カウンセリング時に、お客様の毛質や肌質を確認して最適なプランをご提案いたします。</p>
          </div>
        </li>
        <li class="Faq_item">
          <input type="checkbox" id="faq-2" class="Faq_toggle" hidden>
          <label for="faq-2" class="Faq_question">
            <span class="Faq_question_text">痛みはどの程度ありますか？</span>
            <span class="Faq_question_arrow"></span>
          </label>
          <div class="Faq_answer">
            <p>医療脱毛では輪ゴムで弾かれるような痛みを感じることがありますが、最新の脱毛機器では痛みを大幅に軽減しています。</p>
            <p>当クリニックでは麻酔クリームもご用意しており、痛みに敏感な方でも安心して施術を受けていただけます。痛みの感じ方には個人差がありますので、お気軽にご相談ください。</p>
          </div>
        </li>
        <li class="Faq_item">
          <input type="checkbox" id="faq-3" class="Faq_toggle" hidden>
          <label for="faq-3" class="Faq_question">
            <span class="Faq_question_text">料金の支払い方法は何がありますか？</span>
            <span class="Faq_question_arrow"></span>
          </label>
          <div class="Faq_answer">
            <p>現金、各種クレジットカード、医療ローンでのお支払いが可能です。</p>
            <p>医療ローンをご利用いただくと、月々3,000円からの分割払いも可能ですので、まとまった費用のご用意が難しい方でも安心してご利用いただけます。詳しくはカウンセリング時にご説明いたします。</p>
          </div>
        </li>
      </ul>
    </section>

    <section class="Undecided">
      <h3 class="Undecided_header">
        <img src="./img/title-undecided.svg" alt="迷ったらやっぱりここが安心！人気の大手脱毛クリニック2選">
      </h3>
      <ul class="Undecided_list">
        <?php
        $undecidedData = [$compare1, $compare2];
        // Undecided用のヒゲ脱毛URL（1位と2位のみ）
        $undecidedHigeUrls = ['linkUrlHige01', 'linkUrlHige02'];
        foreach ($undecidedData as $index => $clinic):
          // Undecided用のヒゲ脱毛URLを設定
          $undecidedHigeUrl = $clinic[$undecidedHigeUrls[$index]] ?? '#';
        ?>
          <li class="Card">
            <div class="Card_header">
              <?php if (!empty($clinic['imageBanner'])): ?>
                <figure class="Card_image">
                  <img src="./img/ranking/<?php echo htmlspecialchars($clinic['imageBanner']); ?>" alt="">
                </figure>
              <?php endif; ?>
              <a href="<?php echo htmlspecialchars($undecidedHigeUrl); ?>" class="Card_header_link">
                <?php echo htmlspecialchars($clinic['service'] ?? ''); ?>
              </a>
            </div>
            <div class="Card_body">
              <table class="Card_table">
                <tr>
                  <th>全身</th>
                  <td>
                    <?php echo $clinic['planBodyTotalPrice']; ?>
                  </td>
                </tr>
                <tr>
                  <th>ヒゲ</th>
                  <td>
                    <?php echo $clinic['plan01TotalPrice']; ?>
                  </td>
                </tr>
                <tr>
                  <th>院数</th>
                  <td>
                    <p>全国<?php echo htmlspecialchars($clinic['numOfClinic'] ?? '0'); ?>院</p>
                  </td>
                </tr>
              </table>
              <p class="Card_info -small">
                <?php echo htmlspecialchars($clinic['pickupCopy'] ?? ''); ?>
              </p>
              <a href="<?php echo htmlspecialchars($undecidedHigeUrl); ?>" class="Button -primary -small">
                公式サイトはコチラ
              </a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section class="Recommend">
      <h3 class="header">
        <img src="./img/title-recommend.png" alt="迷ったらやっぱりここ！当サイトイチ押しのクリニック">
      </h3>
      <div class="body">
        <div class="Card">
          <div class="Card_header">
            <?php if (!empty($compare1['imageBanner']) && $compare1['imageBanner'] !== 'imageBanner'): ?>
              <figure class="Card_image">
                <img src="./img/ranking/<?php echo htmlspecialchars($compare1['imageBanner']); ?>" alt="<?php echo htmlspecialchars($compare1['service'] ?? ''); ?>">
              </figure>
            <?php endif; ?>
            <a href="<?php echo htmlspecialchars($compare1['linkUrlHige01'] ?? '#'); ?>" class="Card_header_link">
              <?php echo htmlspecialchars($compare1['service'] ?? ''); ?>
            </a>
          </div>
          <div class="Card_body">
            <table class="Card_table">
              <tr>
                <th class="w-30">全身</th>
                <td>
                  <?php echo $compare1['planBodyTotalPrice']; ?>
                </td>
              </tr>
              <tr>
                <th class="w-30">ヒゲ</th>
                <td>
                  <?php echo $compare1['plan01TotalPrice']; ?>
                </td>
              </tr>
              <tr>
                <th class="w-30">院数</th>
                <td>
                  <p>全国<?php echo htmlspecialchars($compare1['numOfClinic'] ?? '0'); ?>院</p>
                </td>
              </tr>
            </table>
            <p class="Card_info">
              <?php echo htmlspecialchars($compare1['pickupCopy'] ?? ''); ?>
            </p>
            <a href="<?php echo htmlspecialchars($compare1['linkUrlHige01'] ?? '#'); ?>" class="Button -primary -medium">
              公式サイトはコチラ
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="SearchClinic">
      <?php $searchFormId = 'searchForm2';
      include './components/search.php'; ?>
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

  <!-- 1位のモーダル -->
  <div class="Modal" id="storeModal-<?php echo htmlspecialchars($compare1['service'] ?? ''); ?>">
    <button class="close">
      <img src="./img/ico-modal-close.svg" alt="">
    </button>
    <div class="content">
      <div class="header">
        <figure class="logo">
          <img src="./img/logo/<?php echo htmlspecialchars($compare1['imageLogo'] ?? 'logo_mensrize.png'); ?>" alt="">
        </figure>
        <a href="<?php echo htmlspecialchars($compare1['linkUrlForm'] ?? '#'); ?>" class="link text-xl"><?php echo htmlspecialchars($compare1['service'] ?? 'メンズリゼ'); ?></a>
      </div>
      <div class="body">
        <p class="font-bold text-center text-xl">店舗一覧</p>
        <?php if (!empty($modalStoresByService[$compare1['service']])): ?>
          <?php foreach ($modalStoresByService[$compare1['service']] as $areaName => $regionGroups): ?>
            <div class="clinic">
              <p class="text-md font-bold text-center">
                <?php echo htmlspecialchars($areaName ?? ''); ?>
              </p>
              <ul class="list">
                <?php foreach ($regionGroups as $regionName => $storeList): ?>
                  <li>
                    <p class="title">
                      <?php echo htmlspecialchars($regionName ?? ''); ?>
                    </p>
                    <div class="items">
                      <?php foreach ($storeList as $store): ?>
                        <div class="item">
                          <a href="<?php echo htmlspecialchars($compare1['linkUrlForm'] ?? '#'); ?>" class="link">
                            <?php echo htmlspecialchars($store['clinicName'] ?? ''); ?>
                            <img src="./img/ico-external.svg" alt="">
                          </a>
                          <div class="texts">
                            <p class="text">
                              <img src="./img/ico-building.svg" alt="">
                              <?php echo htmlspecialchars(($store['prefectureName'] ?? '') . ($store['town'] ?? '') . ($store['address'] ?? '')); ?>
                            </p>
                            <p class="text">
                              <img src="./img/ico-train.svg" alt="">
                              <?php echo htmlspecialchars($store['accses'] ?? ''); ?>
                            </p>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- 2位のモーダル -->
  <div class="Modal" id="storeModal-<?php echo htmlspecialchars($compare2['service'] ?? ''); ?>">
    <button class="close">
      <img src="./img/ico-modal-close.svg" alt="">
    </button>
    <div class="content">
      <div class="header">
        <figure class="logo">
          <img src="./img/logo/<?php echo htmlspecialchars($compare2['imageLogo'] ?? 'logo_freya.png'); ?>" alt="">
        </figure>
        <a href="<?php echo htmlspecialchars($compare2['linkUrlForm'] ?? '#'); ?>" class="link text-xl"><?php echo htmlspecialchars($compare2['service'] ?? 'メンズフレイア'); ?></a>
      </div>
      <div class="body">
        <p class="font-bold text-center text-xl">店舗一覧</p>
        <?php if (!empty($modalStoresByService[$compare2['service']])): ?>
          <?php foreach ($modalStoresByService[$compare2['service']] as $areaName => $regionGroups): ?>
            <div class="clinic">
              <p class="text-md font-bold text-center">
                <?php echo htmlspecialchars($areaName ?? ''); ?>
              </p>
              <ul class="list">
                <?php foreach ($regionGroups as $regionName => $storeList): ?>
                  <li>
                    <p class="title">
                      <?php echo htmlspecialchars($regionName ?? ''); ?>
                    </p>
                    <div class="items">
                      <?php foreach ($storeList as $store): ?>
                        <div class="item">
                          <a href="<?php echo htmlspecialchars($compare2['linkUrlForm'] ?? '#'); ?>" class="link">
                            <?php echo htmlspecialchars($store['clinicName'] ?? ''); ?>
                            <img src="./img/ico-external.svg" alt="">
                          </a>
                          <div class="texts">
                            <p class="text">
                              <img src="./img/ico-building.svg" alt="">
                              <?php echo htmlspecialchars(($store['prefectureName'] ?? '') . ($store['town'] ?? '') . ($store['address'] ?? '')); ?>
                            </p>
                            <p class="text">
                              <img src="./img/ico-train.svg" alt="">
                              <?php echo htmlspecialchars($store['accses'] ?? ''); ?>
                            </p>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- 3位のモーダル -->
  <div class="Modal" id="storeModal-<?php echo htmlspecialchars($compare3['service'] ?? ''); ?>">
    <button class="close">
      <img src="./img/ico-modal-close.svg" alt="">
    </button>
    <div class="content">
      <div class="header">
        <figure class="logo">
          <img src="./img/logo/<?php echo htmlspecialchars($compare3['imageLogo'] ?? 'regina.png'); ?>" alt="">
        </figure>
        <a href="<?php echo htmlspecialchars($compare3['linkUrlForm'] ?? '#'); ?>" class="link text-xl"><?php echo htmlspecialchars($compare3['service'] ?? 'レジーナ'); ?></a>
      </div>
      <div class="body">
        <p class="font-bold text-center text-xl">店舗一覧</p>
        <?php if (!empty($modalStoresByService[$compare3['service']])): ?>
          <?php foreach ($modalStoresByService[$compare3['service']] as $areaName => $regionGroups): ?>
            <div class="clinic">
              <p class="text-md font-bold text-center">
                <?php echo htmlspecialchars($areaName ?? ''); ?>
              </p>
              <ul class="list">
                <?php foreach ($regionGroups as $regionName => $storeList): ?>
                  <li>
                    <p class="title">
                      <?php echo htmlspecialchars($regionName ?? ''); ?>
                    </p>
                    <div class="items">
                      <?php foreach ($storeList as $store): ?>
                        <div class="item">
                          <a href="<?php echo htmlspecialchars($compare3['linkUrlForm'] ?? '#'); ?>" class="link">
                            <?php echo htmlspecialchars($store['clinicName'] ?? ''); ?>
                            <img src="./img/ico-external.svg" alt="">
                          </a>
                          <div class="texts">
                            <p class="text">
                              <img src="./img/ico-building.svg" alt="">
                              <?php echo htmlspecialchars(($store['prefectureName'] ?? '') . ($store['town'] ?? '') . ($store['address'] ?? '')); ?>
                            </p>
                            <p class="text">
                              <img src="./img/ico-train.svg" alt="">
                              <?php echo htmlspecialchars($store['accses'] ?? ''); ?>
                            </p>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>

</html>