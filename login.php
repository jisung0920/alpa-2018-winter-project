<!DOCTYPE html>
<html lang="ko-KR">

<head>

	<title>Application Promgramming Association</title>
	<link rel="shortcut icon" href="/css/img/favicon.ico" />
	<meta charset="utf-8">
	<meta name="description" content="The ALPA website's main pasge">
	<meta name="author" content="alpa20161104@gmail.com">


	<!-- 구글 API 필수 // client id 바꿔주는게 좋을 것임.-->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://apis.google.com/js/api:client.js"></script>


	<link rel="stylesheet" type="text/css" href="/css/topMenu.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/GLogin.css">


	<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
	<script>
		// Initialize Firebase
		var config = {
			apiKey: "AIzaSyBWvRG_66XFJGwLXUKhTkVIlLr_GU3bTfI",
			authDomain: "alpawebapplication.firebaseapp.com",
			databaseURL: "https://alpawebapplication.firebaseio.com",
			projectId: "alpawebapplication",
			storageBucket: "",
			messagingSenderId: "275450919441"
		};
		firebase.initializeApp(config);
	</script>
	<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-auth.js"></script>

	<!-- IE9이하 HTML5 태그 지원 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<iframe name="beombeom" style="display:none" action="notice.php"></iframe>
<form name="beom" action="notice.php" method="post">
	<input type="hidden" name="tt" >
</form>
<script> 

var js_user_id;
function _signIn() {
	var provider = new firebase.auth.GoogleAuthProvider();
	firebase.auth().signInWithPopup(provider).then(function (result) {
		// This gives you a Google Access Token. You can use it to access the Google API.
		var token = result.credential.accessToken;
		// The signed-in user info.
		var user = result.user;
        console.log(user);
        js_user_id = user.email;
		document.getElementById('btnText').textContent = user.displayName;
		// for ( var i = 0; i < no_login.length; i++) {
		// 	no_login[i].attributes[0].nodeValue = url[i];
		// 	console.log(no_login[i]);
			
		// }

	var ff = document.beom; 
	ff.target = "beombeom";
	ff.action = "notice.php";
	console.log(ff);
	console.log('123');
	
	console.log(js_user_id);
	console.log(ff.tt.value);
	
	ff.tt.value = js_user_id;
	console.log(ff.tt.value);
	
ff.submit(); 
console.log('submit');

		// ...
	}).catch(function (error) {
		// Handle Errors here.
		var errorCode = error.code;
		var errorMessage = error.message;
		// The email of the user's account used.
		var email = error.email;
		// The firebase.auth.AuthCredential type that was used.
		var credential = error.credential;

		// ...
	});

	var user = firebase.auth().currentUser;

	if (user) {
		console.log(1);

		// User is signed in.
	} else {
		console.log(2);

		// No user is signed in.
	}
}

// function signIn() {
	firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
			.then(function () {

				return _signIn();
			})
			.catch(function (error) {
				// Handle Errors here.
				var errorCode = error.code;
				var errorMessage = error.message;
			});
// }
</script>

<?php 

$name = "alpaweb";

try{

$query = "select * from user";
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

global $size, $user_id, $login_id;
foreach ($rows as $row) {
  $size ++;
  $user_id[] = $row['id'];

}

}catch(PDOException $ex){
echo "detail :".$ex->getMessage();
}

$login_id = '<script>js_user_id</script>';
$flag = false;
foreach ($user_id as $id) {
  if($id == $login_id) {
    $flag = true;
  }
  }
$flag = false;
?>
<!-- 
<iframe name="f" action="notice.php" method="post">
	<input type="hidden" name="tt" >
</iframe> -->

<!-- <script>
	var f = document.f; 
	console.log(f);
	console.log(js_user_id);
	
	f.tt.value = js_user_id;
f.submit(); 

