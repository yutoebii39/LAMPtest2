<?php
//データベースを読み込み。ここでパスを入れておけば複数のファイルを一括で変更できる。

//※※ユーザー名を自分の物に変更してください
// $pdo = new PDO ("sqlite:/home/「ユーザー名」/LAMPProject/keizi_sample/database.db");
//↓サンプル（ユーザー名がchiyodaの場合）
$pdo = new PDO ("sqlite:quiz/database.db");


//※実装する場合は、以下の場所にdatabase.dbを作ったはずなので、以下の値にする
//$pdo = new PDO ('sqlite:/home/「ユーザー名」/PHP/database.db');

//※PHPのみの文（HTMLが入っていない文）の場合は？＞が不要