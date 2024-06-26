<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

// HTMLエスケープ用の関数
function es($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // フォームが送信された場合の処理
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームから送信されたデータを取得
        $tel = $_POST['tel'];
        $name = $_POST['name'];
        $kana = $_POST['kana'];
        $credit = $_POST['credit'];
        $address = $_POST['address'];
        
        // 現在の日付を取得
        $today = date("Y-m-d");

        // customers テーブルの行数を取得
        $sql = "SELECT COUNT(*) FROM customers";
        $stmt = $pdo->query($sql);
        $rowCount = $stmt->fetchColumn();

        // INSERT文を準備し、値をバインドして実行
        $sql = "INSERT INTO customers (cust_id, name, kana, tel, address, credit, created_at, updated_at) 
                VALUES (:cust_id, :name, :kana, :tel, :address, :credit, :created_at, :updated_at)";
        $stmt = $pdo->prepare($sql);
        
        // バインド変数に値をセット
        $stmt->bindParam(':cust_id', $new_cust_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':kana', $kana);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':credit', $credit);
        $stmt->bindParam(':created_at', $today); // 作成日時
        $stmt->bindParam(':updated_at', $today); // 更新日時
        
        // 新しい顧客IDを計算（既存の行数 + 1）
        $new_cust_id = $rowCount + 1;

        // SQL文を実行
        $stmt->execute();

        echo "新規登録が完了しました。";
    }

} catch(Exception $e) {
    echo '<span>エラー</span><br>';
    echo $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        新規登録
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S02.css">
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="flex">
                <div class="text"><p>電話番号</p><p>(ハイフンなし)</p></div>
                <div class="speace"><input type="text" name="tel"><p>例:08012345678</p></div>
            </div>
            
            <div class="flex">
                <div class="text speace"><p>氏名</p></div>
                <div class="speace"><input type="text" name="name"><p>例:山田太郎</p></div>
            </div>
            
            <div class="flex">
                <div class="text speace"><p>氏名(全角カナ)</p></div>
                <div class="speace"><input type="text" name="kana"><p>例:ヤマダタロウ</p></div>
            </div>
            
            <div class="flex">
                <div class="text speace"><p>クレジットカード番号</p></div>
                <div class="speace"><input type="text" name="credit"><p>例:1234567890123456</p></div>
            </div>
            
            <div class="flex">
                <div class="text speace"><p>住所</p></div>
                <div class="speace"><input type="text" name="address"><p>例:大分県高崎山</p></div>
            </div>

            <div class="touroku_button"><input type="submit" value="登録"></div>
        </form>
    </div>
</body>
</html>
