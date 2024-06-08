<?php
// HTTPレスポンスヘッダに403ステータスコードを設定
http_response_code(403);
?>

<div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">アクセスできません</h2>
      <p class="mb-4 text-center text-xl md:mb-6 lg:text-xl">他の人の日記は編集できません。</p>
    </div>
    <!-- text - end -->
    
    <div class="text-center">
        <a href="javascript:history.back()" class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">戻る</a>
    </div>  
    
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>