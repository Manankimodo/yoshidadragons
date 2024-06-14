/**
 * DB接続用JSファイル
 * 新規作成:Lyla Elysiohne
 * Date: 2024/06/14
 */

const mysql = require('mysql')

const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "????",
    datebese: "test"
});

connection.connect(function(err){
    if(err)throw err;
    console.log("Connected to Mysql DB!")
    
    //テーブルのデータを全件取得
    const sql = "SELEECT * FROM tes1_user";
    connection.query(sql,function(err,result){
        if(err)throw err;
        //全レコード
        comsole.log("Result:",result);
    })
})