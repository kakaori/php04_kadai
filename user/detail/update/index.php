<?php
// 完了画面に直接アクセスされた場合にリダイレクト
$locationPage = "/gs_php/php04/kadai/login/";
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: $locationPage");
    exit;
}
?>

<?php $title = 'ユーザー更新完了｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>
<?php
//1.　POSTデータ取得
$name      = $_POST['name'];
$number    = $_POST['number'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg  = $_POST['life_flg'];
//id分を追加
$id = $_POST["id"];

//2.　データベース接続
$pdo = db_conn();

// ユーザー名が既に存在するかチェック　同じnameは NG
$name = filter_input(INPUT_POST, "name");
$checkSql = "SELECT COUNT(*) FROM user_table WHERE name = :name";
$checkStmt = $pdo->prepare($checkSql);
$checkStmt->bindValue(':name', $name, PDO::PARAM_STR);
$checkStmt->execute();
$count = $checkStmt->fetchColumn();

if ($count > 0) {
    // ユーザー名が既に存在する場合
    echo "<script>
        alert('そのニックネームは既に使用されています。別のニックネームに変更してください。');
        window.location.href = '/gs_php/php04/kadai/user/detail/?id=$id';
    </script>";
    exit; // ここで処理を終了
}

//３．データ登録SQL作成
$sql = "UPDATE user_table SET name=:name, number=:number, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',      $name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':number',    $number,    PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':life_flg',  $life_flg,  PDO::PARAM_STR);
$stmt->bindValue(':id',  $id,  PDO::PARAM_STR);
$status = $stmt->execute();//SQL実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);//function化
}
?>

<div class="mx-auto max-w-screen-md px-4 md:px-8">
    <p class="mb-4 text-center text-xl text-sky-500 md:mb-6 lg:text-xl">LAB17 GEEK日記</p>
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">ユーザーの更新が完了しました</h2>

    <div class="divide-y">
      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">ニックネーム</span>
        </div>
        <p class="text-gray-600"><?php echo h($name) ?></p>
      </div>
      <!-- review - end -->      
      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">受講番号</span>
        </div>
        <p class="text-gray-600"><?php echo h($number) ?></p>
      </div>
      <!-- review - end -->
      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">管理者（0:一般、1:管理者）</span>
        </div>
        <p class="text-gray-600"><?php echo h($kanri_flg) ?></p>
      </div>
      <!-- review - end -->
      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">アカウント（0:使用中、1:除籍）</span>
        </div>
        <p class="text-gray-600"><?php echo h($life_flg) ?></p>
      </div>
      <!-- review - end -->
    </div>

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>