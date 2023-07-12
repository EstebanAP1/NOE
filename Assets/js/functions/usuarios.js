var tableUsuario;

$(function () {
    $("[data-toggle='tooltip']").tooltip();

    var ajaxUrl = base_url + '/Roles/getSelectRoles';
    $.ajax({
        type: "GET",
        url: ajaxUrl,
        success: function (response) {
            $('#listRol').html(response);
            $('#listRol').selectpicker('refresh');
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                text: 'Ha ocurrido un error interno.'
            });
        }
    });

    tableUsuario = $('#tableUsuario').DataTable({
        aProccesing: true,
        aServerSide: true,
        language: {
            'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        ajax: {
            'url': base_url + '/Usuarios/getUsuarios',
            'dataSrc': ''
        },
        columns: [
            { 'data': 'numeracion' },
            { 'data': 'username' },
            { 'data': 'id_user' },
            { 'data': 'nombres' },
            { 'data': 'nombrerol' },
            { 'data': 'estado' },
            { 'data': 'acciones' }
        ],
        responsive: true,
        bDestroy: true,
        autoWidth: false,
        iDisplayLength: 10,
        order: [[2, 'asc']],
        initComplete: function () {
            $("[data-toggle='tooltip']").tooltip();
        }
    });
    tableUsuario.on('order.dt search.dt', function () {
        let i = 1;

        tableUsuario.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
});

var formUsuario = $('#formUsuario').on('submit', function (e) {
    e.preventDefault();

    $('#divLoading').css('display', 'flex');

    var sw = true;
    var formData = $('#formUsuario').serializeArray();

    formData.forEach(data => {
        if (data.name != 'txtPass' && data.name != 'idUsuario' && data.value == '') sw = false
    });

    let valid = document.getElementsByClassName("valid");
    for (let i = 0; i < valid.length; i++) {
        if (valid[i].classList.contains('is-invalid')) {
            sw = false;
        }
    }

    if (sw) {
        var ajaxUrl = base_url + '/Usuarios/setUsuario';
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: formData,
            success: function (response) {
                $('#divLoading').css('display', 'none');

                var objData = JSON.parse(response);
                if (objData.status) {
                    $('.modalFormUsuario').modal('hide');
                    $('#formUsuario').trigger('reset');
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuarios',
                        text: objData.msg
                    });
                    tableUsuario.ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuarios',
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
            title: 'Usuarios',
            text: 'Por favor rellene todos los campos correctamente.'
        });
    }
})

$('#btnCreateUser').click(function () {
    $('#formUsuario').trigger('reset');

    $('#titleModal').text('Crear usuario');
    document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
    document.querySelector("#btnActionForm").classList.replace("btn-warning", "btn-primary");
    $('#idUsuario').val('');
    $('#txtId').removeAttr('readonly');
    $('#listRol').selectpicker('refresh');
    $('#listEstado').selectpicker('refresh');
    $('#btnText').text('Guardar');

    $('.valid').removeClass('is-invalid');

    $('.modalFormUsuario').modal('show');
});

$('#tableUsuario').on('click', 'button.btnViewUsuario', function () {
    var datos = tableUsuario.row($(this).parents('tr')).data();

    var ajaxUrl = base_url + '/Usuarios/getUsuario/' + datos.id_user;
    $.ajax({
        type: "GET",
        url: ajaxUrl,
        success: function (response) {
            var objData = JSON.parse(response);
            if (objData.status) {
                var datos = objData.msg;
                datos.estado = datos.estado == 1 ? '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';
                $('#celId').text(datos.id_user);
                $('#celUsuario').text(datos.username);
                $('#celNombre').text(datos.nombres);
                $('#celRol').text(datos.nombrerol);
                $('#celEstado').html(datos.estado);
                $('#celCreated').text(datos.datecreated);
                $('#celUpdated').text(datos.dateupdated);
                $('.modalViewUsuario').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Usuarios',
                    text: objData.msg
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                text: 'Ha ocurrido un error interno.'
            });
        }
    });
})

$('#tableUsuario').on('click', 'button.btnEditUsuario', function () {
    var datos = tableUsuario.row($(this).parents('tr')).data();

    $('#titleModal').text('Actualizar usuario');
    document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
    document.querySelector("#btnActionForm").classList.replace("btn-primary", "btn-warning");
    $('#txtId').prop('readonly', 'true');
    $('#btnText').text('Actualizar');

    $('.valid').removeClass('is-invalid');

    var ajaxUrl = base_url + '/Usuarios/getUsuario/' + datos.id_user;
    $.ajax({
        type: 'GET',
        url: ajaxUrl,
        success: function (response) {
            var objData = JSON.parse(response);
            if (objData.status) {
                datos = objData.msg;
                $('#idUsuario').val(datos.id);
                $('#txtId').val(datos.id_user);
                $('#txtUsuario').val(datos.username);
                $('#listRol').val(datos.idrol);
                $('#listEstado').val(datos.estado);
                $('#listRol').selectpicker('refresh');
                $('#listEstado').selectpicker('refresh');
                $('.modalFormUsuario').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Usuarios',
                    text: objData.msg
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                text: 'Ha ocurrido un error interno.'
            });
        }
    });
});

$('#tableUsuario').on('click', 'button.btnDeleteUsuario', function () {
    var datos = tableUsuario.row($(this).parents('tr')).data();

    Swal.fire({
        icon: 'warning',
        title: 'Eliminar usuario',
        text: 'Desea eliminar el usuario con identificación ' + datos.id_user + '?',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var ajaxUrl = base_url + '/Usuarios/deleteUsuario/' + datos.id_user;
            $.ajax({
                type: 'POST',
                url: ajaxUrl,
                success: function (response) {
                    var objData = JSON.parse(response);
                    if (objData.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuarios',
                            text: objData.msg
                        });
                        tableUsuario.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Usuarios',
                            text: objData.msg
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        text: 'Ha ocurrido un error interno.'
                    });
                }
            });
        }
    });
});