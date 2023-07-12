$(document).ready(function () {
    if (nav_link_father != '') {
        var pageLinkFather = 'nav-' + nav_link_father + '-link';
        var pageItemFather = 'nav-' + nav_link_father + '-item';

        $('.' + pageLinkFather).addClass('active');
        $('.' + pageItemFather).addClass('menu-is-opening menu-open');
    }
    if (nav_link != '') {
        var pageLink = 'nav-' + nav_link + '-link';

        $('.' + pageLink).addClass('active');
    }
});

function controlTag(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    else if (tecla == 0 || tecla == 9) return true;
    patron = /[0-9\s]/;
    n = String.fromCharCode(tecla);
    return patron.test(n);
}

function testText(txtString) {
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
    if (stringText.test(txtString)) {
        return true;
    } else {
        return false;
    }
}

function testEntero(intCant) {
    var intCantidad = new RegExp(/^([0-9])+$/);
    if (intCantidad.test(intCant)) {
        return true;
    } else {
        return false;
    }
}

function emailValidate(email) {
    var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if (stringEmail.test(email) == false) {
        return false;
    } else {
        return true;
    }
}

$('.validText').keyup(function () {
    if (!testText($(this).val())) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});

$('.validNumber').keyup(function () {
    if (!testEntero($(this).val())) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});

$('.validEmail').keyup(function () {
    if (!emailValidate($(this).val())) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});

$('.validEmpty').keyup(function () {
    if ($(this).val() == '') {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});

