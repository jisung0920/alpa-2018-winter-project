jQuery(function($) {
    var tocken = "4701109934.4a801b7.aedb336feda24fa291b5663c99d9cfef"; /* Access Tocken 입력 */
    var count = "all";  // 사진 몇개 가져올건지 정하면 될 듯
    $.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/users/self/media/recent/?access_token=" + tocken + "&count=" + count,
        success: function(response) { // 인스타에서 값 받아와서 html태그 생성해서 붙이기
         if ( response.data.length > 0 ) {
              for(var i = 0; i < response.data.length; i++) {
                   var insta = '<div class="insta-box">';
                   insta += "<a target='_blank' href='" + response.data[i].link + "'>";
                   insta += "<div class='image-layer'>";
                   //insta += "<img src='" + response.data[i].images.thumbnail.url + "'>";
                   insta += '<img src="' + response.data[i].images.thumbnail.url + '">';
                   insta += "</div>";
                   //console.log(response.data[i].caption.text);
                   if ( response.data[i].caption !== null ) {
                        insta += "<div class='caption-layer'>";
                        if ( response.data[i].caption.text.length > 0 ) {
                             insta += "<p class='insta-caption'>" + response.data[i].caption.text + "</p>"
                        }
                        insta += "<span class='insta-likes'>" + response.data[i].likes.count + " Likes</span>";
                        insta += "</div>";
                   }
                   insta += "</a>";
                   insta += "</div>";
                   $("#instaPics").append(insta);
              }
         }
         $(".insta-box").hover(function(){   // 마우스 오버 했을때 이벤트
              $(this).find(".caption-layer").css({"backbround" : "rgba(255,255,255,0.7)", "display":"block"});
         }, function(){
              $(this).find(".caption-layer").css({"display":"none"});
         });
        }
       });
});
