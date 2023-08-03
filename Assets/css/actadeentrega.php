<?php
require_once('../../config/sql.php');



$nombre_f = $_POST["nombre_f"];
$cargo_f  = $_POST["cargo_f"];
$usu = funcionarios($_POST['usu_tic']);
$cargo_tic = $_POST["cargo_tic"];
$datos = datos_equipos($_POST['serial_cpu']);
$nombre_e = $_POST["nombre_e"];
$usuario_d = $_POST["usuario_d"];
$pass_d = $_POST["pass_d"];

// $usu['num_doc'] = strtoupper($usu['num_doc']);
$nombre_f = strtoupper($nombre_f);
$cargo_f  = strtoupper($cargo_f);
$nombre_e = strtoupper($nombre_e);
$usuario_d = strtoupper($usuario_d);
equipos_asignados($nombre_f, $usu['num_doc'], $datos['serial']);
?>


<!DOCTYPE html>
<html lang="en" style="margin-left: 54px;margin-top: 15px;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acta de Entrega</title>
    <link rel="stylesheet" href="../../assets/css/css.css">
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
            <td rowspan="3" style="text-align: center;width: 131px;"><img src="../../images/cajacopi.png" class="img.pequeña" alt="Image" style="height: 55px;"></td>
            <td style="margin-bottom:30px;text-align: center;"><strong>FORMATO DE ACTA DE ENTREGA EQUIPO CÓMPUTO</strong></td>
            <td style="text-align: center;"><strong>Código: GT-FR-01</strong></td>
        </tr>
        <tr>
            <td rowspan="2" style="text-align: center;"><strong>PROCEDIMIENTO DE REQUERIMIENTO TECNOLÓGICO</strong></td>
            <td style="text-align: center;"><strong>Versión: 01</strong></td>
        </tr>
        <tr>
            <td style="text-align: center;"><strong>Fecha: julio 2019</strong></td>
        </tr>
    </table>

    <!-- Fecha - De - Para - Asunto -->

    <table style="border: 0;margin-top: 9px;">
        <tr>
            <td rowspan="2" class="encabezados"><b>FECHA</b></td>
            <td style="padding-right: 100px;border: 0;border-top: 0;"></td>
            <td style="width:35px;text-align: center;"><b><?php echo date("d") ?></b></td>
            <td style="width:35px;text-align: center;"><b><?php echo date("m") ?></b></td>
            <td style="width:65px;text-align: center;"><b><?php echo date("Y") ?></b></td>
            <!-- <td><input type="text" value="<?php echo date("d") ?>" style="width:20px;"></td>