</script> -->
	<header id="name">

		<img id="headImg" src="/css/img/headImg.png">
		<!-- 아무거나 넣었음 -->
		<h1>
			<a id="Logo" href="index.html">ALPA</a>
		</h1>


	</header>

	<div id="mainWrapper">

		<nav id="topMenu">
			<ul>
				<li class="topMenuLi">
					<a class="menuLink">About us</a>
					<ul class="submenu">
						<li>
							<a href="introduction.html" class="submenuLink">Introduction</a>
						</li>
						<li>
							<a href="organization.html" class="submenuLink">Organization Chart</a>
						</li>
						<li>
							<a href="introproject.php" class="submenuLink">Project</a>
						</li>
						<li>
							<a href="https://goo.gl/forms/jqoQ3rOTxwnHBld73" class="submenuLink">Apply</a>
						</li>
					</ul>
				</li>
				<li>|</li>
				<li class="topMenuLi">
					<a class="menuLink">Notice</a>
					<ul class="submenu">
                        <?php if($flag) { ?>
						<li>
							<a href="notice.php" class="submenuLink no_login">Notice</a>
						</li>
						<li>
							<a href="https://drive.google.com/drive/folders/0BwLt-eXTUGwAbmpmZ1BmekV6RTg" class="submenuLink no_login">Accounting</a>
						</li>
						<li>
							<a href="https://drive.google.com/drive/folders/0BwLt-eXTUGwAemRoTjdKWmNhNTQ" class="submenuLink no_login">Items</a>
						</li>
                        <?php }else{ ?>
                            <li>
							<a href="/" class="submenuLink no_login">Notice</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Accounting</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Items</a>
						</li>
                        <?php } ?>
					</ul>
				</li>
				<li>|</li>
				<li class="topMenuLi">
					<a class="menuLink">Reference</a>
					<ul class="submenu">
                        <?php if($flag) { ?>
						<li>
							<a href="project.html" class="submenuLink no_login">Project</a>
						</li>
						<li>
							<a href="seminar.html" class="submenuLink no_login">Seminar</a>
						</li>
						<li>
							<a href="https://drive.google.com/drive/folders/0Bx-YhTmZR8KeVUZrT1NBUkZzdmM" class="submenuLink no_login">Shared Folder</a>
                        </li><?php }else{ ?>
                            <li>
							<a href="/" class="submenuLink no_login">Project</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Seminar</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Shared Folder</a>
                        </li>
                        <?php } ?>
					</ul>
				</li>
				<li>|</li>
				<li class="topMenuLi">
					<a class="menuLink">Community</a>
					<ul class="submenu">
                    <?php if($flag) { ?>

						<li>
							<a href="community.php?field=0" class="submenuLink no_login">Anonymous</a>
						</li>
						<li>
							<a href="community.php?field=1" class="submenuLink no_login">Suggestion</a>
						</li>
						<li>
							<a href="community.php?field=2" class="submenuLink no_login">Class Tip</a>
						</li>
						<li>
							<a href="community.php?field=3" class="submenuLink no_login">Recruitment</a>
                        </li><?php }else{ ?>
                            
						<li>
							<a href="/" class="submenuLink no_login">Anonymous</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Suggestion</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Class Tip</a>
						</li>
						<li>
							<a href="/" class="submenuLink no_login">Recruitment</a>
                        </li>
                        <?php } ?>
					</ul>
				</li>
				<li>|</li>
				<li class="topMenuLi">
					<a href="gallery.html" class="menuLink">Gallery</a>
				</li>
			</ul>
		</nav>


		<div id="gSignInWrapper">

			<div id="customBtn" class="customGPlusSignIn">
				<img id="icon" src='css/img/g-normal.png' />
				<span onclick="signIn()" id="btnText" class="btnText">Google Sign-in</span>
			</div>
			<div class="data">
				<img id="pic" class="img-circle" width="100" height="100">
				<p id="email" class="alert alert-danger"></p>
				<button onclick="signOut()" class="btn btn-danger">SignOut</button>
			</div>
		</div>

		<!-- <script>

			document.getElementById('customBtn').addEventListener('click', function(){
				var provider = new firebase.auth.GoogleAuthProvider();
			firebase.auth().signInWithPopup(provider).then(function(result) {
				// This gives you a Google Access Token. You can use it to access the Google API.
				var token = result.credential.accessToken;
				// The signed-in user info.
				var user = result.user;
				console.log(user);
				document.getElementById('btnText').textContent = user.displayName;
				// ...
			  }).catch(function(error) {
				// Handle Errors here.
				var errorCode = error.code;
				var errorMessage = error.message;
				// The email of the user's account used.
				var email = error.email;
				// The firebase.auth.AuthCredential type that was used.
				var credential = error.credential;
				// ...
			  });
			});
			function signOut(){
				firebase.auth().signOut().then(function() {
  // Sign-out successful.
}).catch(function(error) {
  // An error happened.
});
			}
			</script> -->
		<!-- <div id="gSignInWrapper">
			<span class="lable">Sign in:</span>
			<div id="customBtn" class="customGPlusSignIn">
				<span class="icon"></span>
				<span class="btnText">Google</span>
			</div>
			<script>
				startApp();
			</script>
			<div class="data">
				<img id="pic" class="img-circle" width="100" height="100">
				<p id="email" class="alert alert-danger"></p>
				<button onclick="signOut()" class="btn btn-danger">SignOut</button>
			</div>
		</div> -->


	</div>

<!-- <script src="/js/gLogin.js"></script> -->

</body>

</html>