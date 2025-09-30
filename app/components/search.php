      <div class="Search">
        <div class="header">
          <img src="./img/ico-search.svg" alt="">
          <h3 class="title">
            あなたに合ったクリニックを検索
          </h3>
        </div>
        <div class="body">
          <?php
          $formId = isset($searchFormId) ? $searchFormId : 'searchForm';
          ?>
          <form id="<?php echo $formId; ?>" action="result.php" method="GET" class="Search_form">
            <!-- areaパラメータを引き継ぎ -->
            <?php if (isset($_GET['area']) && !empty($_GET['area'])): ?>
              <input type="hidden" name="area" value="<?php echo htmlspecialchars($_GET['area']); ?>">
            <?php endif; ?>
            <input type="hidden" name="search" value="1">

            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagArea" class="Search_select">
                  <option value="00">お住まいの地域</option>
                  <option value="01">北海道</option>
                  <option value="02">青森県</option>
                  <option value="03">岩手県</option>
                  <option value="04">宮城県</option>
                  <option value="05">秋田県</option>
                  <option value="06">山形県</option>
                  <option value="07">福島県</option>
                  <option value="08">茨城県</option>
                  <option value="09">栃木県</option>
                  <option value="10">群馬県</option>
                  <option value="11">埼玉県</option>
                  <option value="12">千葉県</option>
                  <option value="13">東京都</option>
                  <option value="14">神奈川県</option>
                  <option value="15">新潟県</option>
                  <option value="16">富山県</option>
                  <option value="17">石川県</option>
                  <option value="18">福井県</option>
                  <option value="19">山梨県</option>
                  <option value="20">長野県</option>
                  <option value="21">岐阜県</option>
                  <option value="22">静岡県</option>
                  <option value="23">愛知県</option>
                  <option value="24">三重県</option>
                  <option value="25">滋賀県</option>
                  <option value="26">京都府</option>
                  <option value="27">大阪府</option>
                  <option value="28">兵庫県</option>
                  <option value="29">奈良県</option>
                  <option value="30">和歌山県</option>
                  <option value="31">鳥取県</option>
                  <option value="32">島根県</option>
                  <option value="33">岡山県</option>
                  <option value="34">広島県</option>
                  <option value="35">山口県</option>
                  <option value="36">徳島県</option>
                  <option value="37">香川県</option>
                  <option value="38">愛媛県</option>
                  <option value="39">高知県</option>
                  <option value="40">福岡県</option>
                  <option value="41">佐賀県</option>
                  <option value="42">長崎県</option>
                  <option value="43">熊本県</option>
                  <option value="44">大分県</option>
                  <option value="45">宮崎県</option>
                  <option value="46">鹿児島県</option>
                  <option value="47">沖縄県</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagMenu" class="Search_select">
                  <option value="00">検討している施術</option>
                  <option value="01">ヒゲ脱毛</option>
                  <option value="02">全身脱毛</option>
                  <option value="03">足脱毛</option>
                  <option value="04">腕脱毛</option>
                  <option value="05">足腕セット脱毛</option>
                  <option value="06">VIO脱毛</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagClinicType" class="Search_select">
                  <option value="00">クリニックの種類</option>
                  <option value="01">医療脱毛</option>
                  <option value="02">サロン脱毛</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="flagMachineType" class="Search_select">
                  <option value="00">脱毛機器の種類</option>
                  <option value="01">蓄熱式（痛み=強い、脱毛実感=早い）</option>
                  <option value="02">熱破壊式（痛み=弱め、脱毛実感=遅い）</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
          </form>
          <button type="submit" form="<?php echo $formId; ?>" class="Button -submit -medium w-full mt-5">検索する</button>
        </div>
      </div>