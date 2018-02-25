<!DOCTYPE html>
<html lang="ko-KR">
<head>

	<title>Application Promgramming Association</title>
	<link rel="shortcut icon" href="/css/img/favicon.ico"/>
	<meta charset="utf-8">
	<meta name="description" content="The ALPA website's main pasge">
	<meta name="author" content="alpa20161104@gmail.com">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<!-- 구글 API 필수 // client id 바꿔주는게 좋을 것임.-->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://apis.google.com/js/api:client.js"></script>
	<script src="/js/gLogin.js"></script>


	<link rel="stylesheet" type="text/css" href="/css/topMenu.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
  <link rel="stylesheet" type="text/css" href="/css/GLogin.css">
  <link rel="stylesheet" type="text/css" href="/css/intro.css">


	<!-- IE9이하 HTML5 태그 지원 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
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
			<div class="topMain">
				<ul>
					<p>Project</p>
				</ul>

			</div>
		</div>


	</div>

<!--  video example code   src is video link, poster is img link -->

  <?php
  $name = "alpaweb";

  try{

    $query = "select * from projectlist";
    $set1 = "set session character_set_connection=utf8";
    $set2 = "set session character_set_results=utf8";
    $set3 = "set session character_set_client=utf8";
    $db = new PDO("mysql:dbname=$name", "root","mysql1104");
    $db->query($set1);
    $db->query($set2);
    $db->query($set3);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $rows = $db->query($query);


    $size=0;
    global $size, $post_name, $post_date, $post_content, $post_category, $post_term, $post_language, $post_contributer,$post_video,$post_img;
    foreach ($rows as $row) {
      $size ++;
      $post_name[] = $row['name'];
      $post_video[] = $row['videolink'];
      $post_img[] = $row['imagelink'];
      $post_content[] = $row['content'];
      $post_category[] = $row['category'];
      $post_language[] = $row['language'];
    }

  }catch(PDOException $ex){
    echo "detail :".$ex->getMessage();
  }

  ?>

  <div>


			<style>

			</style>

<ul class="card">

            <?php
              for($i=0; $i<$size; $i++){
                ?>

							<li class="item">
		<div class="demo-card-square mdl-card mdl-shadow--2dp">
			<div class="mdl-card__title mdl-card--expand">
										<h2 class="mdl-card__title-text" ><?=$post_name[$i]?></h2>

									  <?php
                    $comp = "null";
                    if($post_video[$i] == $comp){?>
											<video id="videoSet"
															poster="css/img/<?=$post_img[$i]?>" >
											</video>
                    <?php } ?>

                    <?php
                    $comp = "null";
                    if($post_video[$i] != $comp){?>
                        <video id="videoSet" src="css/video/<?=$post_video[$i]?>"
                                poster="css/img/<?=$post_img[$i]?>" controls muted preload = "auto">
                        </video>
                    <?php } ?>


			</div>
									<div class="mdl-card__supporting-text">
										<?=$post_content[$i]?>
									</div>

									<div class="mdl-card__actions mdl-card--border">
										<div class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" >
											<br></br>
											<p id="text">언어</p>
											<p id="con_text"><?=$post_language[$i]?></p>
											<p id="text">구분</p>
											<p id="con_text"><?=$post_category[$i]?></p>
										</div>

													</div>
												</div>
											</li>
                <?php
              }
            ?>




</ul>

  </div>


</body>
</html>
