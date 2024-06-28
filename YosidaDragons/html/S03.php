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
        <div class="flex">
            <div class="text">
                <p>電話番号</p>
                <p>(ハイフン無し)</p>
            </div> 
            <div class="speace">
                <input type="text" name="" id="">
                <p>例:08012345678</p>
            </div>
        </div>

        <!-- 氏名 -->
        <form action="">
        <div class="flex">
            <div class="text speace">
                <p>氏名(全角カナ)</p>
            </div> 
            <div class="speace">
                <input type="text" name="" id="">
                <p>例:ヤマダタロウ</p>
            </div>
        </div>
        
        <!--
            検索
            入力消去
            顧客管理情報 → S04(顧客情報変更)
        -->
        <div class="flex speace" id="kensaku_button">
            <a class="Button" href="">検索</a>
            <a class="Button" href="">入力消去</a>
            <a class="Button" href="S04.php">顧客管理情報</a>
        </div>
        </form>

        <!-- テーブル -->
        <div class="speace">
            <table>
                <?php
                    $sql = "SELECT DISTINCT A.*FROM books A, customers B, cust_subscribe C WHERE A.book_id = C.book_id AND C.cust_id = B.cust_id AND B.cust_id = :cust_id";
                    $stm = $pdo->prepare($sql);
                    $stm->bindParam(':cust_id', $cust_id, PDO::PARAM_INT); // :cust_id としてプレースホルダーを使用する
                    $stm->execute();
                    
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo "<thead><tr>";
                    echo "<th>ID</th><th>ISBN</th><th>タイトル</th><th>著者</th><th>出版</th><th>在庫</th><th>価格</th>";
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