function abrirModalCadastroPlano(idModal = 0) {
    var aluno = dadosTela.find(dados => dados.id == idModal);

    $("#nome").val(aluno.nome)
    $("#valor").val(aluno.valor)
    $("#descricao").val(aluno.descricao)
    console.log(idModal)
    // Não alterar
    $(".idCadastro").val(idModal)
    $('#modalCadastro').modal('show')
  }