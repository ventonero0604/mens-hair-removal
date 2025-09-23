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
  foreach ($areas as $area) {
    if ($area['id'] == $targetAreaId) {
      $areaData = $area;
      break;
    }
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

    // ピックアップ店舗データを取得（item01ClinicNameをキーにしてstores.jsonから検索）
    if (!empty($stores) && !empty($areaData['item01ClinicName'])) {
      foreach ($stores as $store) {
        if ($store['clinicName'] === $areaData['item01ClinicName']) {
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
  'rate' => '4.5',
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
function generateMachineLabels($flagMachine)
{
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
    }
  }

  return implode("\n", $labels);
}

// 使いやすいように個別変数を設定
// compare用変数（compare[0], compare[1], compare[2]）
$compare1 = isset($productData['compare'][0]) ? array_merge($defaults, $productData['compare'][0]) : $defaults;
$compare2 = isset($productData['compare'][1]) ? array_merge($defaults, $productData['compare'][1]) : $defaults;
$compare3 = isset($productData['compare'][2]) ? array_merge($defaults, $productData['compare'][2]) : $defaults;
