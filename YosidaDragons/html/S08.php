<?php
$user = 'root';
$password = '';
// 用するデータベース
$dbName = 'test';
$host = 'localhost:3306';
// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

// HTMLエスケープ用の関数
function es($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

$isbn_0 = es($_POST['isbn']);//S07からisbnを取得

// データベースから取得したデータを格納する変数を初期化
$book_id = '';
$title = '';
$author_name = '';
$publisher = '';
$stock = '';
$price = '';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // SQLクエリの準備
    $sql = "SELECT * FROM books WHERE isbn=:isbn_1";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':isbn_1', $isbn_0, PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        // SQLから取得したデータを変数に格納
        $book_id = es($result['book_id']);
        $title = es($result['tytle']);  // tytle を使用
        $author_name = es($result['author_name']);
        $publisher = es($result['publisher']);
        $stock = es($result['stock']);
        $price = es($result['price']);
    }

} catch (Exception $e) {
    echo 'エラー: ' . $e->getMessage();
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/destry.css">
    <link rel="stylesheet" href="../css/S08.css">
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
                <!-- ID -->
                <div class="flex speace">
                    <p>ID</p>
                    <input value="<?php echo $book_id; ?>" type="text" name="id" id="">
                </div>

                <!-- ISBN -->
                <div class="flex speace">       
                    <p>ISBN</p>
                    <input value="<?php echo $isbn_0; ?>" type="text" name="isbn" id="" readonly>
                </div>

                <!-- タイトル -->
                <div class="flex speace">
                    <p>タイトル</p>
                    <input value="<?php echo $title; ?>" type="text" name="title" id="">
                </div>

                <!-- 著者名 -->
                <div class="flex speace">
                    <p>著者名</p>
                    <input value="<?php echo $author_name; ?>" type="text" name="author_name" id="">
                </div>

                <!-- 出版社 -->
                <div class="flex speace">
                    <p>出版社</p>
                    <input value="<?php echo $publisher; ?>" type="text" name="publisher" id="">
                </div>

                <!-- 在庫 -->
                <div class="flex speace">
                    <p>在庫</p>
                    <input value="<?php echo $stock; ?>" type="text" name="stock" id="">
                </div>

                <!-- 価格(円) -->
                <div class="flex speace">
                    <p>価格(円)</p>
                    <input value="<?php echo $price; ?>" type="text" name="price" id="">
                </div>
            </div>

            <div class="flex">
                <div id="back_button">
                    <a class="Button" href="S07.php">戻る</a>
                </div>

                <div id="OK_button">
                    <input type="submit" class="kousin" value="更新">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

 