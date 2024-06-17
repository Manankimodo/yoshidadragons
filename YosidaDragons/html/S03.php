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
                <form action="">
                    <input type="text" name="" id="">
                    <p>例:08012345678</p>
                </form>
            </div>
        </div>

        <!-- 氏名 -->
        <div class="flex">
            <div class="text speace">
                <p>氏名(全角カナ)</p>
            </div> 
            <div class="speace">
                <form action="">
                    <input type="text" name="" id="">
                    <p>例:ヤマダタロウ</p>
                </form>
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
            <a class="Button" href="S04.html">顧客管理情報</a>
        </div>

        <!-- テーブル -->
        <div class="speace">
            <table>
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>カナ</th>
                    <th>住所</th>
                </tr>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                </tr>
                <tr>
                    <td>　</td>
                    <td>　</td>
                    <td>　</td>
                    <td>　</td>
                </tr>
                <tr>
                    <td>test2</td>
                    <td>test2</td>
                    <td>test2</td>
                    <td>test2</td>
                </tr>
            </table>
        </div>

        <!-- 戻るボタン -->
        <div id="back_button">
            <a class="Button" href="S01.php">戻る</a>
        </div>

    </div>
</body>
</html>