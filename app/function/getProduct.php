<?php
// パラメータからareaIDとstoreIDを取得
$areaId = isset($_GET['area']) ? (int)$_GET['area'] : null;
$storeId = isset($_GET['store']) ? (int)$_GET['store'] : null;
$areaData = null;
$productData = [];
$storeData = null;
$pickupStoreData = null;
$groupedStores = [];

// 現在の月を取得
$currentMonth = (int)date('n'); // 1-12の月を取得

// stores.jsonを読み込み（常に読み込む）
$storesJsonPath = './data/stores.json';
$stores = [];
if (file_exists($storesJsonPath)) {
  $storesContent = file_get_contents($storesJsonPath);
  $stores = json_decode($storesContent, true);
}

// storeIDが指定されている場合、指定されたIDの店舗を検索
if ($storeId && !empty($stores)) {
  foreach ($stores as $store) {
    if ($store['id'] == $storeId) {
      $storeData = $store;
      break;
    }
  }
}

// area.jsonとproduct.jsonからデータを取得
// areaIDが指定されていない場合はid=0（全国）を使用
$targetAreaId = $areaId ? $areaId : 0;

$areaJsonPath = './data/area.json';
$productJsonPath = './data/product.json';

if (file_exists($areaJsonPath) && file_exists($productJsonPath)) {
  // area.jsonを読み込み
  $areaContent = file_get_contents($areaJsonPath);
  $areas = json_decode($areaContent, true);

  // product.jsonを読み込み
  $productContent = file_get_contents($productJsonPath);
  $products = json_decode($productContent, true);

  // 指定されたIDのエリアを検索（areaIDがない場合はid=0）
  $fallbackData = null; // id=0（全国版）のデータを保存用

  foreach ($areas as $area) {
    if ($area['id'] == $targetAreaId) {
      $areaData = $area;
      break;
    }
    // id=0のデータを保存（フォールバック用）
    if ($area['id'] == 0) {
      $fallbackData = $area;
    }
  }

  // 該当データが見つからない場合は全国版（id=0）を使用
  if (!$areaData && $fallbackData) {
    $areaData = $fallbackData;
  }

  // エリアデータが見つかった場合、各サービス名に対応するプロダクトデータを取得
  if ($areaData) {
    // compare, selection, feature用のプロダクトデータを格納
    $productData['compare'] = [];
    $productData['selection'] = [];
    $productData['feature'] = [];

    // compareデータ: item01~03ServiceName
    $compareServices = [
      $areaData['item01ServiceName'],
      $areaData['item02ServiceName'],
      $areaData['item03ServiceName']
    ];

    // selectionデータ: item01~02ServiceName
    $selectionServices = [
      $areaData['item01ServiceName'],
      $areaData['item02ServiceName']
    ];

    // featureデータ: item01ServiceName
    $featureServices = [
      $areaData['item01ServiceName']
    ];

    $areaClinicNames = [
      $areaData['item01ClinicName'],
      $areaData['item02ClinicName'],
      $areaData['item03ClinicName']
    ];

    // compareデータを取得
    foreach ($compareServices as $index => $serviceName) {
      foreach ($products as $product) {
        if ($product['service'] === $serviceName) {
          $areaProduct = $product;
          $areaProduct['areaNameJp'] = $areaData['areaNameJp'];
          $areaProduct['clinicName'] = $areaClinicNames[$index];
          $productData['compare'][] = $areaProduct;
          break;
        }
      }
    }

    // selectionデータを取得
    foreach ($selectionServices as $index => $serviceName) {
      foreach ($products as $product) {
        if ($product['service'] === $serviceName) {
          $areaProduct = $product;
          $areaProduct['areaNameJp'] = $areaData['areaNameJp'];
          $areaProduct['clinicName'] = $areaClinicNames[$index];
          $productData['selection'][] = $areaProduct;
          break;
        }
      }
    }

    // featureデータを取得
    foreach ($featureServices as $index => $serviceName) {
      foreach ($products as $product) {
        if ($product['service'] === $serviceName) {
          $areaProduct = $product;
          $areaProduct['areaNameJp'] = $areaData['areaNameJp'];
          $areaProduct['clinicName'] = $areaClinicNames[$index];
          $productData['feature'][] = $areaProduct;
          break;
        }
      }
    }

    // ピックアップ店舗データを取得（item01ClinicNameとitem01ServiceNameをキーにしてstores.jsonから検索）
    if (!empty($stores) && !empty($areaData['item01ClinicName']) && !empty($areaData['item01ServiceName'])) {
      foreach ($stores as $store) {
        if (
          $store['clinicName'] === $areaData['item01ClinicName'] &&
          $store['service'] === $areaData['item01ServiceName']
        ) {
          $pickupStoreData = $store;
          break;
        }
      }
    }
  }
}

