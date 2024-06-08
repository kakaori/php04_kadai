<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/func/function.php');

$loggedIn = sschk();
$isAdmin = $loggedIn && isAdmin();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="icon" href="/gs_php/php04/kadai/img/favicon.ico">
    <link rel="stylesheet" href="/gs_php/php04/kadai/css/output.css">
    <title><?php echo $title; ?></title>
</head>
<body class="bg-white text-gray-600">

<div class="mx-auto max-w-screen-md pb-6 sm:pb-8 lg:pb-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

    <header class="flex items-center justify-between py-4 md:py-8">
      <!-- logo - start -->
      <a href="/gs_php/php04/kadai/" class="items-center gap-2.5 text-2xl font-bold md:text-3xl" aria-label="logo">
        <img class="w-48" src="https://gsacademy.jp/assets/images/header/logo.svg">
      </a>
      <!-- logo - end -->

      <?php if ($loggedIn): ?>
          <!-- nav - start -->
          <nav class="gap-12 flex items-center">
              <a href="/gs_php/php04/kadai/diary/" class="hidden font-semibold text-gray-600 transition duration-100 hover:text-sky-500 active:text-sky-700 md:inline-block">日記を書く</a>
              <a href="/gs_php/php04/kadai/diary/list/" class="py-2 px-5 bg-sky-500 text-white font-semibold rounded-full shadow-md hover:bg-sky-700 focus:outline-none focus:ring focus:ring-sky-400 focus:ring-opacity-75">みんなの日記</a>
          </nav>
          <!-- nav - end -->
      <?php else: ?>
          <!-- nav - start -->
          <nav class="gap-12 flex items-center">
              <a href="/gs_php/php04/kadai/login/" class="py-2 px-5 bg-sky-500 text-white font-semibold rounded-full shadow-md hover:bg-sky-700 focus:outline-none focus:ring focus:ring-sky-400 focus:ring-opacity-75">ログイン</a>
          </nav>
          <!-- nav - end -->
      <?php endif; ?>
    </header>

    <?php if ($loggedIn): ?>
        <p class="text-sm text-right">ようこそ、<a href="/gs_php/php04/kadai/mypage/" class="text-sky-500 transition duration-100 hover:text-sky-700 active:text-sky-800"><?= h($_SESSION['name'])?></a>さん</p>
    <?php endif; ?>

  </div>
</div>