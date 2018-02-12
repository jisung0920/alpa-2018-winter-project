var googleUser = {};

var startApp = function() {
    gapi.load('auth2', function(){
      
      auth2 = gapi.auth2.init({
        client_id: '275450919441-sbr4ri09uabnfjsic949sjir534119n9.apps.googleusercontent.com',
        cookiepolicy: 'flHX2LHhHoAV0ZXcJ3aB6spN',
        
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

function attachSignin(element) {
 	console.log(element.id);
 	auth2.attachClickHandler(element, {},
 		function(googleUser) {
 		   var profile = googleUser.getBasicProfile();
 		   $("#gSignInWrapper").css("display","none");
 		   $(".data").css("display","block");
 		   $("#pic").attr('src',profile.getImageUrl());
 		   $("#email").text(profile.getEmail());
 		}, function(error) {
 			alert(JSON.stringify(error, undefined, 2));
 		});
}

function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function(){

		alert("로그 아웃!");

		$("#gSignInWrapper").css("display","block");
 		$(".data").css("display","none");
	})
}
