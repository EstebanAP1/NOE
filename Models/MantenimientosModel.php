<?php

class MantenimientosModel extends MySql
{
    public function selectRealizados()
    {
        $sql = "SELECT s.nom_seccional,e.tipo,e.serial,a.nom_area,
                CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) AS 'funcionario', DATE_FORMAT(fecha_mantenimiento,'%Y-%m-%d') AS 'fecha'
                FROM equipo e
                INNER JOIN seccional s ON s.cod_seccional = e.seccional
                INNER JOIN funcionario f ON f.num_doc = e.funcionario
                INNER JOIN area a ON a.cod_area = f.area
                WHERE !(DATE_FORMAT(SYSDATE(),'%Y-%m-%d')-DATE_FORMAT(fecha_mantenimiento,'%Y-%m-%d') > 0);";
        return $this->selectAll($sql);
    }

    public function selectPendientes()
    {
        $sql = "SELECT s.nom_seccional,e.tipo,e.serial,a.nom_area,
                CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) AS 'funcionario',
                CASE 
                	WHEN e.fecha_mantenimiento IS NULL THEN 'No realizado'
                	ELSE DATE_FORMAT(e.fecha_mantenimiento,'%Y-%m-%d')
                END AS fecha
                FROM equipo e
                INNER JOIN seccional s ON s.cod_seccional = e.seccional
                INNER JOIN funcionario f ON f.num_doc = e.funcionario
                INNER JOIN area a ON a.cod_area = f.area
                WHERE DATE_FORMAT(SYSDATE(),'%Y-%m-%d')-DATE_FORMAT(fecha_mantenimiento,'%Y-%m-%d') > 0 OR fecha_mantenimiento IS NULL;";
        return $this->selectAll($sql);
    }

    public function uploadActa($archivo, $ruta)
    {
        $connection = ftp_connect(FTP_SERVER);
        $login = ftp_login($connection, FTP_USER, FTP_PASSWORD);

        if ($connection != '' && $login != '') {

            if (ftp_put($connection, $ruta, $archivo, FTP_BINARY)) {
                $response = 1;
            } else {
                $response = 2;
            }
        } else {
            $response = 3;
        }
        ftp_close($connection);

        return $response;
    }

    public function insertActa($equipo, $funcionario, $ruta)
    {
        $sql_update = "UPDATE equipo SET fecha_mantenimiento = NOW() WHERE serial = ?";
        $arrDataUpdate = array($equipo['serial']);
        $this->update($sql_update, $arrDataUpdate);

        $sql_insert = "INSERT INTO actas_cargadas(tipo_doc,num_doc,responsable,ruta,serial_equipo,tipo_acta,fecha_cargue) VALUES
                (?,?,?,?,?,?,NOW())";
        $arrData = array($funcionario['tipo_doc'], $funcionario['num_doc'], $equipo['asignado_por'], $ruta, $equipo['serial'], 'M');
        $insert = $this->insert($sql_insert, $arrData);

        return $insert;
    }

    public function selectComputador($serial)
    {
        $sql = "SELECT e.tipo,m2.cod_marca,m2.nom_marca,m.nom_modelo,m.cod_modelo,e.procesador,e.disco,e.ram,e.procedencia,e.serial,e.cpu_tic,e.pantalla,e.pantalla_tic,
                e.teclado,e.teclado_tic,e.mouse,e.mouse_tic,e.cargador,e.cargador_tic,e.nombre_pc,e.so,e.estado,s.cod_seccional,s.nom_seccional,mu.cod_municipio,
                mu.nom_municipio,f.num_doc,CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) AS 'funcionario',a.nom_area,c.nom_cargo,e.asignado_por,e.fecha_ingreso,e.ultima_actualizacion FROM equipo e
                INNER JOIN modelo m ON m.cod_modelo = e.modelo
                INNER JOIN marca m2 ON m2.cod_marca = e.marca
                INNER JOIN seccional s ON s.cod_seccional = e.seccional
                INNER JOIN municipio mu ON mu.cod_municipio = e.municipio
                INNER JOIN funcionario f ON f.num_doc = e.funcionario
                INNER JOIN area a ON a.cod_area = f.area
                INNER JOIN cargo c ON c.cod_cargo = f.cargo
                WHERE e.serial = '{$serial}'";
        return $this->select($sql);
    }

    public function selectFuncionario(string $id)
    {
        $sql = "SELECT f.tipo_doc,f.num_doc,CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) as 'nom_funcionario', a.nom_area, c.nom_cargo FROM funcionario f
        INNER JOIN area a ON a.cod_area = f.area
        INNER JOIN cargo c ON c.cod_cargo = f.cargo
        WHERE f.num_doc = $id";
        return $this->select($sql);
    }

    public function selectActas(string $serial)
    {
        $sql = "SELECT id, CONCAT(f1.nombre1,' ',f1.nombre2,' ',f1.apellido1,' ',f1.apellido2) AS 'funcionario',
                CONCAT(f2.nombre1,' ',f2.nombre2,' ',f2.apellido1,' ',f2.apellido2) AS 'responsable', a.serial_equipo, a.fecha_cargue FROM actas_cargadas a
                INNER JOIN funcionario f1 ON f1.num_doc = a.num_doc
                INNER JOIN funcionario f2 ON f2.num_doc = a.responsable
                WHERE a.serial_equipo = '{$serial}' AND tipo_acta = 'M'";
        return $this->selectAll($sql);
    }

    public function selectActaRoute(int $id)
    {
        $sql = "SELECT ruta FROM actas_cargadas WHERE id = '{$id}'";
        return $this->select($sql);
    }
}

?>