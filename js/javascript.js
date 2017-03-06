/* var posBan=0, ban, delai, msgBan;
msgBan="Ce site est en développement !";
function banniere() {
  delai = 100;
  if (posBan >= msgBan.length)
    posBan = 0;
  else if (posBan == 0) {
    msgBan = '        ' + msgBan;
    while (msgBan.length < 128)
      msgBan += '        ' + msgBan;
  }
  document.formBan.Fbanniere.value = msgBan.substring(posBan,posBan+msgBan.length);
  posBan++;
  ban = setTimeout("banniere(delai)",delai);
} */

var timerIn = 200;
var timerOut = 200;
$('ul.nav li.dropdown').hover(function() {
    $(this).find('> .dropdown-menu').stop(true, true).fadeIn(timerIn);
    $(this).addClass('open');
}, function() {
    $(this).find('> .dropdown-menu').stop(true, true).fadeOut(timerOut);
    $(this).removeClass('open');
});