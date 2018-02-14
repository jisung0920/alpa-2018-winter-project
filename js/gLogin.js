// var googleUser = {};

// var startApp = function() {
//     gapi.load('auth2', function(){

//       auth2 = gapi.auth2.init({
//         client_id: '275450919441-sbr4ri09uabnfjsic949sjir534119n9.apps.googleusercontent.com',
//         cookiepolicy: 'flHX2LHhHoAV0ZXcJ3aB6spN',

//       });
//       attachSignin(document.getElementById('customBtn'));
//     });
//   };

// function attachSignin(element) {
//  	console.log(element.id);
//  	auth2.attachClickHandler(element, {},
//  		function(googleUser) {
//  		   var profile = googleUser.getBasicProfile();
//  		   $("#gSignInWrapper").css("display","none");
//  		   $(".data").css("display","block");
//  		   $("#pic").attr('src',profile.getImageUrl());
//  		   $("#email").text(profile.getEmail());
//  		}, function(error) {
//  			alert(JSON.stringify(error, undefined, 2));
//  		});
// }

// function signOut() {
// 	var auth2 = gapi.auth2.getAuthInstance();
// 	auth2.signOut().then(function(){

// 		alert("로그 아웃!");

// 		$("#gSignInWrapper").css("display","block");
//  		$(".data").css("display","none");
// 	})
// }


document.getElementById('customBtn').addEventListener('click', function () {
	var provider = new firebase.auth.GoogleAuthProvider();
	firebase.auth().signInWithPopup(provider).then(function (result) {
		// This gives you a Google Access Token. You can use it to access the Google API.
		var token = result.credential.accessToken;
		// The signed-in user info.
		var user = result.user;
		console.log(user);
		document.getElementById('btnText').textContent = user.displayName;
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
});

function signOut() {
	firebase.auth().signOut().then(function () {
		// Sign-out successful.
	}).catch(function (error) {
		// An error happened.
	});
}
