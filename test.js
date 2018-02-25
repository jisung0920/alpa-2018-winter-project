// window.onload = function(){
//   var table = document.getElementId("community_table");
//
// }

function ShowPost(obj) {
  var table = document.getElementId("community_table");
  var tr = table.getElementsByTagName("tr");
  for(var i=0; i<tr.length; i++){
    tr[i].style.background = "white";
  }
  obj.style.backgroundColor = "#FCE6E0";
}
