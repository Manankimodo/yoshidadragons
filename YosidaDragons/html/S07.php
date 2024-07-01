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
        書籍情報検索
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S07.css">
</head>
<body>
    <div class="container">

        <!-- ISBN -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="flex">
                <div class="text speace">
                    <p>ISBN</p>
                </div> 
                <div class="speace">              
                    <input type="text" name="isbn" id="">
                    <p>例:44444444</p>            
                </div>
            </div>

            <!-- タイトル -->
            <div class="flex">
                <div class="text speace">
                    <p>タイトル</p>
                </div> 
                <div class="speace">
                    <input type="text" name="title" id="">
                    <p>例:人が眠る</p>
                </div>
            </div>

            <!-- 会社名 -->
            <div class="flex">
                <div class="text speace">
                    <p>会社名</p>
                </div> 
                <div class="speace">
                    <input type="text" value="不倫会社" name="publisher" id="">
                </div>
            </div>

            <!--  
                検索
                入力消去
                書籍情報変更 → S08(書籍情報変更)
            -->
            <div class="flex" id="koudoku_button">
                <input type="submit">
                <a class="Button" href="">入力消去</a>
                <a class="Button" href="S08.php">書籍情報変更</a>
            </div>
        </form>
        <!-- テーブル -->
        <div class="speace">
        <table class="Table">
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // form method = postからデータを受け取る
                $isbn = $_POST['isbn'];
                $title = $_POST['title'];
                $publisher = $_POST['publisher'];
            
                try {
                    // データベースに接続
                    $pdo = new PDO($dsn, $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                    // SQLクエリの準備と実行
                    $sql = "SELECT DISTINCT B.* FROM books A, customers B, cust_subscribe C WHERE isbn=:isbn AND tytle=:title AND publisher=:publisher";
                    $stm = $pdo->prepare($sql);
                    $stm->bindParam(':isbn', $isbn, PDO::PARAM_STR);
                    $stm->bindParam(':title', $title, PDO::PARAM_STR);
                    $stm->bindParam(':publisher', $publisher, PDO::PARAM_STR);
                    $stm->execute();
            
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo '<span>エラー</span><br>';
                    echo $e->getMessage();
                    exit();
                }
            }
                

                
                // $sql = "SELECT DISTINCT B.*FROM books A, customers B, cust_subscribe C WHERE name=:name AND tel = :Tel";
                // $stm->bindParam(':Tel', $Tel, PDO::PARAM_INT); // :Tel としてプレースホルダーを使用する
                // $stm->bindParam(':name', $name, PDO::PARAM_INT); // :name としてプレースホルダーを使用する
                // $stm = $pdo->prepare($sql);
                // $stm->execute();
                
                // $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<thead><tr>";
                echo "<th>ID</th><th>書籍番号</th><th>タイトル</th><th>著者</th><th>会社名</th><th>在庫</th><th>価格</th>";
                echo "</tr></thead>";
                
                echo "<tbody>";
                #es関数の処理は上のfunction esに記述している

                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>", es($row['book_id']), "</td>";
                    echo "<td>", es($row['isbn']), "</td>";
                    echo "<td>", es($row['tytle']), "</td>";
                    echo "<td>", es($row['author_name']), "</td>";
                    echo "<td>", es($row['publisher']), "</td>";
                    echo "<td>", es($row['stock']), "</td>";
                    echo "<td>", es($row['price']), "</td>";
                    echo "</tr>";     
                }
                echo "</tbody>"; 
            ?>
        </table>
    </div>
        <!-- 戻るボタン -->
        <div id="back_button">
            <a class="Button" href="S01.php">戻る</a>
        </div>
    </div>
</body>
</html>