//Jquery Functions
var main=function(){
 $('li').click(function(){
  $('li').removeClass('active');
  $(this).addClass('active');
 });
}
$(document).ready(main);