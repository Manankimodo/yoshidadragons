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
        $name = $_POST["name"];
        $kana = $_POST["kana"];
        $phonnumber = $_POST["phonnumber"];
        $address = $_POST["address"];

        echo "<div class='flex speace'><p>ID</p><p>3</p></div>";
        echo "<div class='flex speace'><div><p>氏名</p></div><div><p>{$name}</p></div></div>";
        echo "<div class='flex speace'><div><p>カナ</p></div><div><p>{$kana}</p></div></div>";
        echo "<div class='flex speace'><div><p>電話番号</p></div><div><p>{$phonnumber}</p></div></div>";
        echo "<div class='flex speace'><div><p>住所</p></div><div><p>{$address}</p></div></div>";
        echo "<div class='flex speace'><div><p>変更日</p></div><div><p>20xx/05/01</p></div></div>";
        ?>
        </pre>


        ID
        <div class="flex speace">
            <p>ID</p>
            <p>3</p>
        </div>

        <!-- 氏名 -->
        <div class="flex speace">
            <div>
                <p>氏名</p>
            </div>
            <div>
                <p>山田太郎</p>
            </div>
        </div>

        <!-- カナ -->
        <div class="flex speace">
            <div>
                <p>カナ</p>
            </div>
            <div>
                <p>ヤマダタロウ</p>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="flex speace">
            <div>
                <p>電話番号</p>
            </div>
            <div>
                <p>08012345678</p>
            </div>
        </div>

        <!-- 住所 -->
        <div class="flex speace">
            <div>
                <p>住所</p>
            </div>
            <div>
                <p>東京都新宿区×××××××××××</p>
            </div>
        </div>

        <!-- 変更日 -->
        <div class="flex speace">
            <div>
                <p>変更日</p>
            </div>
            <div>
                <p>20xx/05/01</p>
            </div>
        </div>


        <!-- テーブル -->
        <table class="speace">
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
                <a class="Button" href="S04.html">戻る</a>
            </div>

            <!-- 印刷ボタン -->
            <div id="copy_button">
                <a class="Button" href="">印刷</a>
            </div>
        </div>
        
    </div>
</body>
</html>