// groupedStoresを作成（stores.jsonの全データをregionNameでグルーピング）
// areaIDの有無に関わらず常に実行
if (!empty($stores)) {
  foreach ($stores as $store) {
    $regionName = $store['regionName'];
    if (!isset($groupedStores[$regionName])) {
      $groupedStores[$regionName] = [];
    }
    $groupedStores[$regionName][] = $store;
  }
}

// サービス別にフィルタリングされたgroupedStoresを作成する関数
function getFilteredStoresByService($stores, $serviceName)
{
  $filteredGroupedStores = [];
  if (!empty($stores) && !empty($serviceName)) {
    foreach ($stores as $store) {
      // サービス名が一致する店舗のみを対象とする
      if ($store['service'] === $serviceName) {
        $regionName = $store['regionName'];
        if (!isset($filteredGroupedStores[$regionName])) {
          $filteredGroupedStores[$regionName] = [];
        }
        $filteredGroupedStores[$regionName][] = $store;
      }
    }
  }
  return $filteredGroupedStores;
}

// 特定のサービスのピックアップ店舗を取得する関数
function getPickupStoreByService($stores, $serviceName, $clinicName)
{
  if (!empty($stores) && !empty($serviceName) && !empty($clinicName)) {
    foreach ($stores as $store) {
      if ($store['service'] === $serviceName && $store['clinicName'] === $clinicName) {
        return $store;
      }
    }
  }
  return null;
}

// ランキング順位に応じたrate値を定義
$rankingRates = [
  1 => '3.0', // 1位のrate
  2 => '3.0', // 2位のrate
  3 => '3.0'  // 3位のrate
];

// デフォルト値の設定（空文字ベース）
$defaults = [
  'service' => '',
  'imageLogo' => '',
  'rankingCopy' => '',
  'pickupCopy' => '',
  'plan01Title' => '',
  'plan01TotalPrice' => '',
  'plan01OncePrice' => '',
  'plan01Icon' => '',
  'machine01Name' => '',
  'machine01Type' => '',
  'machine01Pain' => '',
  'machine01Feature' => '',
  'machine01Image' => '',
  'linkUrlLp' => '#',
  'linkUrlForm' => '#',
  'numOfClinic' => '',
  'care' => '',
  'rate' => '4.5', // デフォルト値
  'planBodyTotalPrice' => '',
  'strAnchor' => '',
  'flagCompareHige' => 0,
  'flagCompareBody' => 0,
  'flagCompareMachine' => 0,
  'flagCompareCare' => 0,
  'flagCompareNumOfClinic' => 0,
  'flagMachine' => '',
  // エリア用のフィールド
  'areaNameJp' => '',
  'clinicName' => ''
];

// フラグをアイコンに変換する関数
function flagToIcon($flag)
{
  switch ((int)$flag) {
    case 3:
      return './img/ico-circle-double.svg';
    case 2:
      return './img/ico-circle.svg';
    case 1:
      return './img/ico-triangle.svg';
    case 0:
      return './img/ico-line.svg';
    default:
      return './img/ico-line.svg';
  }
}

// flagMachineを解析してラベルHTMLを生成する関数
function generateMachineLabels($product)
{
  $flagMachine = $product['flagMachine'] ?? '';

  if (empty($flagMachine)) {
    return '';
  }

  // カンマで分割
  $flags = explode(',', $flagMachine);
  $labels = [];

  foreach ($flags as $flag) {
    $flag = trim($flag);
    switch ($flag) {
      case '01':
        $labels[] = '<p class="label -red">熱破壊式</p>';
        break;
      case '02':
        $labels[] = '<p class="label -orange">蓄熱式</p>';
        break;
      case '03':
        $labels[] = '<p class="label -blue">光脱毛</p>';
        break;
    }
  }

  return implode("\n", $labels);
}

// 使いやすいように個別変数を設定
// compare用変数（compare[0], compare[1], compare[2]）
$compare1 = isset($productData['compare'][0]) ? array_merge($defaults, $productData['compare'][0]) : $defaults;
$compare2 = isset($productData['compare'][1]) ? array_merge($defaults, $productData['compare'][1]) : $defaults;
$compare3 = isset($productData['compare'][2]) ? array_merge($defaults, $productData['compare'][2]) : $defaults;

// ランキング順位に応じたrate値を設定
$compare1['rate'] = $rankingRates[1]; // 1位
$compare2['rate'] = $rankingRates[2]; // 2位
$compare3['rate'] = $rankingRates[3]; // 3位

