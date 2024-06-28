<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        顧客情報検索
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S03.css">
</head>
<body>
    <div class="container">
        
        <!-- 電話番号 -->
        <form action="" method="post">
        <div class="flex">
            <div class="text">
                <p>電話番号</p>
                <p>(ハイフン無し)</p>
            </div> 
            <div class="speace">
                <input type="text" name="tel" id="">
                <p>例:08012345678</p>
            </div>
        </div>

        <!-- 氏名 -->
        <div class="flex">
            <div class="text speace">
                <p>氏名(全角カナ)</p>
            </div> 
            <div class="speace">
                <input type="text" name="name" id="">
                <p>例:ヤマダタロウ</p>
            </div>
        </div>
        
        <!--
            検索
            入力消去
            顧客管理情報 → S04(顧客情報変更)
        -->
        <div class="flex speace" id="kensaku_button">
            <input type="submit" value="検索">
            <a class="Button" href="">入力消去</a>
            <a class="Button" href="S04.php">顧客管理情報</a>
        </div>
        </form>

        <!-- テーブル -->
        <div class="speace">
            <table>
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

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        //form method = postからデータを受け取る
                    
                        $Tel = $_POST['tel'];
                        $name = $_POST['name'];

                        echo $Tel,$name;
                    
                    } else if ($_SERVER["REQUEST_METHOD"] == "GET"){
                        //form method = getからデータを受け取る
                    }


                   

                    
                    $sql = "SELECT DISTINCT B.*FROM books A, customers B, cust_subscribe C WHERE name=:name AND tel = :Tel";
                    $stm->bindParam(':Tel', $Tel, PDO::PARAM_INT); // :Tel としてプレースホルダーを使用する
                    $stm->bindParam(':name', $name, PDO::PARAM_INT); // :name としてプレースホルダーを使用する
                    $stm = $pdo->prepare($sql);
                    $stm->execute();
                    
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo "<thead><tr>";
                    echo "<th>ID</th><th>名前</th><th>カナ</th><th>電話番号</th><th>住所</th><th>クレジット</th><th>作成日</th>th>更新日</th>";
                    echo "</tr></thead>";
                    
                    echo "<tbody>";
                    #es関数の処理は上のfunction esに記述している

                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>", es($row['cust_id']), "</td>";
                        echo "<td>", es($row['name']), "</td>";
                        echo "<td>", es($row['kana']), "</td>";
                        echo "<td>", es($row['tel']), "</td>";
                        echo "<td>", es($row['address']), "</td>";
                        echo "<td>", es($row['credit']), "</td>";
                        echo "<td>", es($row['created_at']), "</td>";
                        echo "<td>", es($row['updated_at']), "</td>";
                        echo "</tr>";
                        echo print_r($result);
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