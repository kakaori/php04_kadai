<?php $title = 'ユーザー詳細｜LAB17 GEEK日記'; ?>
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
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">ユーザー詳細</h2>
    </div>
    <!-- text - end -->

    <?php if ($loggedIn): ?>
        <?php if ($isAdmin): ?>

        <!-- form - start -->
        <form action="/gs_php/php04/kadai/user/detail/update/" method="post" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">

          <!-- ニックネーム -->
          <div class="sm:col-span-2">
            <label for="name" class="mb-2 inline-block text-sm sm:text-base">ニックネーム</label>
            <input name="name" type="text" value="<?= h($row["name"]) ?>" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <!-- 受講番号 -->
          <div class="sm:col-span-2">
            <label for="number" class="mb-2 inline-block text-sm sm:text-base">受講番号</label>
            <input name="number" type="text" inputmode="numeric" maxlength="2" pattern="^[0-9]+$" value="<?= h($row["number"]) ?>" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <!-- 管理者 -->
          <div class="sm:col-span-2">
            <label for="kanri_flg" class="mb-2 inline-block text-sm sm:text-base">管理者（0:一般、1:管理者）</label>
            <input name="kanri_flg" type="text" inputmode="numeric" maxlength="1" pattern="^[0-9]+$" value="<?= h($row["kanri_flg"]) ?>" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <!-- アカウント -->
          <div class="sm:col-span-2">
            <label for="life_flg" class="mb-2 inline-block text-sm sm:text-base">アカウント（0:使用中、1:除籍）</label>
            <input name="life_flg" type="text" inputmode="numeric" maxlength="1" pattern="^[0-9]+$" value="<?= h($row["kanri_flg"]) ?>" value="<?= h($row["life_flg"]) ?>" class="w-full rounded border bg-sky-50 px-3 py-3 outline-none ring-sky-300 transition duration-100 focus:ring" required />
          </div>

          <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <div class="text-center items-center justify-between mt-4 sm:col-span-2">
            <button class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">更新する</button>
          </div>

        </form>
        <!-- form - end -->

        <!-- deleteform - start -->
        <form id="deleteForm" action="/gs_php/php04/kadai/user/detail/user_delete.php" method="post" class="mx-auto max-w-screen-md">
          <div class="mt-4">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <button id="delete" class="inline-block rounded-lg bg-gray-100 px-8 py-3 text-center text-sm outline-none transition duration-200 hover:bg-gray-200 focus-visible:ring active:bg-gray-300 md:text-base">削除</button>
          </div>
        </form>
        <!-- deleteform - end -->

        <?php else: ?>
          <p class="text-center">ユーザーリストは、管理者にのみ表示されます。</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<script>
  document.getElementById('delete').addEventListener('click', function(event) {
    if (confirm('本当に削除しますか？')) {
      document.getElementById('deleteForm').submit();
    } else {
      // キャンセルをクリックした場合、フォームは送信されない
      event.preventDefault();
    }
  });
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>