<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        顧客情報変更画面
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- destry.css -->
    <link rel="stylesheet" href="../css/destry.css">

    <!-- スタイル.css -->
    <!--<link rel="stylesheet" href="../css/Style.css">-->
    <link rel="stylesheet" href="../css/S04.css">

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

        $tel = es($_POST['tel']);
        $kana = es($_POST['name']); 


        $cust_id = '';
        $name = '';
        $address = '';
        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // SQLクエリの準備
            $sql = "SELECT * FROM customers WHERE tel = :tel and kana = :kana";
            $stm = $pdo->prepare($sql);
            $stm->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stm->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $cust_id = es($result['cust_id']);
                $name = es($result['name']);
                $address = es($result['address']);
            }

        } catch(Exception $e) {
            echo 'エラー' . $e->getMessage();
        }
    ?>

</head>
<body>
    <div class="container">
        
        <form method="post" action="S06.php">
        
            <!-- ID -->
            <div class="flex speace">
                <p>ID</p>
                <div>
                    <input value="<?php echo $cust_id ?>" type="text" name="cust_id">
                </div>
            </div>

        
            <!-- 氏名 -->
            <div class="flex speace">
                <div>
                    <p>氏名</p>
                </div>
                <div>
                    <input value="<?php echo $name ?>" type="text" name="name">
                </div>
            </div>

            <!-- カナ -->
            <div class="flex speace">
                <div>
                    <p>カナ</p>
                </div>
                <div>
                    <input value="<?php echo $kana ?>" type="text" name="kana">
                </div>
            </div>

            <!-- 電話番号 -->
            <div class="flex speace">
                <div>
                    <p>電話番号</p>
                </div>
                <div>
                    <input value="<?php echo $tel ?>" type="text" name="phonnumber">
                </div>
            </div>

            <!-- 住所 -->
            <div class="flex speace">
                <div>
                    <p>住所</p>
                </div>
                <div>
                    <input value="<?php echo $address ?>" type="text" name="address">
                </div>
            </div>

            <!-- 
                購読登録　
                購読解除　
                購読確認ボタン　→ S06(顧客情報確認)
            -->
            <div id="koudoku_button" class="flex speace">
                <a id="Touroku_button" class="Button" >購読登録</a>
                <a id="Kaijo_button" class="Button" >購読解除</a>
                <input id="kakunin_button" type="submit" style="border: solid 1px;" style="margin-left: 50px;">
            </div>
        </form>

        <!-- テーブル -->
        <!-- <table class="speace">
            <tr>
                <th>/</th>
                <th>ID</th>
                <th>ISBN</th>
                <th>タイトル</th>
                <th>著者名</th>
                <th>出版社</th>
            </tr>
            <tr>
                <td>※</td>
                <td>1</td>
                <td>44444444</td>
                <td>人が眠る街</td>
                <td>鈴木</td>
                <td>門山社</td>
            </tr>
            <tr>
                <td></td>
                <td>2</td>
                <td>44444441</td>
                <td>鬼ヶ島</td>
                <td>青山赤尾</td>
                <td>文秋社</td>
            </tr>
            <tr>
                <td>※</td>
                <td>3</td>
                <td>44444442</td>
                <td>ポップウップ</td>
                <td>宇多川正雄</td>
                <td>ポプラ社</td>
            </tr>
            <tr>
                <td></td>
                <td>4</td>
                <td>44444443</td>
                <td>脊髄反射と向き合う</td>
                <td>石野古味</td>
                <td>KY社</td>
            </tr>
        </table> -->

        <!-- 戻るボタン -->
        <div id="back_button">
            <a class="Button" href="./S03.php">戻る</a>
        </div>

    </div>


    <!-- 
        Javascript 
        購読登録 解除ボタンのアラート
    -->
    <script src="../js/S04.js"></script>
</body>
</html>