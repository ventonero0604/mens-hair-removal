import $ from 'jquery';
$('#header').addClass('hoge');

// 星評価システム
function renderStarRating() {
  // 通常の .rate 要素を処理
  const rateElements = $('.rate');

  console.log('Found .rate elements:', rateElements.length);

  rateElements.each(function (index) {
    const $rate = $(this);
    const value = parseFloat($rate.find('.js-value').text().trim());
    const $stars = $rate.find('.stars');

    console.log(`Rate element ${index + 1}: value = ${value}`);

    // 星の要素をクリア
    $stars.empty();

    // 満点の星の数（整数部分）
    const fullStars = Math.floor(value);
    // 小数点部分があるかどうか
    const hasHalfStar = value % 1 !== 0;

    console.log(
      `Rate element ${index + 1}: fullStars = ${fullStars}, hasHalfStar = ${hasHalfStar}`
    );

    // 満点の星を追加
    for (let i = 0; i < fullStars; i++) {
      $stars.append('<img src="./img/ico-star.png" alt="">');
    }

    // 半分の星を追加（小数点部分がある場合）
    if (hasHalfStar) {
      $stars.append('<img src="./img/ico-star-half.png" alt="">');
    }
  });

  // Rank_rate 要素を処理
  const rankRateElements = $('.Rank_rate');

  console.log('Found .Rank_rate elements:', rankRateElements.length);

  rankRateElements.each(function (index) {
    const $rankRate = $(this);
    const value = parseFloat($rankRate.find('.js-value').text().trim());
    const $stars = $rankRate.find('.Rank_rate_stars');

    console.log(`Rank_rate element ${index + 1}: value = ${value}`);

    // 星の要素をクリア
    $stars.empty();

    // 満点の星の数（整数部分）
    const fullStars = Math.floor(value);
    // 小数点部分があるかどうか
    const hasHalfStar = value % 1 !== 0;

    console.log(
      `Rank_rate element ${index + 1}: fullStars = ${fullStars}, hasHalfStar = ${hasHalfStar}`
    );

    // 満点の星を追加
    for (let i = 0; i < fullStars; i++) {
      $stars.append('<img src="./img/ico-star.png" alt="">');
    }

    // 半分の星を追加（小数点部分がある場合）
    if (hasHalfStar) {
      $stars.append('<img src="./img/ico-star-half.png" alt="">');
    }
  });
}

// モーダル機能
function initModal() {
  // 「全国26院」リンクがクリックされたときの処理
  const clinicLinks = $('.js-modal');

  clinicLinks.on('click', function (e) {
    e.preventDefault(); // デフォルトのリンク動作を防ぐ
    $('.Modal').fadeIn(300); // モーダルを表示
    $('body').addClass('modal-open'); // bodyにクラスを追加してスクロールを無効化
  });

  // モーダルの閉じるボタンがクリックされたときの処理
  $('.Modal .close').on('click', function (e) {
    e.preventDefault();
    $('.Modal').fadeOut(300); // モーダルを非表示
    $('body').removeClass('modal-open'); // bodyからクラスを削除してスクロールを有効化
  });

  // モーダルの背景がクリックされたときの処理
  $('.Modal').on('click', function (e) {
    if (e.target === this) {
      $('.Modal').fadeOut(300);
      $('body').removeClass('modal-open');
    }
  });

  // ESCキーでモーダルを閉じる
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape' && $('.Modal').is(':visible')) {
      $('.Modal').fadeOut(300);
      $('body').removeClass('modal-open');
    }
  });
}

// DOMが読み込まれた後に実行
$(document).ready(function () {
  renderStarRating();
  initModal();
});
