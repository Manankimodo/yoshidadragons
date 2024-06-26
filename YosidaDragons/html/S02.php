<?php
$host = "localhost:3306";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

// HTMLエスケープ用の関数
function es($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
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
    <?php
    try {
        $pdo = new PDO($dsn , $user , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

        echo "<form action=''>";
        echo "<div class='flex'>";
        echo "<div class='text'><p>電話番号</p><p>(ハイフンなし)</p></div>" ;
        echo "<div class='speace'><input type='text' name='tel'><p>例:08012345678</p></div>";
        echo "</div>";
        
        echo "<div class='flex'>";
        echo "<div class='text speace'><p>氏名</p></div>";
        echo "<div class='speace'><input type='text' name='name'><p>例:山田太郎</p></div>";
        echo "</div>";
        
        echo "<div class='flex'>";
        echo "<div class='text speace'><p>氏名(全角カナ)</p></div>";
        echo "<div class='speace'><input type='text' name='kana'><p>例:ヤマダタロウ</p></div>";
        echo "</div>";
        
        echo "<div class='flex'>";
        echo "<div class='text speace'><p>クレジットカード番号</p></div>";
        echo "<div class='speace'><input type='text' name='credit'><p>例:1234567890123456</p></div>";
        echo "</div>";
        
        echo "<div class='flex'>";
        echo "<div class='text speace'><p>住所</p></div>";
        echo "<div class='speace'><input type='text' name='address'><p>例:大分県高崎山</p></div>";
        echo "</div>";

        echo "</div>";

        echo "<div' class='touroku_button'><input type='submit' value='登録'></div>";

        echo "</form>";
        
        $sql = "SELECT COUNT(*) FROM customers";
        $stmt = $pdo->query($sql);
        $rowCount = $stmt->fetchColumn();

        $tel = $_POST['tel'];
        $name = $_POST['name'];
        $kana = $_POST['kana'];
        $credit = $_POST['credit'];
        $address = $_POST['address'];
        
        $today = date("Y/m/d");

        $sql = "INSERT INTO customers (cust_id, name, kana, tel, address, credit, created_at, updated_at) VALUES ($rowCount+1, name, kana, tel, address, credit, $today, $today)";
        $stm = $pdo->prepare($sql);
        $stm->execute();

        

        
        #es関数の処理は上のfunction esに記述している
    } catch(Exception $e) {
        echo '<span>エラー</span><br>';
        echo $e->getMessage();
        exit();
    }
    ?>
    </div>
</body>
</html>