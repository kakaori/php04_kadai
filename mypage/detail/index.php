<?php $title = 'ユーザー情報｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>
<?PHP 
// LOGINチェック
$locationPage = "/gs_php/php04/kadai/login/";
if (!sschk()) {
    // ログインしていない場合の処理
    header("Location: $locationPage");
    exit;
}

$id = $_GET["id"];

//1.　データベース接続
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$row = $stmt -> fetch();
// $values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>
<div class="mx-auto max-w-screen-sm px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
    <p class="mb-4 text-center text-xl text-sky-500 md:mb-6 lg:text-xl">LAB17 GEEK日記</p>
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">ユーザー情報</h2>
    </div>
    <!-- text - end -->

    <?php if ($loggedIn): ?>
        <!-- form - start -->
        <form action="/gs_php/php04/kadai/mypage/detail/update/" method="post" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">

          <!-- ニックネーム -->
          <div class="sm:col-span-2">
            <label for="name" class="mb-2 inline-block text-sm sm:text-base">ニックネーム</label>
            <input name="name" type="text" value="<?= h($row["name"]) ?>" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <!-- パスワード -->
          <div class="sm:col-span-2">
            <label for="lid" class="mb-2 inline-block text-sm sm:text-base">パスワード</label>
            <input name="lid" type="password" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <!-- 受講番号 -->
          <div class="sm:col-span-2">
            <label for="number" class="mb-2 inline-block text-sm sm:text-base">受講番号</label>
            <input name="number" type="text" inputmode="numeric" maxlength="2" pattern="^[0-9]+$" value="<?= h($row["number"]) ?>" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <div class="text-center items-center justify-between mt-4 sm:col-span-2">
            <button class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">更新する</button>
          </div>

        </form>
        <!-- form - end -->

        <p class="mt-8 text-sm text-gray-400">アカウントを削除したい場合は管理者までご連絡ください。</p>

    <?php endif; ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>