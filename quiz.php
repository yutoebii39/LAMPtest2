<?php
  ini_set("display_errors",true);
  require("quiz/php/db.php");//php/db.phpのファイルを実行
  
  if(isset($_POST["answer"])){
    $answer = $_POST["answer"];
  }else {
    $answer = "";
  }

  setcookie('answer',$answer);

  $level = (int)$_GET["level"];
  $bangou = (int)$_GET["bangou"];
  
  try{
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      $stmt = $pdo->query("select question,s1,s2,s3,s4 from quiz where level=$level and bangou=$bangou");
      $mondai = $stmt->fetch(PDO::FETCH_ASSOC);
    
      $bangou++;

      if(!isset($mondai["question"])){
        $url = "Location: kotae.php?level=".$level;
        header($url);
      }

  }catch(PDOException $e){
  echo "エラー:".$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>壱岐の高校生たちがHP作ってみた！</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="高校生達が自分たちの地域のHPを作ってみた。">
<meta name="keywords" content="壱岐,高校生,壱岐商業,観光,HP制作,HTML,LAMP,CSS">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/quiz.css">
<link rel="icon" href="base/ikifavicon1.png">
<script src="js/openclose.js"></script>
<script src="js/fixmenu.js"></script>
<script src="js/fixmenu_pagetop.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="container">

<header id="header">
<h1 id="logo"><a href="index.html"><img src="images/ikiisland1.png" alt="ikiisland"></a></h1>
<!--
<ul class="icon">
<li><a href="#"><img src="images/icon_facebook.png" alt="Facebook"></a></li>
<li><a href="#"><img src="images/icon_twitter.png" alt="Twitter"></a></li>
<li><a href="#"><img src="images/icon_instagram.png" alt="Instagram"></a></li>
<li><a href="#"><img src="images/icon_youtube.png" alt="TouTube"></a></li>
</ul>-->
</header>

<!--PC用（801px以上端末）メニュー-->
<nav id="menubar" class="nav-fix-pos">
	<ul>
		<li><a href="index.html">Home<span>ホーム</span></a></li>
		<li><a href="loocalfood.html">Local food<span>郷土料理</span></a></li>
		<li><a href="souvenir.html">Souvenir<span>お土産</span></a></li>
		<li><a href="shrine.html">Shrine<span>神社</span></a></li>
		<li class="current"><a href="contact.html">Dialect<span>方言</span></a></li>
	</ul>
	</nav>
	
	<!--小さな端末用（900px以下端末）メニュー-->
	<nav id="menubar-s">
	<ul>
		<li><a href="index.html">Home<span>ホーム</span></a></li>
		<li><a href="loocalfood.html">Local food<span>郷土料理</span></a></li>
		<li><a href="souvenir.html">Souvenir<span>お土産</span></a></li>
		<li><a href="shrine.html">Shrine<span>神社</span></a></li>
		<li class="current"><a href="contact.html">Dialect<span>方言</span></a></li>
	</ul>
	</nav>
  <div class="all">
  <p class="mondai"><!--<span class="m1">問題！</span><br>--><?php echo $mondai["question"]?>の意味は<span class="m2">何でしょう？</span></p>
<div class="button">
  <form action="quiz.php?<?php echo "bangou=".$bangou."&level=".$level;?>" method="POST">
  <input type="hidden" name="answer" value="<?php echo $answer."1"; ?>">
  <button class="ichi" type="submit">1:<?php echo $mondai["s1"] ?></button>
  </form>

  <form action="quiz.php?<?php echo "bangou=".$bangou."&level=".$level;?>" method="POST">
  <input type="hidden" name="answer" value="<?php echo $answer."2"; ?>">
  <button type="submit">2:<?php echo $mondai["s2"] ?></button>
  </form>

  <form action="quiz.php?<?php echo "bangou=".$bangou."&level=".$level;?>" method="POST">
  <input type="hidden" name="answer" value="<?php echo $answer."3"; ?>">
  <button type="submit">3:<?php echo $mondai["s3"] ?></button>
  </form>

  <form action="quiz.php?<?php echo "bangou=".$bangou."&level=".$level;?>" method="POST">
  <input type="hidden" name="answer" value="<?php echo $answer."4"; ?>">
  <button type="submit">4:<?php echo $mondai["s4"] ?></button>
  </form>
</div>
 <br>
  <br>
  <br>
  <br>
  </div>
  <footer>
<ul>
<li><a href="index.html">ホーム</a></li>
<!--<li><a href="company.html">運営会社</a></li>
<li><a href="contact.html">お問合せ</a></li>-->
</ul>
<small>Copyright&copy; <a href="index.html">IKI Island</a>壱岐の高校生たちがHPを作ってみた！</small>
<span class="pr"><a href="https://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
</footer>
</div>
<!--/#container-->

<!--ページの上部に戻る「↑」ボタン-->
<p class="nav-fix-pos-pagetop"><a href="#"><img src="images/pagetop.png" alt="ページの上部へ"></a></p>

<!--メニュー開閉ボタン-->
<div id="menubar_hdr" class="close"></div>

<!--メニューの開閉処理条件設定　800px以下-->
<script>
if (OCwindowWidth() <= 800) {
	open_close("menubar_hdr", "menubar-s");
}
</script>
</body>
</html>