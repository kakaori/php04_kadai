<?php $title = 'ユーザーリスト｜LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>
<?PHP
// LOGINチェック
$locationPage = "/gs_php/php04/kadai/login/";
if (!sschk()) {
    // ログインしていない場合の処理
    header("Location: $locationPage");
    exit;
}

$id = $_SESSION["id"];

//1.　データベース接続
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<div class="mx-autolg px-4 md:px-8">
    <p class="mb-4 text-center text-xl text-sky-500 md:mb-6 lg:text-xl">LAB17 GEEK日記</p>
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">登録ユーザーリスト</h2>

    <?php if ($loggedIn): ?>
        <?php if ($isAdmin): ?>
            <div class="w-full mx-auto overflow-auto">
                <table class='mb-4 table-auto w-full text-left whitespace-no-wrap'>
                    <tr>
                        <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl'>登録日時</th>
                        <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>ニックネーム</th>
                        <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>受講番号</th>
                        <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>管理者</th>
                        <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>ユーザー</th>
                    </tr>
                    <?php foreach($values as $v){ ?>
                        <tr>
                            <td class='border-t-2 border-gray-200 px-4 py-3'><a href="/gs_php/php04/kadai/user/detail/?id=<?=$v["id"]?>" class="text-sky-500 underline decoration-sky-500 hover:no-underline"><?=$v["indate"]?></a></td>
                            <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["name"])?></td>
                            <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["number"])?></td>
                            <td class='border-t-2 border-gray-200 px-4 py-3'><?=($v["kanri_flg"] == "1") ? '管理者' : '一般';?></td>
                            <td class='border-t-2 border-gray-200 px-4 py-3'><?=($v["life_flg"] == "1") ? '除籍' : '使用中';?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">ユーザーリストは、管理者にのみ表示されます。</p>
        <?php endif; ?>
    <?php endif; ?>
</div>



<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>