<td><input type="text" value="<?php echo date("m") ?>" style="width:20px;"></td>
<td><input type="text" value="<?php echo date("Y") ?>" style="width:40px;"></td> -->
            </td>
        </tr>
    </table><br>

    <table style="border: 0;">
        <tr>
            <td class="encabezados"><b>PARA</b></td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b><?php echo $nombre_f; ?></b></td>
        </tr>
        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="border: 0; border-top: 0;"></td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b><?php echo $cargo_f; ?></b></td>
        </tr>

        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>

        <tr>
            <td class="encabezados"><b>DE</td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b><?php echo $usu['usu_tic']  ?></b></td>
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr style="height: 6px;">
            <td style="border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="border: 0; border-top: 0;"></td>
            <td style="padding-right: 100px; border: 0; border-top: 0;"></td>
            <td style="width: 400px;text-align: center;"><b><?php echo $cargo_tic; ?></b></td>
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
            <td style="border-bottom:0"><b>POR MEDIO DE LA PRESENTE HAGO ENTREGA FORMAL DE UN EQUIPO DE CÓMPUTO, CON LAS</b></td>
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
            <td style="width:30px; text-align:center;"><b><?= $datos['tipo'] === 'ESCRITORIO' ? 'X' : '' ?></b></td>
            <td style="padding-right: 188px; border: 0; border-top: 0;"></td>
            <td style="width:150px;"><b>PC PORTATIL</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:30px;text-align:center;"><b><?= $datos['tipo'] === 'PORTATIL' ? 'X' : '' ?></b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:663px;text-align: center;"><b>DESCRIPCIÓN DEL EQUIPO DE CÓMPUTO</b></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px">
        <tr>
            <td style="width:70px;"><b>MODELO</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:165px;text-align: center;"><b><?= $datos['nom_modelo'] ?></b></td>
            <td style="padding-right: 152px; border: 0; border-top: 0;"></td>
            <td style="width:150px;"><b>EQUIPO PROPIO</b></td>
            <td style="padding-right: 60px; border: 0; border-top: 0;"></td>
            <td style="width:30px;text-align: center;"><b><?= $datos['procedencia'] === 'PROPIO' ? 'X' : '' ?></b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>MARCA</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:165px;text-align: center;"><b><?= $datos['nom_marca'] ?></b></td>
            <td style="padding-right: 152px; border: 0; border-top: 0;"></td>
            <td style="width:150px;"><b>EQUIPO RENTADO</b></td>
            <td style="padding-right: 60px; border: 0; border-top: 0;"></td>
            <td style="width:30px;text-align: center;"><b><?= $datos['procedencia'] === 'RENTADO' ? 'X' : '' ?></b></td>
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
            <td style="width:116px;text-align: center;"><b><?= $datos['tipo'] === 'ESCRITORIO' ? $datos['serial'] : 'NO APLICA' ?></b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td style="width:85px;"><b>SERIAL</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:130px;text-align: center;"><b><?= $datos['tipo'] === 'PORTATIL' ? $datos['serial'] : 'NO APLICA' ?></b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>MONITOR</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b><?= $datos['pantalla'] ?></b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td style="width:85px;"><b>BATERIA</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:130px;text-align: center;"><b><?= $datos['tipo'] === 'ESCRITORIO' ? 'NO APLICA' : $datos['bateria'] ?></b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>MOUSE</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b><?= $datos['mouse'] ?></b></td>
            <td style="padding-right: 149px; border: 0; border-top: 0;"></td>
            <td style="width:85px;"><b>CARGADOR</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:130px;text-align: center;"><b><?= $datos['tipo'] === 'ESCRITORIO' ? 'NO APLICA' : $datos['cargador'] ?></b></td>
        </tr>
        <tr>
            <td style="height:7px;border: 0; border-top: 0;"></td>
        </tr>
        <tr>
            <td style="width:85px;"><b>TECLADO</b></td>
            <td style="padding-right: 40px; border: 0; border-top: 0;"></td>
            <td style="width:116px;text-align: center;"><b><?= $datos['teclado'] ?></b></td>
        </tr>


    </table>

    <table style="border: 0;margin-top: 9px">
        <tr>
            <td class="bg-dark text-white" style="width:220px;"><b>NOMBRE DEL EQUIPO</b></td>
            <td style="padding-right: 35px; border: 0; border-top: 0;"></td>
            <td style="width:225px;text-align:center;"><b><?php echo $nombre_e; ?></b></td>
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
            <td style="width:170px;text-align:center;"><b><?php echo $usuario_d; ?></b></td>
            <td style="padding-right: 83px; border: 0; border-top: 0;"></td>
            <td style="padding-right: 25px;text-align:center;"><b>CONTRASEÑA TEMPORAL</b></td>
            <td style="padding-right: 20px; border: 0; border-top: 0;"></td>
            <td style="width:120px;text-align:center;"><b><?php echo $pass_d; ?></b></td>
        </tr>
    </table>

    <table style="margin-top: 9px;">
        <tr>
            <td class="bg-dark text-white" style="width:661px;text-align: center;"><b>OBSERVACION</b></td>
        </tr>
        <tr>
            <td style="height: 40px;width: 661px;"></td>
        </tr>
    </table>

    <table style="border: 0;margin-top: 9px">
        <tr>
            <td class="bg-dark text-white"><b>DOCUMENTOS ANEXOS</b></td>
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

    <table style="border: 0;width:665px;margin-top:9px">
        <tr>
            <td class="bg-dark text-white" style="width:70px;border-right:0"></td>
            <td class="bg-dark text-white" style="width:372px;text-align: center;"><b>TRABAJADOR TIC</b></td>
            <td td class="bg-dark text-white" style="width:372px;text-align: center;"><b>TRABAJADOR QUE RECIBE</b></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>FIRMA</b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b></b></td>
            <td style="width:345px;height: 10px;text-align:center; "></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>NOMBRE</b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b><?php echo $usu['usu_tic']  ?></b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b><?php echo $nombre_f; ?></b></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>CARGO</b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b><?php echo $cargo_tic; ?></b></td>
            <td style="width:345px;height: 10px;text-align:center;"><b><?php echo $cargo_f; ?></b></td>
        </tr>
        <tr>
            <td style="width:70px;"><b>FECHA</b></td>
            <td style="width:345px;height: 10px;text-align: center;"><b><?php echo date("d-m-Y") ?></b></td>
            <td style="width:345px;height: 10px;text-align: center;"><b><?php echo date("d-m-Y") ?></b></td>
        </tr>
    </table><br>
    <!-- <input class="oculto-impresion" style="height: 20px;" id="button1" type="button" name="button1" value="Imprimir P&aacute;gina" onclick=""> -->
    <?php
    // header("Content-disposition: attachment; filename=acta_de_entrega.pdf");
    // header("Content-type: MIME");
    // readfile("acta_de_entrega.pdf");
    ?>
</body>

</html>