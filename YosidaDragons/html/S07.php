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
        <div class="flex">
            <div class="text speace">
                <p>ISBN</p>
            </div> 
            <div class="speace">
                <form action="">
                    <input type="text" name="" id="">
                    <p>例:44444444</p>
                </form>
            </div>
        </div>

        <!-- タイトル -->
        <div class="flex">
            <div class="text speace">
                <p>タイトル</p>
            </div> 
            <div class="speace">
                <form action="">
                    <input type="text" name="" id="">
                    <p>例:人が眠る</p>
                </form>
            </div>
        </div>

        <!-- キーワード -->
        <div class="flex">
            <div class="text speace">
                <p>キーワード</p>
            </div> 
            <div class="speace">
                <form action="">
                    <input type="text" value="東京都新宿区××××××××××××" name="" id="">
                </form>
            </div>
        </div>

        <!--  
            検索
            入力消去
            書籍情報変更 → S08(書籍情報変更)
        -->
        <div class="flex" id="koudoku_button">
            <a class="Button" href="">検索</a>
            <a class="Button" href="">入力消去</a>
            <a class="Button" href="S08.php">書籍情報変更</a>
        </div>

        <!-- テーブル -->
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>タイトル</th>
                    <th>著者名</th>
                    <th>出版社</th>
                </tr>
                <tr>
                    <td>test</td>
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
                    <td>　</td>
                </tr>
                <tr>
                    <td>　</td>
                    <td>　</td>
                    <td>　</td>
                    <td>　</td>
                    <td>　</td>
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