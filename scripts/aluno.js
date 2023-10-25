function abrirModalCadastroAluno(idModal = 0) {
    var aluno = dadosTela.find(dados => dados.id == idModal);

    $("#nome").val(aluno.nome)
    $("#telefone").val(aluno.telefone)
    $("#email").val(aluno.email)

    // Não alterar
    $(".idCadastro").val(idModal)
    $('#modalCadastro').modal('show')
  }