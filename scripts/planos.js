function abrirModalCadastroPlano(idModal = 0) {
    var plano = dadosTela.find(dados => dados.id == idModal);

    $("#nome").val(plano.nome)
    $("#valor").val(plano.telefone)
    $("#descricao").val(plano.email)

    // Não alterar
    $(".idCadastro").val(idModal)
    $('#modalCadastro').modal('show')
  }