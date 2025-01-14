$(function () {
  // Função para o radio do curso
  curso();
  $(".radiocurso").change(curso);
  function curso() {
    if($("#nivelAluno").is(':checked')){
      $("#displaycurso").css("display", "block");
    }else{
      $("#displaycurso").css("display", "none");
    }
  };

  // Função para o radio de edição
  edicao();
  $(".radioedicao").change(edicao);
  function edicao() {
    var inputs = document.querySelectorAll(".campo");
    if($("#edicaoHabilitado").is(':checked')){
      for (var i = 0; i < inputs.length; i++) $(inputs[i]).prop("disabled", false);
    }else{
      for (var i = 0; i < inputs.length; i++)  $(inputs[i]).prop("disabled", true);
    }
  };
});