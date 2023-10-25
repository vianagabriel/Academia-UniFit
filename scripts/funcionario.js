function abrirModalCadastroFuncionario(idModal = 0) {
    var funcionario = dadosTela.find(dados => dados.id == idModal);

    $("#nome").val(funcionario.nome)
    $("#email").val(funcionario.email)
    $("#senha").val(funcionario.senha)

    // Não alterar
    $(".idCadastro").val(idModal)
    $('#modalCadastro').modal('show')
  }