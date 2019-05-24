function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
let buttonSubmit = $("#buttonSubmit");

buttonSubmit.click(function () {
  buttonSubmit.attr("hidden", "true");
  let informationAlert = $("#informationAlert");
  let usuario = $("#inputEmail").val();
  let password = $("#inputPassword").val();
  if (usuario == "" || password == "") {
    informationAlert.removeAttr("hidden");
    informationAlert.text("Correo y Contraseña requeridos");
    buttonSubmit.removeAttr("hidden");
    return false;
  }
  if (!validateEmail(usuario)) {
    informationAlert.removeAttr("hidden");
    informationAlert.text("El campo de Correo es erróneo");
    buttonSubmit.removeAttr("hidden");
    return false;
  }
  informationAlert.attr("hidden", "true");

  let usr_data = {
    "accion": "login",
    "usuario": usuario,
    "password": password
  };
  console.log("Aqui se ejecuta la validacion");


  $.ajax({
      data: usr_data,
      type: "POST",
      dataType: "json",
      url: "../back-core/login.php"
    })
    .done((data) => {
      console.log("Conexión correcta ", data);
      if (data.status != 1) {
        $('#buttonSubmit').removeAttr("hidden");
        $('#buttonError').removeAttr("hidden");
      } else {
        $('#buttonError').attr("hidden", "true");
        $('#buttonOk').removeAttr("hidden");

        switch (data.type) {
          case '1':
            setTimeout(function () {
              location.href = './admin/?mod=1';
            }, 1000);
            break;
          case '2':
            setTimeout(function () {
              location.href = './coord/?mod=1';
            }, 1000);
            break;
          case '3':
            setTimeout(function () {
              location.href = './user/?mod=1';
            }, 1000);
            break;
          default:
            location.href = '../auth/404.php';
            break;
        }
        /*setTimeout(function () {
          location.href = './user/?mod=1';
        }, 1000);*/
      }
    })
    .fail(() => {
      console.log("Error en conexión");
      $('#buttonSubmit').removeAttr("hidden");
      $('#buttonError').removeAttr("hidden");
    })

  // Mostrar mensaje de error
  // Redireccionar a usuarios.php
});