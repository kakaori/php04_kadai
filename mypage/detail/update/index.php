<?php
// 完了画面に直接アクセスされた場合にリダイレクト
$locationPage = "/gs_php/php04/kadai/login/";
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: $locationPage");
    exit;
}
?>

<?php $title = 'ユーザー情報更新完了｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>
<?php
//1.　POSTデータ取得
$name      = $_POST['name'];
$lpw       = filter_input( INPUT_POST, "lid" );//password
$lpw       = password_hash($lpw, PASSWORD_DEFAULT);//パスワードハッシュ化
$number    = $_POST['number'];
//id分を追加
$id = $_POST["id"];

//2.　データベース接続
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE user_table SET name=:name, lpw=:lpw, number=:number WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',      $name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',$lpw,PDO::PARAM_STR);
$stmt->bindValue(':number',    $number,    PDO::PARAM_STR);
$stmt->bindValue(':id',  $id,  PDO::PARAM_STR);
$status = $stmt->execute();//SQL実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);//function化
}

//ユーザーネーム更新用
$_SESSION["name"] = $name;
?>

<div class="mx-auto max-w-screen-md px-4 md:px-8">
    <p class="mb-4 text-center text-xl text-sky-500 md:mb-6 lg:text-xl">LAB17 GEEK日記</p>
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">ユーザー情報の更新が完了しました</h2>

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
          <span class="block text-sm font-bold">パスワード</span>
        </div>
        <p class="text-gray-600">表示されません</p>
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
    </div>

    <div class="text-center">
      <a href="/gs_php/php04/kadai/mypage/" class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">マイページ</a>
    </div>

</div>

<style>.youkoso{display:none;}</style>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>