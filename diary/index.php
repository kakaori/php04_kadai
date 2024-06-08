<?php $title = 'GEEK日記登録｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>
<?php
// LOGINチェック
$locationPage = "/gs_php/php04/kadai/login/";
if (!sschk()) {
    // ログインしていない場合の処理
    header("Location: $locationPage");
    exit;
}

//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
  '日','月','火','水','木','金','土',//0~6
];
$weekdate = date('w');
?>
<?php $date = date('Y年m月d日'); ?>
<div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold md:mb-6 lg:text-3xl">LAB17 GEEK日記</h2>
      <p class="mx-auto max-w-screen-md text-center text-sky-500 md:text-lg">今日も頑張ったね！今日のあなたを記録しよう。</p>
      <p class="text-center text-xs text-gray-500"><?php echo $date ?>（<?php echo $week[$weekdate] ?>）</p>
    </div>
    <!-- text - end -->

    <!-- form - start -->
    <form action="/gs_php/php04/kadai/diary/insert/" method="post" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">

      <!-- ニックネーム --><!-- 課題：ログインした名前にする -->
      <div class="sm:col-span-2">
          <label for="name" class="mb-2 inline-block text-sm sm:text-base">ニックネーム</label>
          <input name="name" value="<?= h($_SESSION['name'])?>" class="w-full rounded border px-3 py-3 outline-none" disabled />
          <input name="name" type="hidden" value="<?= h($_SESSION['name'])?>">
      </div>

      <!-- クレド -->
      <div class="sm:col-span-2">
        <label for="credo" class="mb-2 inline-block text-sm sm:text-base">CREDOに則り、自らのチカラでセカイを変えようとする全ての挑戦を讃えましたか？</label>
          <div class="flex justify-between grid gap-x-2 gap-y-4 grid-cols-3 md:gap-x-8">
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="credo" value="讃えた" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>讃えた</label>
            </div>
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="credo" value="はい" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>はい</label>
            </div>
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="credo" value="Yes" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>Yes</label>
            </div>
          </div>
      </div>

      <!-- コミュニティ -->
      <div class="sm:col-span-2">
        <label for="community" class="mb-2 inline-block text-sm sm:text-base">コミュニティの活性化に自ら貢献しましたか？</label>
          <div class="flex justify-between grid gap-x-2 gap-y-4 grid-cols-3 md:gap-x-8">
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="community" value="貢献した" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>貢献した</label>
            </div>
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="community" value="はい" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>はい</label>
            </div>
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="community" value="Yes" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>Yes</label>
            </div>
          </div>
      </div>

      <!-- 改善 -->
      <div class="sm:col-span-2">
        <label for="improvement" class="mb-2 inline-block text-sm sm:text-base">昨日のあなたより、今日のあなたができるようになったことはなんですか？</label>
        <textarea name="improvement" class="w-full rounded border bg-sky-50 px-3 py-2 outline-none ring-sky-300 transition duration-100 focus:ring" required></textarea>
      </div>
  
      <!-- ありがとう -->
      <div class="sm:col-span-2">
        <label for="thanks" class="mb-2 inline-block text-sm sm:text-base">周りの人に感謝することや、良かった点を教えてください。</label>
        <textarea name="thanks" class="w-full rounded border bg-sky-50 px-3 py-2 outline-none ring-sky-300 transition duration-100 focus:ring" required></textarea>
      </div>

      <!-- 取り組み -->
      <div class="sm:col-span-2">
        <label for="message" class="mb-2 inline-block text-sm sm:text-base">明日の目標はなんですか？</label>
        <textarea name="message" class="w-full rounded border bg-sky-50 px-3 py-2 outline-none ring-sky-300 transition duration-100 focus:ring" required></textarea>
      </div>

      <!-- コスモ -->
      <div class="sm:col-span-2">
        <label for="cosmos" class="mb-2 inline-block text-sm sm:text-base">コスモは燃えていますか？</label>
          <div class="flex justify-between grid gap-x-2 gap-y-4 grid-cols-3 md:gap-x-8">
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="cosmos" value="燃えている" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>燃えている</label>
            </div>
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="cosmos" value="はい" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>はい</label>
            </div>
            <div>
              <label class="ring-gray-200 has-[:checked]:ring-sky-500 has-[:checked]:bg-sky-50 grid grid-cols-[5px_1fr_auto] items-center text-center gap-2 rounded-lg p-4 ring-2 hover:bg-sky-50 cursor-pointer mb-2 md:gap-6 md:text-left"><input type="radio" name="cosmos" value="Yes" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] ring-1 ring-sky-950/10 checked:border-sky-500 checked:ring-sky-500" required>Yes</label>
            </div>
          </div>
      </div>

      <div class="text-center items-center justify-between mt-4 sm:col-span-2">
        <input name="userid" type="hidden" value="<?= h($_SESSION['id'])?>"/>
        <button class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">送信する</button>
      </div>

    </form>
    <!-- form - end -->

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>