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
            $user = 'testuser';
            $password = 'pw4testuser';
            // 利用するデータベース利用するデータベース
            $host = 'localhost:3306';
            //MySQLのDSN文字列
            $dsn = "mysql:host={$host};dbname={$bdName};charset=utf8"

            try {
                $pdo = new PDO($dsn, $user, $password);
                // プリペアドステートメントのエミュレーションを無効にする
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                // 例外がスローされる設定にする
                $pdo->setAttribute()
            } catch (\Throwable $th) {
                //throw $th;
            }

                


            ?>
        </div>
    </body>

</html>