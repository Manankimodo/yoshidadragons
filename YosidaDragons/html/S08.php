<?php
$user = 'root';
$password = '';

// 利用するデータベース
$dbName = 'test';
$host = 'localhost:3306';

// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

// HTMLエスケープ用の関数
function es($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        書籍情報変更
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S08.css">
</head>
<body>
    <div class="container">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
                <!-- ID -->
                <div class="flex speace">
                    <p>ID</p>
                    <input value="1" type="text" name="id" id="">
                </div>

                <!-- ISBN -->
                <div class="flex speace">
                    <p>ISBN</p>
                    <input value="43444271000" type="text" name="isbn" id="">
                </div>

                <!-- タイトル -->
                <div class="flex speace">
                    <p>タイトル</p>
                    <input value="人が眠る街" type="text" name="title" id="">
                </div>

                <!-- 著者名 -->
                <div class="flex speace">
                    <p>著者名</p>
                    <input value="鈴木涼子" type="text" name="author_name" id="">
                </div>

                <!-- 出版社 -->
                <div class="flex speace">
                    <p>出版社</p>
                    <input value="門山社" type="text" name="publisher" id="">
                </div>

                <!-- 出版日 -->
                <div class="flex speace">
                    <p>出版日</p>
                    <input value="20xx/01/21" type="text" name="created_at" id="">
                </div>

                <!-- 価格(円) -->
                <div class="flex speace">
                    <p>価格(円)</p>
                    <input value="980" type="text" name="price" id="">
                </div>
                <!-- 定期購読社数 -->
                <div class="flex speace">
                    <p>定期購読者数</p>
                    <input value="6人" type="text" name="customer" id="">
                </div>

            </div>
            
            <div class="flex">
                <!-- 戻るボタン -->
                <div id="back_button">
                    <a class="Button" href="S07.php">戻る</a>
                </div>

                <!-- OKボタン -->
                <div id="OK_button">
                    <input type="submit" value="更新">
                </div>
            </div>
        </form>

            <table class="Table">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            //データベースに接続
            $pdo = new PDO($dsn , $user , $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
                echo "if文実行中";
                // SQLクエリの準備と実行
                $sql = "UPDATE books SET book_id = :id where book_id = 2";
                echo "if文途中";
                $stm = $pdo->prepare($sql);
                

                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                 $stm->bindParam(':isbn', $isbn, PDO::PARAM_INT);
                $stm->bindParam(':title', $title, PDO::PARAM_STR);
                $stm->bindParam(':author_name', $author_name, PDO::PARAM_STR);
                $stm->bindParam(':publisher', $publisher, PDO::PARAM_STR);
                $stm->bindParam(':created_at', $created_at, PDO::PARAM_STR);
                $stm->bindParam(':price', $price, PDO::PARAM_INT);
                $stm->bindParam(':customer', $customer, PDO::PARAM_STR);
                $stm->execute();
                echo "if文終了";

        } catch(Exception $e) {
            echo '<span>エラー</span><br>';
            echo $e->getMessage();
            exit();
        }
    }
    ?>
    </div>
</body>
</html>