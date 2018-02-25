<!DOCTYPE html>
<html lang="ko-KR">
<head>
	<meta charset="utf-8">
	<title>Application Promgramming Association</title>
	<link rel="shortcut icon" href="/css/img/favicon.ico"/>
	<meta name="description" content="The ALPA website's main pasge">
	<meta name="author" content="alpa20161104@gmail.com">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<!-- 구글 API 필수 // client id 바꿔주는게 좋을 것임.-->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://apis.google.com/js/api:client.js"></script>
	<script src="/js/gLogin.js"></script>


	<link rel="stylesheet" type="text/css" href="/css/topMenu.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/GLogin.css">

	<!-- IE9이하 HTML5 태그 지원 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js" type="text/javascript"></script>
	<script src="community.js" type="text/javascript"></script>

	<style>
		tr th{
			text-align: center;
		}
		th, td{
			padding-right: 20px;
			border: 2px solid black;
		}
	</style>
</head>
<body>

	<header id="name">

		<img id="headImg" src="/css/img/headImg.png"> <!-- 아무거나 넣었음 -->

		<h1><a id="Logo" href="index.html">ALPA</a></h1>

	</header>

	<div id="menu2">
		<div class="totalmenu">
			<nav id="topMenu">
				<ul>
					<li class="topMenuLi">
						<a  class="menuLink">About us</a>
						<ul class="submenu">
							<li><a href="introduction.html" class="submenuLink">Introduction</a></li>
							<li><a href="organization.html" class="submenuLink">Organization Chart</a></li>
							<li><a href="introproject.php" class="submenuLink">Project</a></li>
							<li><a href="https://goo.gl/forms/jqoQ3rOTxwnHBld73" class="submenuLink">Apply</a></li>
						</ul>
					</li>
					<li>|</li>
					<li class="topMenuLi">
						<a  class="menuLink">Notice</a>
						<ul class="submenu">
							<li><a href="notice.php" class="submenuLink">Notice</a></li>
							<li><a href="https://drive.google.com/drive/folders/0BwLt-eXTUGwAbmpmZ1BmekV6RTg" class="submenuLink">Accounting</a></li>
							<li><a href="https://drive.google.com/drive/folders/0BwLt-eXTUGwAemRoTjdKWmNhNTQ" class="submenuLink">Items</a></li>

						</ul>
					</li>
					<li>|</li>
					<li class="topMenuLi">
						<a  class="menuLink">Reference</a>
						<ul class="submenu">
							<li><a href="project.html" class="submenuLink">Project</a></li>
							<li><a href="seminar.html" class="submenuLink">Seminar</a></li>
							<li><a href="https://drive.google.com/drive/folders/0Bx-YhTmZR8KeVUZrT1NBUkZzdmM" class="submenuLink">Shared Folder</a></li>
						</ul>
					</li>
					<li>|</li>
					<li class="topMenuLi">
						<a  class="menuLink">Community</a>
						<ul class="submenu">
							<li><a href="community.php?field=0" class="submenuLink">Anonymous</a></li>
							<li><a href="community.php?field=1" class="submenuLink">Suggestion</a></li>
							<li><a href="community.php?field=2" class="submenuLink">Class Tip</a></li>
							<li><a href="community.php?field=3" class="submenuLink">Recruitment</a></li>
						</ul>
					</li>
					<li>|</li>
					<li class="topMenuLi">
						<a href="gallery.html" class="menuLink">Gallery</a>
					</li>
				</ul>
			</nav>
		<?php $field_num = $_GET["field"];

		$field_name;

		if($field_num == 0){
			$field_name = "Anonymous";
		} else if($field_num == 1){
			$field_name ="Suggestion";
		} else if($field_num == 2){
			$field_name ="Class Tip";
		} else if($field_num == 3){
			$field_name ="Recruitment";
		}

		$read_post = $_GET["postnum"];

		?>

			<div class="topMain">
				<ul>
					<p><?=$field_name?></p>
				</ul>
			</div>
		</div>

		<div class="data">
			<img id="pic" class="img-circle" width="100" height="100">

			<p id="email" class="alert alert-danger"></p>
			<button onclick="signOut()" class="btn btn-danger">SignOut</button>
		</div>

	</div>

  <?php
  $name = "alpaweb";

  try{
    if (!isset($_POST["title"]) || !isset($_POST["content"]) ){
			header("글 작성에 실패하였습니다.");
		    die("제목이나 글 내용을 반드시 입력해주세요.");
		}
    else{
      $title = $_POST["title"];
  		$content = $_POST["content"];

      $query_insert = "insert into post(title, content, writer, date, time, hits, field) values ('$title', '$content', 'geulims@gmail.com', curdate(), curtime(), 0, $field_num)";
      $set1 = "set session character_set_connection=utf8";
      $set2 = "set session character_set_results=utf8";
      $set3 = "set session character_set_client=utf8";
      $db = new PDO("mysql:dbname=$name", "root","mysql1104");
      $db->query($set1);
      $db->query($set2);
      $db->query($set3);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->query($query_insert);
    }
  }catch(PDOException $ex){
    echo "detail :".$ex->getMessage();
  }

  ?>
  <div>
		제목 : <?= $title ?><br />
		내용 : <?= $content ?><br />
		작성자 : <br />
	</div>
  <input type="button" value="글 목록" onClick="self.location='community.php?field=<?=$field_num?>';">
  <input type="button" value="수정">
  <input type="button" value="삭제">
</body>
</html>
