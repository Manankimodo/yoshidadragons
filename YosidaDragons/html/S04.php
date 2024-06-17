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
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/S04.css">

</head>
<body>
    <div class="container">
        
        <!-- ID -->
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
                <form action="">
                    <input value="山田太郎" type="text">
                </form>
            </div>
        </div>

        <!-- カナ -->
        <div class="flex speace">
            <div>
                <p>カナ</p>
            </div>
            <div>
                <form action="">
                    <input value="ヤマダタロウ" type="text">
                </form>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="flex speace">
            <div>
                <p>電話番号</p>
            </div>
            <div>
                <form action="">
                    <input value="08012345678" type="text">
                </form>
            </div>
        </div>

        <!-- 住所 -->
        <div class="flex speace">
            <div>
                <p>住所</p>
            </div>
            <div>
                <form action="">
                    <input value="東京都新宿区×××××××××××" type="text">
                </form>
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
            <input id="kakunin_button" type="submit" value="購読確認">
        </div>

        <!-- テーブル -->
        <table class="speace">
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
        </table>

        <!-- 戻るボタン -->
        <div id="back_button">
            <a class="Button" href="S03.html">戻る</a>
        </div>

    </div>


    <!-- 
        Javascript 
        購読登録 解除ボタンのアラート
    -->
    <script src="../js/S04.js"></script>
</body>
</html>