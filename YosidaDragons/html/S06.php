<?php
function es($data) {
    return htmlspecialchars($data , ENT_QUOTES , 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        顧客情報確認
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S04.css">
    <link rel="stylesheet" href="../css/S06.css">
</head>
<body>
    <div class="container">

        <pre>
        <?php
        //S04からデータ取得
        $name = $_POST["name"];
        $kana = $_POST["kana"];
        $phonnumber = $_POST["phonnumber"];
        $address = $_POST["address"];
        //日付取得
        $today = date("Y/m/d");

        echo "<div class='flex speace'><p>ID</p><p>3</p></div>";
        echo "<div class='flex speace'><div><p>氏名</p></div><div><p>{$name}</p></div></div>";
        echo "<div class='flex speace'><div><p>カナ</p></div><div><p>{$kana}</p></div></div>";
        echo "<div class='flex speace'><div><p>電話番号</p></div><div><p>{$phonnumber}</p></div></div>";
        echo "<div class='flex speace'><div><p>住所</p></div><div><p>{$address}</p></div></div>";
        echo "<div class='flex speace'><div><p>変更日</p></div><div><p>{$today}</p></div></div>";
        ?>
        </pre>


        <!-- テーブル -->
        <table class="speace">
        <?php
            //データーベースユーザ
            $user = 'root';
            $password = '';

            //利用するデータベース
            $dbName = 'test';

            // 利用するデータベース利用するデータベース
            $host = 'localhost:3306';

            //MySQLのDSN文字列
            $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

            
            try {
                $pdo = new PDO($dsn, $user, $password);
                // プリペアドステートメントのエミュレーションを無効にする
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                // 例外がスローされる設定にする
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "データベース{$dbName}に接続しました。";
                //接続を解除する


                $sql = "SELECT * FROM books";
                $stm = $pdo->prepare($sql);
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
             
                echo "<thead><tr>";
                echo "<th>ID</th><th>ISBN</th><th>タイトル</th><th>著者</th><th>出版</th>";
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
            } catch (Exception $e) {
                echo "<span class='error'>エラーがありました。</span><br>";
                echo $e->getMessage();
                exit();
            }
        ?>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>ISBN</th>
                <th>タイトル</th>
                <th>著者名</th>
                <th>出版社</th>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>44444444</td>
                <td>人が眠る街</td>
                <td>鈴木</td>
                <td>門山社</td>
            </tr>
            <tr>
                <td>2</td>
                <td>3</td>
                <td>44444442</td>
                <td>ポップウップ</td>
                <td>宇多川正雄</td>
                <td>ポプラ社</td>
            </tr>
            <tr>
                <td>　</td>
                <td>　</td>
                <td>　</td>
                <td>　</td>
                <td>　</td>
                <td>　</td>
            </tr>
            <tr>
                <td>　</td>
                <td>　</td>
                <td>　</td>
                <td>　</td>
                <td>　</td>
                <td>　</td>
            </tr>
        </table>

        <div class="flex">
            <!-- 戻るボタン -->
            <div id="back_button">
                <a class="Button" href="S04.php">戻る</a>
            </div>

            <!-- 印刷ボタン -->
            <div id="copy_button">
                <a class="Button" href="">印刷</a>
            </div>
        </div>
        
    </div>
</body>
</html>