var tableRoles;

$(function () {
    $("[data-toggle='tooltip']").tooltip();

    tableRoles = $('#tableRoles').DataTable({
        aProcessing: true,
        aServerSide: true,
        language: {
            'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        ajax: {
            'url': base_url + '/Roles/getRoles',
            'dataSrc': ''
        },
        columnDefs: [
            { 'className': 'dt-center', 'targets': '_all' }
        ],
        columns: [
            { 'data': 'idrol' },
            { 'data': 'nombrerol' },
            { 'data': 'descripcion' },
            { 'data': 'estado' },
            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        bDestroy: true,
        autoWidth: false,
        iDisplayLength: 10,
        initComplete: function () {
            $("[data-toggle='tooltip']").tooltip();
        }
    });
});

$('#formRol').on('submit', function (e) {
    e.preventDefault();

    $('#divLoading').css('display', 'flex');

    var sw = true;
    var formData = $('#formRol').serializeArray();

    formData.forEach(data => {
        if (data.name != 'idRol' && data.value == '') sw = false
    });

    let valid = document.getElementsByClassName("valid");
    for (let i = 0; i < valid.length; i++) {
        if (valid[i].classList.contains('is-invalid')) {
            sw = false;
        }
    }

    if (sw) {
        var ajaxUrl = base_url + '/Roles/setRol';
        $.ajax({
            type: 'POST',
            url: ajaxUrl,
            data: formData,
            success: function (response) {
                $('#divLoading').css('display', 'none');

                var objData = JSON.parse(response);
                if (objData.status) {
                    $('.modalFormRol').modal('hide');
                    $('#formRol').trigger('reset');
                    Swal.fire({
                        icon: 'success',
                        title: 'Roles de usuario',
                        text: objData.msg
                    });
                    tableRoles.ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Roles de usuario',
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
});

$('#btnCreateRol').click(function () {
    $('#titleModal').text('Crear rol');
    $('#idRol').val('');
    document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
    document.querySelector("#btnActionForm").classList.replace("btn-warning", "btn-primary");
    $('#btnText').text('Guardar');
    $('#formRol').trigger('reset');

    $('.valid').removeClass('is-invalid');

    $('.modalFormRol').modal('show');
});

$('#tableRoles').on('click', 'button.btnEditRol', function () {
    var datos = tableRoles.row($(this).parents('tr')).data();

    $('#titleModal').text('Actualizar rol');
    document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
    document.querySelector("#btnActionForm").classList.replace("btn-primary", "btn-warning");
    $('#btnText').text('Actualizar');

    $('.valid').removeClass('is-invalid');

    var ajaxUrl = base_url + '/Roles/getRol/' + datos.idrol;
    $.ajax({
        type: 'GET',
        url: ajaxUrl,
        success: function (response) {
            var objData = JSON.parse(response);
            if (objData.status) {
                datos = objData.msg;
                $('#idRol').val(datos.idrol);
                $('#txtNombre').val(datos.nombrerol);
                $('#txtDescripcion').val(datos.descripcion);
                $('#listEstado').val(datos.estado);
                $('.modalFormRol').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Roles de usuario',
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

$('#tableRoles').on('click', 'button.btnDeleteRol', function () {
    var datos = tableRoles.row($(this).parents('tr')).data();

    Swal.fire({
        icon: 'warning',
        title: 'Eliminar rol',
        text: 'Desea eliminar el rol ' + datos.nombrerol + '?',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var ajaxUrl = base_url + '/Roles/deleteRol/' + datos.idrol;
            $.ajax({
                type: 'POST',
                url: ajaxUrl,
                success: function (response) {
                    var objData = JSON.parse(response);
                    if (objData.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Roles de usuario',
                            text: objData.msg
                        });
                        tableRoles.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Roles de usuario',
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

$('#tableRoles').on('click', 'button.btnPermisosRol', function () {
    var datos = tableRoles.row($(this).parents('tr')).data();
    var ajaxUrl = base_url + '/Permisos/getPermisosRol/' + datos.idrol;
    $.ajax({
        type: "GET",
        url: ajaxUrl,
        success: function (response) {
            document.querySelector("#contentAjax").innerHTML = response;
            $('.modalAddPermisos').modal('show');
            $('#formPermisos').on('submit', function (e) {
                e.preventDefault();

                $('#divLoading').css('display', 'flex');

                var ajaxUrl = base_url + '/Permisos/setPermisos';
                var formData = $('#formPermisos').serializeArray();
                $.ajax({
                    type: "POST",
                    url: ajaxUrl,
                    data: formData,
                    success: function (response) {
                        $('#divLoading').css('display', 'none');

                        var objData = JSON.parse(response);
                        if (objData.status) {
                            $('.modalAddPermisos').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Permisos de usuario',
                                text: objData.msg
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Permisos de usuario',
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
            });
        }
    });
});