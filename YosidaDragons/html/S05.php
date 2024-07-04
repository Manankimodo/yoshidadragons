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
        顧客情報変更ダイアログ
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S01.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="submit">
    </form>

    <?php
    try {
        $pdo = new PDO($dsn , $user , $password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "データベース{$dbname}接続<br>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "if分の中です";
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE books SET book_id=100200300 WHERE book_id=1";
            $stm = $pdo->prepare($sql);
            $stm->execute();
        }
    
        
        #es関数の処理は上のfunction esに記述している
        foreach ($result as $row) {
        }
    } catch(Exception $e) {
        echo '<span>エラー</span><br>';
        echo $e->getMessage();
        exit();
    }
    ?>

</body>
</html>