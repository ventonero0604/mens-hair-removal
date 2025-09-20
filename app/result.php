<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="favicon.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+JP:wght@100..900&display=swap"
    rel="stylesheet">
  <script type="module" crossorigin src="./assets/js/main.js"></script>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <section class="ColumnLeft">
    <div class="ColumnLeft_header">
      <a href="/" class="logo">
        <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
      </a>
      <p class="area">
        北海道版
      </p>
    </div>
  
    <div class="Search">
      <div class="header">
        <img src="./img/ico-search.svg" alt="">
        <h3 class="title">
          あなたに合ったクリニックを検索
        </h3>
      </div>
      <div class="body">
        <form action="" class="Search_form">
          <div class="Search_form_group">
            <div class="Search_select_wrapper">
              <select name="region" class="Search_select">
                <option value="">お住まいの地域</option>
                <option value="hokkaido">北海道</option>
                <option value="tohoku">東北</option>
                <option value="kanto">関東</option>
                <option value="chubu">中部</option>
                <option value="kansai">関西</option>
                <option value="chugoku">中国</option>
                <option value="shikoku">四国</option>
                <option value="kyushu">九州</option>
              </select>
              <span class="Search_select_arrow"></span>
            </div>
          </div>
          <div class="Search_form_group">
            <div class="Search_select_wrapper">
              <select name="region" class="Search_select">
                <option value="">検討している施術</option>
                <option value="hokkaido">北海道</option>
                <option value="tohoku">東北</option>
                <option value="kanto">関東</option>
                <option value="chubu">中部</option>
                <option value="kansai">関西</option>
                <option value="chugoku">中国</option>
                <option value="shikoku">四国</option>
                <option value="kyushu">九州</option>
              </select>
              <span class="Search_select_arrow"></span>
            </div>
          </div>
          <div class="Search_form_group">
            <div class="Search_select_wrapper">
              <select name="region" class="Search_select">
                <option value="">お支払い方法</option>
                <option value="hokkaido">北海道</option>
                <option value="tohoku">東北</option>
                <option value="kanto">関東</option>
                <option value="chubu">中部</option>
                <option value="kansai">関西</option>
                <option value="chugoku">中国</option>
                <option value="shikoku">四国</option>
                <option value="kyushu">九州</option>
              </select>
              <span class="Search_select_arrow"></span>
            </div>
          </div>
          <div class="Search_form_group">
            <div class="Search_select_wrapper">
              <select name="region" class="Search_select">
                <option value="">重視するポイント</option>
                <option value="hokkaido">北海道</option>
                <option value="tohoku">東北</option>
                <option value="kanto">関東</option>
                <option value="chubu">中部</option>
                <option value="kansai">関西</option>
                <option value="chugoku">中国</option>
                <option value="shikoku">四国</option>
                <option value="kyushu">九州</option>
              </select>
              <span class="Search_select_arrow"></span>
            </div>
          </div>
        </form>
        <button type="submit" class="Button -submit -medium w-full mt-3">検索する</button>
      </div>
    </div></section>
  <header class="Header">
    <a href="/" class="logo">
      <img src="./img/logo.svg" alt="MYメンズ脱毛ガイド">
    </a>
    <p class="area">
      北海道版
    </p>
  </header>
  <main class="Result">
    <div class="status">
      <div class="Search">
        <p class="condition">
          設定条件
        </p>
        <div class="body">
          <form action="" class="Search_form">
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <p class="font-bold mb-1">お住まいの地域</p>
                <select name="region" class="Search_select">
                  <option value="">設定なし</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <p class="font-bold mb-1">検討している施術</p>
                <select name="region" class="Search_select">
                  <option value="">設定なし</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <p class="font-bold mb-1">お支払い方法</p>
                <select name="region" class="Search_select">
                  <option value="">設定なし</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <p class="font-bold mb-1">重視するポイント</p>
                <select name="region" class="Search_select">
                  <option value="">設定なし</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
          </form>
          <button type="submit" class="Button -submit -medium w-full mt-5">検索条件を変更</button>
          <button class="reset">検索条件をリセット</button>
        </div>
      </div>
    </div>


    <section class="content">

      <ul class="list">
        <li class="item">
          <div class="info">
            <a href="#" class="logo">
              <img src="./img/logo/regina.png" alt="">
            </a>
            <table>
              <tbody>
                <tr>
                  <th>店舗</th>
                  <td>
                    <span class="red font-bold">全国26院</span>
                  </td>
                </tr>
                <tr>
                  <th>脱毛器</th>
                  <td>
                    <div class="labels">
                      <p class="label -red">
                        熱破壊式
                      </p>
                      <p class="label -orange">
                        蓄熱式
                      </p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>ひげ脱毛</th>
                  <td>
                    <p>
                      <span class="font-bold">9,900</span><span class="text-sm">円/3回</span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <th>全身脱毛</th>
                  <td>
                    <p>
                      <span class="font-bold">258,000</span><span class="text-sm">円/3回</span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="description">
            <img src="./img/img-compare-person.png" alt="">
            <p class="font-bold">
              人気のジェントルマックスプロを最安値で提供！高いコスパと効果が売りです！
            </p>
          </div>
          <div class="ButtonUnit -full">
            <p class="tooltip -inside"><em>最安値</em>のネット予約</p>
            <a href="#" class="Button -primary -large">公式サイトはコチラ</a>
          </div>
          <div class="small">
            <small>※注釈1が入ります</small>
            <small>※注釈2が入ります</small>
          </div>
        </li>
        <li class="item">
          <div class="info">
            <a href="#" class="logo">
              <img src="./img/logo/regina.png" alt="">
            </a>
            <table>
              <tbody>
                <tr>
                  <th>店舗</th>
                  <td>
                    <span class="red font-bold">全国26院</span>
                  </td>
                </tr>
                <tr>
                  <th>脱毛器</th>
                  <td>
                    <div class="labels">
                      <p class="label -red">
                        熱破壊式
                      </p>
                      <p class="label -orange">
                        蓄熱式
                      </p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>ひげ脱毛</th>
                  <td>
                    <p>
                      <span class="font-bold">9,900</span><span class="text-sm">円/3回</span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <th>全身脱毛</th>
                  <td>
                    <p>
                      <span class="font-bold">258,000</span><span class="text-sm">円/3回</span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="description">
            <img src="./img/img-compare-person.png" alt="">
            <p class="font-bold">
              人気のジェントルマックスプロを最安値で提供！高いコスパと効果が売りです！
            </p>
          </div>
          <div class="ButtonUnit -full">
            <p class="tooltip -inside"><em>最安値</em>のネット予約</p>
            <a href="#" class="Button -primary -large">公式サイトはコチラ</a>
          </div>
          <div class="small">
            <small>※注釈1が入ります</small>
            <small>※注釈2が入ります</small>
          </div>
        </li>
      </ul>

      <div class="Search">
        <div class="header">
          <img src="./img/ico-search.svg" alt="">
          <h3 class="title">
            あなたに合ったクリニックを検索
          </h3>
        </div>
        <div class="body">
          <form action="" class="Search_form">
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="region" class="Search_select">
                  <option value="">お住まいの地域</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="region" class="Search_select">
                  <option value="">検討している施術</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="region" class="Search_select">
                  <option value="">お支払い方法</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
            <div class="Search_form_group">
              <div class="Search_select_wrapper">
                <select name="region" class="Search_select">
                  <option value="">重視するポイント</option>
                  <option value="hokkaido">北海道</option>
                  <option value="tohoku">東北</option>
                  <option value="kanto">関東</option>
                  <option value="chubu">中部</option>
                  <option value="kansai">関西</option>
                  <option value="chugoku">中国</option>
                  <option value="shikoku">四国</option>
                  <option value="kyushu">九州</option>
                </select>
                <span class="Search_select_arrow"></span>
              </div>
            </div>
          </form>
          <button type="submit" class="Button -submit -medium w-full mt-3">検索する</button>
        </div>
      </div>    </section>
    <footer class="Footer">
      <a href="./privacy.html" class="link">運営者情報・プライバシーポリシー</a>
      <small>
        Copyright© , 2025 All Rights Reserved Myメンズ脱毛ガイド
      </small>
    </footer>  </main>

  <section class="ColumnRight">
    <ul class="list">
      <li>
        <a href="./privacy.html" class="text-lg">全身脱毛クリニック5選</a>
      </li>
      <li>
        <a href="./privacy.html" class="text-lg">ヒゲ脱毛クリニック5選</a>
      </li>
      <li>
        <a href="./privacy.html" class="text-base">運営者情報・プライバシーポリシー</a>
      </li>
    </ul>
  
  </section>
  
</body>

</html>