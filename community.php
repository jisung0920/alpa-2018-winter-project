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
</head>
<body>

	<header id="name">

		<img id="headImg" src="/css/img/headImg.png"> <!-- 아무거나 넣었음 -->
		<h1><a id="Logo" href="index2.html">ALPA</a></h1>

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
						<li><a href="introproject.html" class="submenuLink">IntroProject</a></li>
						<li><a href="apply.html" class="submenuLink">Apply</a></li>
					</ul>
				</li>
				<li>|</li>
				<li class="topMenuLi">
					<a  class="menuLink">Notice</a>
					<ul class="submenu">
						<li><a href="notice.html" class="submenuLink">Notice</a></li>
						<li><a href="capital.html" class="submenuLink">Capital</a></li>
						<li><a href="supplies.html" class="submenuLink">Supplies</a></li>

					</ul>
				</li>
				<li>|</li>
				<li class="topMenuLi">
					<a  class="menuLink">Reference</a>
					<ul class="submenu">
						<li><a href="project.html" class="submenuLink">Project</a></li>
						<li><a href="seminar.html" class="submenuLink">Seminar</a></li>
						<li><a href="sharedfolder.html" class="submenuLink">Shared Folder</a></li>
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
		$query = "select * from post where field = $field_num";
		$db = new PDO("mysql:dbname=$name", "root","mysql1104");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$rows = $db->query($query);

		global $size, $post_num, $post_writer, $post_title, $post_date, $post_time, $post_hits;
		$size=0;
		foreach ($rows as $row) {
			$size ++;
			$post_num[] = $row['num'];
			$post_writer[] = $row['writer'];
			$post_title[] = $row['title'];
			$post_date[] = $row['date'];
			$post_time[] = $row['time'];
			$post_hits[] = $row['hits'];
		}

	}catch(PDOException $ex){
		echo "detail :".$ex->getMessage();
	}

	?>

	<div class="community">
		<table id="community_table">
			<tr>
				<th>글번호</th>
				<?php if($field_num !== 0){ ?>
					<th><?=작성자?></th>
				<?php } ?>
				<th>제목</th>
				<th>게시날짜</th>
				<th>게시시간</th>
				<th>조회수</th>
			</tr>

			<?php
				for($i=0; $i<$size; $i++){
					?>
					<tr >
						<td><?=$i+1?></td>
						<?php if($field_num !== 0){ ?>
							<td><?=$post_writer[$i]?></td>
						<?php } ?>
						<td onclick="javascript:ShowPost(this);"><?=$post_title[$i]?></td>
						<td><?=$post_date[$i]?></td>
						<td><?=$post_time[$i]?></td>
						<td><?=$post_hits[$i]?></td>
					</tr>
					<?php
				}
			?>
		</table>
	</div>

	<div class="posting">
		<fieldset>
			<select name="post_field">
				<option>익명게시판</option>
				<option>건의사항</option>
				<option>강의자료 및 팁</option>
				<option>프로젝트 구인</option>
			</select><br />
			<label>작성자 이름</label><input type="text" name="writer"><br />
			<label>제목</label><input type="text" name="title"><br />
			<textarea name="post" rows="8" cols="80">여기에 글을 입력하세요.</textarea>
		</fieldset>
	</div>

</body>
</html>
