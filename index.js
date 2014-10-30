//Jquery Functions for index page
var main=function(){
 $('li').click(function(){
  $('li').removeClass('active');
  $(this).addClass('active');
 });
}
$(document).ready(main);
