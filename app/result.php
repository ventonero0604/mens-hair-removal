<?php include './function/getProduct.php'; ?>

<?php include './components/head.php'; ?>

<body>
  <section class="ColumnLeft">
    <div class="ColumnLeft_header">
      <a href="/" class="logo">
        <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
      </a>
      <p class="area">
        <?php echo isset($_GET['area']) && $_GET['area'] != 0 ? htmlspecialchars($compare1['areaNameJp']) . '版' : $currentMonth . '月最新版'; ?>
      </p>
    </div>

    <?php include './components/search.php'; ?>
  </section>
  <header class="Header">
    <a href="/" class="logo">
      <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
    </a>
    <p class="area">
      <?php echo isset($_GET['area']) && $_GET['area'] != 0 ? htmlspecialchars($compare1['areaNameJp']) . '版' : $currentMonth . '月最新版'; ?>
    </p>
  </header>
  <main class="Result">
    <div class="status">
      <div class="Search">
        <p class="condition">
          設定条件
        </p>
        <div class="body">
          <form id="resultSearchForm" action="result.php" method="GET" class="Search_form">
            <!-- areaパラメータを引き継ぎ -->
            <?php if (isset($_GET['area']) && !empty($_GET['area'])): ?>
              <input type="hidden" name="area" value="<?php echo htmlspecialchars($_GET['area']); ?>">
            <?php endif; ?>
            <input type="hidden" name="search" value="1">

            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagArea" class="Search_select">
                  <option value="00">お住まいの地域</option>
                  <option value="01" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '01') ? 'selected' : ''; ?>>北海道</option>
                  <option value="02" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '02') ? 'selected' : ''; ?>>青森県</option>
                  <option value="03" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '03') ? 'selected' : ''; ?>>岩手県</option>
                  <option value="04" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '04') ? 'selected' : ''; ?>>宮城県</option>
                  <option value="05" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '05') ? 'selected' : ''; ?>>秋田県</option>
                  <option value="06" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '06') ? 'selected' : ''; ?>>山形県</option>
                  <option value="07" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '07') ? 'selected' : ''; ?>>福島県</option>
                  <option value="08" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '08') ? 'selected' : ''; ?>>茨城県</option>
                  <option value="09" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '09') ? 'selected' : ''; ?>>栃木県</option>
                  <option value="10" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '10') ? 'selected' : ''; ?>>群馬県</option>
                  <option value="11" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '11') ? 'selected' : ''; ?>>埼玉県</option>
                  <option value="12" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '12') ? 'selected' : ''; ?>>千葉県</option>
                  <option value="13" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '13') ? 'selected' : ''; ?>>東京都</option>
                  <option value="14" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '14') ? 'selected' : ''; ?>>神奈川県</option>
                  <option value="15" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '15') ? 'selected' : ''; ?>>新潟県</option>
                  <option value="16" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '16') ? 'selected' : ''; ?>>富山県</option>
                  <option value="17" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '17') ? 'selected' : ''; ?>>石川県</option>
                  <option value="18" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '18') ? 'selected' : ''; ?>>福井県</option>
                  <option value="19" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '19') ? 'selected' : ''; ?>>山梨県</option>
                  <option value="20" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '20') ? 'selected' : ''; ?>>長野県</option>
                  <option value="21" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '21') ? 'selected' : ''; ?>>岐阜県</option>
                  <option value="22" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '22') ? 'selected' : ''; ?>>静岡県</option>
                  <option value="23" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '23') ? 'selected' : ''; ?>>愛知県</option>
                  <option value="24" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '24') ? 'selected' : ''; ?>>三重県</option>
                  <option value="25" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '25') ? 'selected' : ''; ?>>滋賀県</option>
                  <option value="26" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '26') ? 'selected' : ''; ?>>京都府</option>
                  <option value="27" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '27') ? 'selected' : ''; ?>>大阪府</option>
                  <option value="28" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '28') ? 'selected' : ''; ?>>兵庫県</option>
                  <option value="29" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '29') ? 'selected' : ''; ?>>奈良県</option>
                  <option value="30" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '30') ? 'selected' : ''; ?>>和歌山県</option>
                  <option value="31" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '31') ? 'selected' : ''; ?>>鳥取県</option>
                  <option value="32" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '32') ? 'selected' : ''; ?>>島根県</option>
                  <option value="33" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '33') ? 'selected' : ''; ?>>岡山県</option>
                  <option value="34" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '34') ? 'selected' : ''; ?>>広島県</option>
                  <option value="35" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '35') ? 'selected' : ''; ?>>山口県</option>
                  <option value="36" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '36') ? 'selected' : ''; ?>>徳島県</option>
                  <option value="37" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '37') ? 'selected' : ''; ?>>香川県</option>
                  <option value="38" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '38') ? 'selected' : ''; ?>>愛媛県</option>
                  <option value="39" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '39') ? 'selected' : ''; ?>>高知県</option>
                  <option value="40" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '40') ? 'selected' : ''; ?>>福岡県</option>
                  <option value="41" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '41') ? 'selected' : ''; ?>>佐賀県</option>
                  <option value="42" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '42') ? 'selected' : ''; ?>>長崎県</option>
                  <option value="43" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '43') ? 'selected' : ''; ?>>熊本県</option>
                  <option value="44" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '44') ? 'selected' : ''; ?>>大分県</option>
                  <option value="45" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '45') ? 'selected' : ''; ?>>宮崎県</option>
                  <option value="46" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '46') ? 'selected' : ''; ?>>鹿児島県</option>
                  <option value="47" <?php echo (isset($_GET['flagArea']) && $_GET['flagArea'] == '47') ? 'selected' : ''; ?>>沖縄県</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagMenu" class="Search_select">
                  <option value="00">検討している施術</option>
                  <option value="01" <?php echo (isset($_GET['flagMenu']) && $_GET['flagMenu'] == '01') ? 'selected' : ''; ?>>ヒゲ脱毛</option>
                  <option value="02" <?php echo (isset($_GET['flagMenu']) && $_GET['flagMenu'] == '02') ? 'selected' : ''; ?>>全身脱毛</option>
                  <option value="03" <?php echo (isset($_GET['flagMenu']) && $_GET['flagMenu'] == '03') ? 'selected' : ''; ?>>足脱毛</option>
                  <option value="04" <?php echo (isset($_GET['flagMenu']) && $_GET['flagMenu'] == '04') ? 'selected' : ''; ?>>腕脱毛</option>
                  <option value="05" <?php echo (isset($_GET['flagMenu']) && $_GET['flagMenu'] == '05') ? 'selected' : ''; ?>>足腕セット脱毛</option>
                  <option value="06" <?php echo (isset($_GET['flagMenu']) && $_GET['flagMenu'] == '06') ? 'selected' : ''; ?>>VIO脱毛</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagClinicType" class="Search_select">
                  <option value="00">クリニックの種類</option>
                  <option value="01" <?php echo (isset($_GET['flagClinicType']) && $_GET['flagClinicType'] == '01') ? 'selected' : ''; ?>>医療脱毛</option>
                  <option value="02" <?php echo (isset($_GET['flagClinicType']) && $_GET['flagClinicType'] == '02') ? 'selected' : ''; ?>>サロン脱毛</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagMachineType" class="Search_select">
                  <option value="00">脱毛機器の種類</option>
                  <option value="01" <?php echo (isset($_GET['flagMachineType']) && $_GET['flagMachineType'] == '01') ? 'selected' : ''; ?>>蓄熱式（痛み=強い、脱毛実感=早い）</option>
                  <option value="02" <?php echo (isset($_GET['flagMachineType']) && $_GET['flagMachineType'] == '02') ? 'selected' : ''; ?>>熱破壊式（痛み=弱め、脱毛実感=遅い）</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
          </form>
          <button type="submit" form="resultSearchForm" class="Button -submit -medium w-full mt-3">検索条件を変更</button>
          <a href="result.php<?php echo isset($_GET['area']) ? '?area=' . htmlspecialchars($_GET['area']) : ''; ?>" class="reset">検索条件をリセット</a>
        </div>
      </div>
    </div>


    <section class="content">
      <?php if (isset($_GET['search']) && $_GET['search'] == '1'): ?>
        <?php if (!empty($searchResults)): ?>
          <p class="result-count">検索結果: <?php echo count($searchResults); ?>件のクリニックが見つかりました</p>
        <?php else: ?>
          <p class="result-count">検索条件に一致するクリニックが見つかりませんでした</p>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (isset($_GET['search']) && $_GET['search'] == '1' && !empty($searchResults)): ?>
        <ul class="list">
          <?php foreach ($searchResults as $result): ?>
            <li class="item">
              <div class="info">
                <a href="<?php echo htmlspecialchars($result['linkUrlLp'] ?? '#'); ?>" class="logo">
                  <img src="./img/logo/<?php echo htmlspecialchars($result['imageLogo'] ?? 'regina.png'); ?>" alt="<?php echo htmlspecialchars($result['service'] ?? ''); ?>">
                </a>
                <table>
                  <tbody>
                    <tr>
                      <th>店舗</th>
                      <td>
                        <span class="red font-bold">全国<?php echo htmlspecialchars($result['numOfClinic'] ?? '0'); ?>院</span>
                      </td>
                    </tr>
                    <tr>
                      <th>脱毛器</th>
                      <td>
                        <div class="labels">
                          <?php echo generateMachineLabels($result); ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>ひげ脱毛</th>
                      <td>
                        <p>
                          <?php if (!empty($result['plan01TotalPrice']) && $result['plan01TotalPrice'] !== 'plan01TotalPrice'): ?>
                            <span class="font-bold"><?php echo htmlspecialchars($result['plan01TotalPrice']); ?></span>
                          <?php else: ?>
                            <span class="text-sm">料金はお問い合わせください</span>
                          <?php endif; ?>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <th>全身脱毛</th>
                      <td>
                        <p>
                          <?php if (!empty($result['planBodyTotalPrice']) && $result['planBodyTotalPrice'] !== 'planBodyTotalPrice'): ?>
                            <span class="font-bold"><?php echo htmlspecialchars($result['planBodyTotalPrice']); ?></span>
                          <?php else: ?>
                            <span class="text-sm">料金はお問い合わせください</span>
                          <?php endif; ?>
                        </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="description">
                <img src="./img/img-compare-person.png" alt="">
                <p class="font-bold">
                  <?php echo htmlspecialchars($result['pickupCopy'] ?? $result['service'] ?? ''); ?>
                </p>
              </div>
              <div class="ButtonUnit -full">
                <p class="tooltip -inside"><em>詳細</em>はこちら</p>
                <a href="<?php echo htmlspecialchars($result['linkUrlLp'] ?? '#'); ?>" class="Button -primary -large">公式サイトはコチラ</a>
              </div>
              <div class="small">
                <?php if (!empty($result['noticeCommon']) && $result['noticeCommon'] !== 'noticeCommon'): ?>
                  <small><?php echo htmlspecialchars($result['noticeCommon']); ?></small>
                <?php endif; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php include './components/search.php'; ?>
    </section>
    <footer class="Footer">
      <a href="./privacy.php" class="link">運営者情報・プライバシーポリシー</a>
      <small>
        Copyright© , 2025 All Rights Reserved Myメンズ脱毛ガイド
      </small>
    </footer>
  </main>

  <section class="ColumnRight">
    <ul class="list">
      <li>
        <a href="./privacy.html" class="text-lg">全身脱毛クリニック5選</a>
      </li>
      <li>
        <a href="./privacy.html" class="text-lg">ヒゲ脱毛クリニック5選</a>
      </li>
      <li>
        <a href="./privacy.php" class="text-base">運営者情報・プライバシーポリシー</a>
      </li>
    </ul>

  </section>

</body>

</html>