// 地域名からエリア名を取得する関数
function getAreaNameFromRegion($regionName)
{
  $areaMapping = [
    // 北海道・東北
    '北海道' => '北海道・東北',
    '青森県' => '北海道・東北',
    '岩手県' => '北海道・東北',
    '宮城県' => '北海道・東北',
    '秋田県' => '北海道・東北',
    '山形県' => '北海道・東北',
    '福島県' => '北海道・東北',

    // 関東
    '茨城県' => '関東',
    '栃木県' => '関東',
    '群馬県' => '関東',
    '埼玉県' => '関東',
    '千葉県' => '関東',
    '東京都' => '関東',
    '神奈川県' => '関東',

    // 中部
    '新潟県' => '中部',
    '富山県' => '中部',
    '石川県' => '中部',
    '福井県' => '中部',
    '山梨県' => '中部',
    '長野県' => '中部',
    '岐阜県' => '中部',
    '静岡県' => '中部',
    '愛知県' => '中部',

    // 関西
    '三重県' => '関西',
    '滋賀県' => '関西',
    '京都府' => '関西',
    '大阪府' => '関西',
    '兵庫県' => '関西',
    '奈良県' => '関西',
    '和歌山県' => '関西',

    // 中国・四国
    '鳥取県' => '中国・四国',
    '島根県' => '中国・四国',
    '岡山県' => '中国・四国',
    '広島県' => '中国・四国',
    '山口県' => '中国・四国',
    '徳島県' => '中国・四国',
    '香川県' => '中国・四国',
    '愛媛県' => '中国・四国',
    '高知県' => '中国・四国',

    // 九州・沖縄
    '福岡県' => '九州・沖縄',
    '佐賀県' => '九州・沖縄',
    '長崎県' => '九州・沖縄',
    '熊本県' => '九州・沖縄',
    '大分県' => '九州・沖縄',
    '宮崎県' => '九州・沖縄',
    '鹿児島県' => '九州・沖縄',
    '沖縄県' => '九州・沖縄',
  ];

  return isset($areaMapping[$regionName]) ? $areaMapping[$regionName] : 'その他';
}

// 店舗データをエリア別にグループ化する関数
function groupStoresByArea($stores)
{
  $areaGroups = [];

  foreach ($stores as $regionName => $storeList) {
    $areaName = getAreaNameFromRegion($regionName);

    if (!isset($areaGroups[$areaName])) {
      $areaGroups[$areaName] = [];
    }

    $areaGroups[$areaName][$regionName] = $storeList;
  }

  return $areaGroups;
}

// 各サービス別のモーダル用店舗データを準備（エリア別にグループ化）
$modalStoresByService = [];
if (!empty($stores)) {
  $services = [$compare1['service'], $compare2['service'], $compare3['service']];
  foreach ($services as $service) {
    if (!empty($service)) {
      $serviceStores = getFilteredStoresByService($stores, $service);
      $modalStoresByService[$service] = groupStoresByArea($serviceStores);
    }
  }
}

// 検索機能
function searchProducts($products, $searchParams)
{
  $results = [];

  foreach ($products as $product) {
    $match = true;

    // エリア検索（flagArea）- "00"は全地域を意味するのでスキップ
    if (!empty($searchParams['flagArea']) && $searchParams['flagArea'] !== '00') {
      $productAreas = !empty($product['flagArea']) ? explode(',', $product['flagArea']) : [];
      if (!in_array($searchParams['flagArea'], $productAreas)) {
        $match = false;
      }
    }

    // メニュー検索（flagMenu）- "00"は全メニューを意味するのでスキップ
    if (!empty($searchParams['flagMenu']) && $searchParams['flagMenu'] !== '00' && $match) {
      $productMenus = !empty($product['flagMenu']) ? explode(',', $product['flagMenu']) : [];
      if (!in_array($searchParams['flagMenu'], $productMenus)) {
        $match = false;
      }
    }

    // クリニックタイプ検索（flagClinicType）- "00"は全タイプを意味するのでスキップ
    if (!empty($searchParams['flagClinicType']) && $searchParams['flagClinicType'] !== '00' && $match) {
      $productClinicTypes = !empty($product['flagClinicType']) ? explode(',', $product['flagClinicType']) : [];
      if (!in_array($searchParams['flagClinicType'], $productClinicTypes)) {
        $match = false;
      }
    }

    // 脱毛機器タイプ検索（flagMachineType）- "00"は全タイプを意味するのでスキップ
    if (!empty($searchParams['flagMachineType']) && $searchParams['flagMachineType'] !== '00' && $match) {
      $productMachineTypes = !empty($product['flagMachineType']) ? explode(',', $product['flagMachineType']) : [];
      if (!in_array($searchParams['flagMachineType'], $productMachineTypes)) {
        $match = false;
      }
    }

    if ($match) {
      $results[] = $product;
    }
  }

  return $results;
}

// 検索結果を取得
$searchResults = [];
if (isset($_GET['search']) && $_GET['search'] == '1') {
  $searchParams = [
    'flagArea' => $_GET['flagArea'] ?? '',
    'flagMenu' => $_GET['flagMenu'] ?? '',
    'flagClinicType' => $_GET['flagClinicType'] ?? '',
    'flagMachineType' => $_GET['flagMachineType'] ?? ''
  ];

  $searchResults = searchProducts($products, $searchParams);
}
