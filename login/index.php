<?php $title = 'ログイン｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>

<div class="mx-auto max-w-screen-sm px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
    <p class="mb-4 text-center text-xl text-sky-500 md:mb-6 lg:text-xl">LAB17 GEEK日記</p>
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">ログイン</h2>
    </div>
    <!-- text - end -->

    <!-- form - start -->
    <form action="/gs_php/php04/kadai/login/login.php" method="post" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">

      <!-- ニックネーム -->
      <div class="sm:col-span-2">
        <label for="name" class="mb-2 inline-block text-sm sm:text-base">ニックネーム</label>
        <input name="name" type="text" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
      </div>

      <!-- パスワード -->
      <div class="sm:col-span-2">
        <label for="lpw" class="mb-2 inline-block text-sm sm:text-base">パスワード</label>
        <input name="lpw" type="password" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
      </div>

      <div class="text-center items-center justify-between mt-4 sm:col-span-2">
        <button class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">ログインする</button>
      </div>

    </form>
    <!-- form - end -->

    <p class="mt-4 text-sm text-center md:mt-6"><a href="/gs_php/php04/kadai/signup/" class="text-sky-500 transition duration-100 hover:text-sky-700 active:text-sky-800">新規ユーザー登録</a></p>

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>