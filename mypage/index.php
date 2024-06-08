<?php $title = 'マイページ｜LAB17 GEEK日記'; ?>
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
$sql = "SELECT user_table.name AS username, gs_table.* FROM user_table JOIN gs_table ON user_table.id = gs_table.userid WHERE user_table.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
    <h2 class="mb-4 text-center text-2xl font-bold md:mb-8 lg:text-3xl xl:mb-12">マイページ</h2>

    <?php if ($loggedIn): ?>
        <?php if ($isAdmin): ?>
        <div class="text-center items-center justify-between mt-4 mb-8 sm:col-span-2">
            <a href="/gs_php/php04/kadai/user/" class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">ユーザーリスト</a>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="mx-auto max-w-screen-sm mb-8">
        <p class="text-sm mb-0.5">質問１ CREDOに則り、自らのチカラでセカイを変えようとする全ての挑戦を讃えましたか？</p>
        <p class="text-sm mb-0.5">質問２ コミュニティの活性化に自ら貢献しましたか？</p>
        <p class="text-sm mb-0.5">質問３ 昨日のあなたより、今日のあなたができるようになったことはなんですか？</p>
        <p class="text-sm mb-0.5">質問４ 周りの人に感謝することや、良かった点を教えてください。</p>
        <p class="text-sm mb-0.5">質問５ 明日の目標はなんですか？</p>
        <p class="text-sm mb-0.5">質問６ コスモは燃えていますか？</p>
    </div>

    <div class="text-center items-center justify-between mt-4 mb-8 sm:col-span-2">
        <a href="/gs_php/php04/kadai/diary/" class="w-64 inline-block rounded-lg bg-sky-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-sky-300 transition duration-100 hover:bg-sky-600 focus-visible:ring active:bg-sky-700 md:text-base">日記を書く</a>
    </div>


    <p class="mb-4 text-center text-xl md:mb-6 lg:text-xl"><?= h($_SESSION['name'])?>さんの日記一覧</p>
    <div class="w-full mx-auto overflow-auto">
        <table class='mb-4 table-auto w-full text-left whitespace-no-wrap'>
            <tr>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl'>回答日時</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>ニックネーム</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>質問１</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>質問２</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>質問３</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>質問４</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100'>質問５</th>
                <th class='whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br'>質問６</th>
            </tr>
            <?php foreach($values as $v){ ?>
                <tr>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><a href="/gs_php/php04/kadai/diary/list/detail/?id=<?=$v["id"]?>" class="text-sky-500 hover:text-sky-700"><?=$v["indate"]?></a></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["username"])?></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["q1"])?></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["q2"])?></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["q3"])?></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["q4"])?></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["q5"])?></td>
                    <td class='border-t-2 border-gray-200 px-4 py-3'><?=h($v["q6"])?></td>
                </tr>
            <?php } ?>
        </table>

    </div>

    <div><img class="m-auto" src="/gs_php/php04/kadai/img/cool_geek_actwithpassion.png" alt=""></div>
</div>

<!-- popalert -->
<?php
if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true) {
    $message = 'ログインしました';
    echo '<script type="text/javascript" src="/gs_php/php04/kadai/js/main.js"></script>';
    echo '<script type="text/javascript">popup();</script>';
    // フラグをクリア
    $_SESSION['login_success'] = false;
}
?>

<?php
if (isset($_SESSION['diary_deleted']) && $_SESSION['diary_deleted'] === true) {
    $message = '削除しました';
    echo '<script type="text/javascript" src="/gs_php/php04/kadai/js/main.js"></script>';
    echo '<script type="text/javascript">popup();</script>';
    // フラグをクリア
    $_SESSION['diary_deleted'] = false;
}
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/popalert.php'); ?>
<!-- end popalert -->


<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>