<!DOCTYPE html>
<html lang= "ja">
    <head>
        <meta charset = "utf-8">
        <title>データベースに接続する</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div>
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
                $pdo = NULL;
            } catch (Exception $e) {
                echo "<span class='error'>エラーがありました。</span><br>";
                echo $e->getMessage();
                exit();
            }
            ?>
        </div>
    </body>

</html>