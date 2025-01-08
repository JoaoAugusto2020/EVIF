$(function () {
  let valor = 1;
  $("#olho").click( function() {
    if (valor%2 == 0) {
      $("#senha").attr("type","password");
      $("#olho").attr("src", "visao/img/icones/olho-aberto.png");
    } else {
      $("#senha").attr("type", "text");
      $("#olho").attr("src", "visao/img/icones/olho-fechado.png");
    }

    valor++;
  });
});