<?php $title = 'GEEK日記詳細｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>
<?php
// 完了画面に直接アクセスされた場合にリダイレクト
$locationPage = "/gs_php/php04/kadai/login/";
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: $locationPage");
    exit;
}

//1.　POSTデータ取得
$name        = $_POST['name'];
$credo       = $_POST['credo'];
$community   = $_POST['community'];
$improvement = $_POST['improvement'];
$thanks      = $_POST['thanks'];
$message     = $_POST['message'];
$cosmos      = $_POST['cosmos'];
//id分を追加
$id = $_POST["id"];


//2.　データベース接続
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE gs_table SET name=:name, q1=:credo, q2=:community, q3=:improvement, q4=:thanks, q5=:message, q6=:cosmos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':credo',       $credo,       PDO::PARAM_STR);
$stmt->bindValue(':community',   $community,   PDO::PARAM_STR);
$stmt->bindValue(':improvement', $improvement, PDO::PARAM_STR);
$stmt->bindValue(':thanks',      $thanks,      PDO::PARAM_STR);
$stmt->bindValue(':message',     $message,     PDO::PARAM_STR);
$stmt->bindValue(':cosmos',      $cosmos,      PDO::PARAM_STR);
$stmt->bindValue(':id',          $id,          PDO::PARAM_STR);
$status = $stmt->execute();//SQL実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);//function化
} else {
    // redirect("index.php");//function化
}
?>
<div class="mx-auto max-w-screen-md px-4 md:px-8">
    <p class="mb-4 text-center text-xl text-sky-500 md:mb-6 lg:text-xl">LAB17 GEEK日記</p>
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">更新が完了しました</h2>

    <div class="divide-y">
      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">ニックネーム</span>
        </div>
        <p class="text-gray-600"><?php echo h($name)?></p>
      </div>
      <!-- review - end -->

      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">CREDOに則り、自らのチカラでセカイを変えようとする全ての挑戦を讃えましたか？</span>
        </div>

        <p class="text-gray-600"><?php echo $credo?></p>
      </div>
      <!-- review - end -->

      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">コミュニティの活性化に自ら貢献しましたか？</span>
        </div>

        <p class="text-gray-600"><?php echo $community?></p>
      </div>
      <!-- review - end -->

      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">昨日のあなたより、今日のあなたができるようになったことはなんですか？</span>
        </div>

        <p class="text-gray-600"><?php echo h($improvement)?></p>
      </div>
      <!-- review - end -->

      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">周りの人に感謝することや、良かった点を教えてください。</span>
        </div>

        <p class="text-gray-600"><?php echo h($thanks)?></p>
      </div>
      <!-- review - end -->

      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">明日の目標はなんですか？</span>
        </div>
        <p class="text-gray-600"><?php echo h($message)?></p>
      </div>
      <!-- review - end -->

      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">コスモは燃えていますか？</span>
        </div>
        <p class="text-gray-600"><?php echo $cosmos?></p>
      </div>
      <!-- review - end -->

    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>