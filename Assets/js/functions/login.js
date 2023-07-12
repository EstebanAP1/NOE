$('#forgotBtn').click(function (e) {
    e.preventDefault();

    $('.loginSection').hide();
    $('.forgotSection').show();
});

$('#formLogin').on('submit', function (e) {
    e.preventDefault();

    $('#divLoading').css('display', 'flex');

    var sw = true;
    var formData = $('#formLogin').serializeArray();

    formData.forEach(data => {
        if (data.value == '') sw = false;
    });

    let valid = document.getElementsByClassName("valid");
    for (let i = 0; i < valid.length; i++) {
        if (valid[i].classList.contains('is-invalid')) {
            sw = false;
        }
    }

    if (sw) {
        var ajaxUrl = base_url + '/Login/loginUser';
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: formData,
            success: function (response) {
                $('#divLoading').css('display', 'none');

                var objData = JSON.parse(response);

                if (objData.status) {
                    window.location = objData.msg;
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: objData.msg
                    });
                    $('#txtPass').val('');
                }
            },
            error: function () {
                $('#divLoading').css('display', 'none');
                Swal.fire({
                    icon: 'error',
                    text: 'Ha ocurrido un error interno.'
                });
            }
        });
    } else {
        $('#divLoading').css('display', 'none');
        Swal.fire({
            icon: 'error',
            text: 'Por favor rellene correctamente todos los campos.'
        });
    }
});

$('#formReset').on('submit', function (e) {
    e.preventDefault();

    $('#divLoading').css('display', 'flex');

    var sw = true;
    var formData = $('#formReset').serializeArray();

    formData.forEach(data => {
        if (data.value == '') sw = false;
    });

    let valid = document.getElementsByClassName("valid");
    for (let i = 0; i < valid.length; i++) {
        if (valid[i].classList.contains('is-invalid')) {
            sw = false;
        }
    }

    if (sw) {
        var ajaxUrl = base_url + '/Login/resetPass';
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: formData,
            success: function (response) {
                $('#divLoading').css('display', 'none');

                var objData = JSON.parse(response);

                if (objData.status) {
                    Swal.fire({
                        icon: 'success',
                        text: objData.msg
                    }).then(() => {
                        window.location = base_url;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: objData.msg
                    });
                }
            },
            error: function () {
                $('#divLoading').css('display', 'none');
                Swal.fire({
                    icon: 'error',
                    text: 'Ha ocurrido un error interno.'
                });
            }
        });
    } else {
        $('#divLoading').css('display', 'none');
        Swal.fire({
            icon: 'error',
            text: 'Por favor rellene correctamente todos los campos.'
        });
    }
});

$('#formChangePass').on('submit', function (e) {
    e.preventDefault();

    $('#divLoading').css('display', 'flex');

    var sw = true;
    var passSw = true;
    var formData = $('#formChangePass').serializeArray();

    if (formData[0].value != formData[1].value) {
        $('#divLoading').css('display', 'none');
        passSw = false;
        Swal.fire({
            icon: 'error',
            text: 'Las contraseñas no coinciden.'
        });
    } else if (formData[0].value.length < 5 || formData[1].value.length < 5) {
        $('#divLoading').css('display', 'none');
        passSw = false;
        Swal.fire({
            icon: 'error',
            text: 'Las contraseñas deben tener al menos 5 caracteres.'
        });
    }

    formData.forEach(data => {
        if (data.value == '') sw = false;
    });

    let valid = document.getElementsByClassName("valid");
    for (let i = 0; i < valid.length; i++) {
        if (valid[i].classList.contains('is-invalid')) {
            sw = false;
        }
    }

    if (sw && passSw) {
        var ajaxUrl = base_url + '/Login/setPass';
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: formData,
            success: function (response) {
                var objData = JSON.parse(response);
                $('#divLoading').css('display', 'none');
                if (objData.status) {
                    Swal.fire({
                        icon: 'success',
                        text: objData.msg
                    }).then(() => {
                        window.location = objData.url;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: objData.msg
                    });
                }
            },
            error: function () {
                $('#divLoading').css('display', 'none');
                Swal.fire({
                    icon: 'error',
                    text: 'Ha ocurrido un error interno.'
                });
            }
        });
    } else if (passSw) {
        $('#divLoading').css('display', 'none');
        Swal.fire({
            icon: 'error',
            text: 'Por favor rellene correctamente todos los campos.'
        });
    }
});