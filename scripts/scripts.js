$(function () {
    $('.dimiss-modal').click(() => {
      $('.modal').modal("hide")
    })
  })
  
  function abrirModalCadastro(idModal = 0) {
    if(idModal == 0) {
      // Limpar campos
      $('input[type=text]').val("")
      $('input[type=email]').val("")
      $('input[type=number]').val("")
      $('input[type=password]').val("")
      $('input[type=select]').val(0)
    }
  
    $(".idCadastro").val(idModal)
    $('#modalCadastro').modal('show')
  }
  
  function abrirModalInativar(idModal = 0) {
    $(".idCadastro").val(idModal)
    $('#modalInativar').modal('show')
  }
  
  function abrirModalAtivar(idModal = 0) {
    $(".idCadastro").val(idModal)
    $('#modalAtivar').modal('show')
  }