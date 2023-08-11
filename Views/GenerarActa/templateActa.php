<!DOCTYPE html>
<html lang="en" style="margin-left: 54px;margin-top: 15px;">

<head>
    <meta charset="utf-8">
    <meta name="description" content="NOE CajacopiEPS">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Esteban Padilla">
    <meta name="theme-color" content="#343a40">
    <link rel="shortcut icon" href="<?= media() ?>/images/cajacopi_icon.ico" type="image/x-icon">
    <title>Acta de Entrega</title>
    <link rel="stylesheet" href="<?= media() ?>/css/actaStyle.css">
    <style>
        @media print {
            #funcionario-select {
                border: none;
                -webkit-appearance: none;
            }

            @page {
                margin: 0;
                size: auto;
            }

            .oculto-impresion,
            .oculto-impresion * {
                display: none !important;
            }
        }
    </style>

    <!-- <body onload="window.print();" onafterprint="window.close()"> -->

<body>
    <!-- Encabezado -->
    <table style="width:667px;height:73px;margin-top: 17px;">
        <tr>
            <td rowspan="3" style="text-align: center;width: 131px;"><img
                    src="<?= media() ?>/images/logo_cajacopieps.png" class="img.pequeña" alt="Image"
                    style="height: 32px;"></td>
            <td style="margin-bottom:30px;text-align: center;"><strong>FORMATO DE ACTA DE ENTREGA O DEVOLUCIÓN DE EQUIPO
                    DE CÓMPUTO</strong></td>
            <td style="text-align: center;"><strong>Código: GT-FR-01</strong></td>
        </tr>
        <tr>
            <td rowspan="2" style="text-align: center;"><strong>PROCEDIMIENTO DE REQUERIMIENTO TECNOLÓGICO</strong></td>
            <td style="text-align: center;"><strong>Versión: 01</strong></td>
        </tr>
        <tr>
            <td style="text-align: center;"><strong>Fecha: enero 2023</strong></td>
        </tr>
    </table>

    <!-- Fecha - De - Para - Asunto -->

    <table style="border: 0;margin-top: 9px;">
        <tr>
            <td rowspan="2" class="encabezados"><b>FECHA</b></td>
            <td style="padding-right: 100px;border: 0;border-top: 0;"></td>
            <td style="width:35px;text-align: center;"><b>
                    <?= date("d") ?>
                </b></td>
            <td style="width:35px;text-align: center;"><b>
                    <?= date("m") ?>
                </b></td>
            <td style="width:65px;text-align: center;"><b>
                    <?= date("Y") ?>
                </b></td>
            </td>
        </tr>
    </table><br>

    <table style="border: 0;">
        <tr>
            <td class="encabezados"><b>PARA</b></td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b>
                    <?= $data['funcionario']['nom_funcionario'] ?>
                </b></td>
        </tr>
        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="border: 0; border-top: 0;"></td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b>
                    <?= $data['funcionario']['nom_cargo'] ?>
                </b></td>
        </tr>

        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>

        <tr>
            <td class="encabezados"><b>DE</td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b>
                    <?= $data['responsable']['nom_funcionario'] ?>
                </b></td>
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="border: 0; border-top: 0;"></td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b>
                    <?= $data['responsable']['nom_cargo'] ?>
                </b></td>
        </tr>
        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td class="encabezados"><b>ASUNTO</td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 240px;text-align: center;"><b>ENTREGA EQUIPO DE COMPUTO</b></td>
        </tr>

    </table><br>

    <table style="width:667px;height:35px">
        <tr>
            <td style="border-bottom:0"><b>POR MEDIO DE LA PRESENTE HAGO ENTREGA FORMAL DE UN EQUIPO DE CÓMPUTO, CON
                    LAS</b></td>
        <tr>
            <td style="border-top:0"><b>SIGUIENTES ESPECIFICACIONES:</b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:663px;text-align: center;"><b>TIPO DE HARDWARE</b></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px;">
        <tr>
            <td class="cajas" style="width:170px;"><b>PC ESCRITORIO</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:30px; text-align:center;"><b>
                    <?= $data['pc']['tipo'] === 'ESCRITORIO' ? 'X' : '' ?>
                </b></td>
            <td style="padding-right: 188px; border: 0; border-top: 0;"></td>
            <td style="width:150px;"><b>PC PORTATIL</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:30px;text-align:center;"><b>
                    <?= $data['pc']['tipo'] === 'PORTATIL' ? 'X' : '' ?>
                </b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:663px;text-align: center;"><b>DESCRIPCIÓN DEL EQUIPO DE
                    CÓMPUTO</b></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px">
        <tr>
            <td style="width:70px;"><b>MODELO</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:165px;text-align: center;"><b>
                    <?= $data['pc']['nom_modelo'] ?>
                </b></td>
            <td style="padding-right: 152px; border: 0; border-top: 0;"></td>
            <td style="width:150px;"><b>EQUIPO PROPIO</b></td>
            <td style="padding-right: 60px; border: 0; border-top: 0;"></td>
            <td style="width:30px;text-align: center;"><b>
                    <?= $data['pc']['procedencia'] === 'PROPIO' ? 'X' : '' ?>
                </b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>MARCA</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:165px;text-align: center;"><b>
                    <?= $data['pc']['nom_marca'] ?>
                </b></td>
            <td style="padding-right: 152px; border: 0; border-top: 0;"></td>
            <td style="width:150px;"><b>EQUIPO RENTADO</b></td>
            <td style="padding-right: 60px; border: 0; border-top: 0;"></td>
            <td style="width:30px;text-align: center;"><b>
                    <?= $data['pc']['procedencia'] === 'RENTADO' ? 'X' : '' ?>
                </b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:663px;text-align: center;"><b>INVENTARIO DE PARTES</b></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:250px;text-align:center;"><b>EQUIPOS DE ESCRITORIO</b></td>
            <td style="padding-right: 150px; border: 0; border-top: 0;"></td>
            <td class="bg-dark text-white" style="width:259px;text-align:center;"><b>EQUIPOS PORTATIL</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:85px;text-align:center;"><b>PARTE</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td class="bg-dark text-white" style="width:120px;text-align:center;"><b>SERIAL</b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td class="bg-dark text-white" style="width:85px;text-align:center;"><b>PARTE</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td class="bg-dark text-white" style="width:130px;text-align:center;"><b>SERIAL</b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>CPU</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b>
                    <?= $data['pc']['tipo'] === 'ESCRITORIO' ? $data['pc']['serial'] : 'NA' ?>
                </b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td style="width:85px;"><b>SERIAL</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:130px;text-align: center;"><b>
                    <?= $data['pc']['tipo'] === 'PORTATIL' ? $data['pc']['serial'] : 'NA' ?>
                </b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>MONITOR</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b>
                    <?= $data['pc']['pantalla'] ?>
                </b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td style="width:85px;"><b>BATERIA</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:130px;text-align: center;"><b>
                    <?= $data['pc']['tipo'] === 'ESCRITORIO' ? 'NA' : 'INTEGRADA' ?>
                </b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>MOUSE</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b>
                    <?= $data['pc']['mouse'] ?>
                </b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td style="width:85px;"><b>CARGADOR</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:130px;text-align: center;"><b>
                    <?= $data['pc']['tipo'] === 'ESCRITORIO' ? 'NA' : $data['pc']['cargador'] ?>
                </b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>TECLADO</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b>
                    <?= $data['pc']['teclado'] ?>
                </b></td>
        </tr>


    </table>

    <table style="border: 0;margin-top: 9px">
        <tr>
            <td class="bg-dark text-white" style="width:220px;"><b>NOMBRE DEL EQUIPO</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:225px;text-align:center;"><b>
                    <?= $data['pc']['nombre_pc'] ?>
                </b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:663px;text-align: center;"><b>USUARIO Y CONTRASEÑA</b></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px;">
        <tr>
            <td><b>USUARIO</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:170px;text-align:center;"><b></b></td>
            <td style="padding-right: 83px; border: 0; border-top: 0;"></td>
            <td style="padding-right: 25px;text-align:center;"><b>CONTRASEÑA TEMPORAL</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:120px;text-align:center;"><b>
                    <?= 'Lenovo' . date('Y' . '.') ?>
                </b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="max-width:661px;text-align: center;"><b>OBSERVACION</b></td>
        </tr>
        <tr>
            <td style="height: 40px;width: 661px;">
                <textarea style="height: 40px;width: 661px;"></textarea>
            </td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px">
        <tr>
            <td class="bg-dark text-white" style="width: 155px;"><b>DOCUMENTOS ANEXOS</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td><input type="text" placeholder="SI" style="width:30px;opacity: 0.2;"></input></td>
            <td style="padding-right: 50px; border: 0; border-top: 0;"></td>
            <td><input type="text" placeholder="NO" style="width:30px;opacity: 0.2;"></input></td>
            <td style="padding-right: 120px; border: 0; border-top: 0;"></td>
            <td><b>CANTIDAD</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:70px; text-align:center;">1</td>
        </tr>
    </table>

    <table style="border: 0;width:670px;margin-top:9px">
        <tr>
            <td class="bg-dark text-white" style="width:70px;border-right:0"></td>
            <td class="bg-dark text-white" style="width:372px;text-align: center;"><b>ENTREGUE A CONFORME</b></td>
            <td td class="bg-dark text-white" style="width:372px;text-align: center;"><b>RECIBI A CONFORME</b></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>FIRMA</b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b></b></td>
            <td style="width:345px;height: 10px;text-align:center; "></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>NOMBRE</b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b>
                    <?= $data['responsable']['nom_funcionario'] ?>
                </b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b>
                    <?= $data['funcionario']['nom_funcionario'] ?>
                </b></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>CARGO</b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b>
                    <?= $data['responsable']['nom_cargo'] ?>
                </b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b>
                    <?= $data['funcionario']['nom_cargo'] ?>
                </b></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>FECHA</b></td>
            <td style="width:345px;height: 10px;text-align: center;"><b>
                    <?= date('d-m-Y') ?>
                </b></td>
            <td style="width:345px;height: 10px;text-align: center;"><b>
                    <?= date('d-m-Y') ?>
                </b></td>
        </tr>
    </table><br>
</body>

</html>