function abrirModalCadastroAula(idModal = 0) {
    var aula = dadosTela.find(dados => dados.id == idModal);

    $("#nome").val(aula.nome)
    $("#descricao").val(aula.descricao)
    $("#professor").val(aula.idPersonal)

    // Não alterar
    $(".idCadastro").val(idModal)
    $('#modalCadastro').modal('show')
  }