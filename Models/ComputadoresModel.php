<?php

class ComputadoresModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectMarcas()
    {
        $sql = "SELECT cod_marca,nom_marca FROM marca";
        return $this->selectAll($sql);
    }

    public function selectProcesadores()
    {
        $sql = "SELECT nom_procesador FROM procesador";
        return $this->selectAll($sql);
    }

    public function selectDiscoS()
    {
        $sql = "SELECT nom_disco FROM disco";
        return $this->selectAll($sql);
    }

    public function selectRam()
    {
        $sql = "SELECT nom_ram FROM ram";
        return $this->selectAll($sql);
    }

    public function selectModelos(int $cod_marca)
    {
        $sql = "SELECT cod_modelo,nom_modelo FROM modelo WHERE cod_marca = '{$cod_marca}'";
        return $this->selectAll($sql);
    }

    public function insertComputador(array $datos)
    {
        $sql = "SELECT serial FROM equipo WHERE serial = '{$datos['serial']}' OR nombre_pc = '{$datos['nom_pc']}'";
        $request = $this->select($sql);

        if (empty($request)) {
            $sql_funcionario = "SELECT area,cargo FROM funcionario WHERE num_doc = '{$datos['cod_funcionario']}'";
            $request_funcionario = $this->select($sql_funcionario);

            if (!empty($request_funcionario)) {
                $datos['area'] = $request_funcionario['area'];
                $datos['cargo'] = $request_funcionario['cargo'];

                $sql_insert = "INSERT INTO equipo(tipo,marca,modelo,serial,cpu_tic,procesador,disco,
                ram,pantalla,pantalla_tic,teclado,teclado_tic,mouse,mouse_tic,cargador,cargador_tic,bateria,
                procedencia,seccional,municipio,funcionario,cargo,area,estado,nombre_pc,so,asignado_por,operativo)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $arrData = array(
                    $datos['tipo'], $datos['cod_marca'], $datos['cod_modelo'], $datos['serial'], $datos['serialTIC'], $datos['procesador'],
                    $datos['disco'], $datos['ram'], $datos['pantalla'], $datos['pantallaTIC'], $datos['teclado'], $datos['tecladoTIC'],
                    $datos['mouse'], $datos['mouseTIC'], $datos['cargador'], $datos['cargadorTIC'], $datos['bateria'],
                    $datos['procedencia'], $datos['seccional'], $datos['municipio'], $datos['cod_funcionario'], $datos['cargo'], $datos['area'],
                    $datos['estado'], $datos['nom_pc'], $datos['so'], $datos['asignado_por'],
                    'O'
                );
                return $this->insert($sql_insert, $arrData);
            } else {
                return -3;
            }
        } else {
            return -1;
        }
    }

    public function updateComputador(array $datos)
    {
        $sql = "SELECT serial FROM equipo WHERE serial = '{$datos['serial']}'";
        $request = $this->select($sql);

        if (!empty($request)) {
            $sql_funcionario = "SELECT area,cargo FROM funcionario WHERE num_doc = '{$datos['cod_funcionario']}'";
            $request_funcionario = $this->select($sql_funcionario);

            if (!empty($request_funcionario)) {
                $datos['area'] = $request_funcionario['area'];
                $datos['cargo'] = $request_funcionario['cargo'];

                $sql_update = "UPDATE equipo SET tipo=?,marca=?,modelo=?,cpu_tic=?,procesador=?,disco=?,ram=?,pantalla=?,pantalla_tic=?,teclado=?,
                                            teclado_tic=?,mouse=?,mouse_tic=?,cargador=?,cargador_tic=?,bateria=?,procedencia=?,seccional=?,municipio=?,funcionario=?,
                                            cargo=?,area=?,estado=?,nombre_pc=?,so=?,asignado_por=? WHERE serial=?";
                $arrData = array(
                    $datos['tipo'], $datos['cod_marca'], $datos['cod_modelo'], $datos['serialTIC'], $datos['procesador'],
                    $datos['disco'], $datos['ram'], $datos['pantalla'], $datos['pantallaTIC'], $datos['teclado'], $datos['tecladoTIC'],
                    $datos['mouse'], $datos['mouseTIC'], $datos['cargador'], $datos['cargadorTIC'], $datos['bateria'],
                    $datos['procedencia'], $datos['seccional'], $datos['municipio'], $datos['cod_funcionario'], $datos['cargo'], $datos['area'],
                    $datos['estado'], $datos['nom_pc'], $datos['so'], $datos['asignado_por'], $datos['serial']
                );
                return $this->update($sql_update, $arrData);
            } else {
                return -3;
            }
        } else {
            return -2;
        }
    }


    public function selectComputadores()
    {
        $sql = "SELECT s.nom_seccional,e.tipo,m2.nom_modelo,e.serial,e.nombre_pc,CONCAT(f1.nombre1,' ',f1.nombre2,' ',f1.apellido1,' ',f1.apellido2) AS 'funcionario',
                CONCAT(f2.nombre1,' ',f2.nombre2,' ',f2.apellido1,' ',f2.apellido2) AS 'responsable',e.estado FROM equipo e
                INNER JOIN seccional s ON s.cod_seccional = e.seccional
                INNER JOIN marca m1 ON m1.cod_marca = e.marca
                INNER JOIN modelo m2 ON m2.cod_modelo = e.modelo
                INNER JOIN funcionario f1 ON f1.num_doc = e.funcionario
                INNER JOIN funcionario f2 ON f2.num_doc = e.asignado_por";
        return $this->selectAll($sql);
    }

    public function selectComputador($serial)
    {
        $sql = "SELECT e.tipo,m.cod_marca,m.cod_modelo,e.procesador,e.disco,e.ram,e.procedencia,e.serial,e.cpu_tic,e.pantalla,e.pantalla_tic,
                e.teclado,e.teclado_tic,e.mouse,e.mouse_tic,e.cargador,e.cargador_tic,e.nombre_pc,e.so,e.estado,s.cod_seccional,mu.cod_municipio,
                f.num_doc,a.nom_area,c.nom_cargo,e.asignado_por,e.fecha_ingreso,e.ultima_actualizacion FROM equipo e
                INNER JOIN modelo m ON m.cod_modelo = e.modelo
                INNER JOIN seccional s ON s.cod_seccional = e.seccional
                INNER JOIN municipio mu ON mu.cod_municipio = e.municipio
                INNER JOIN funcionario f ON f.num_doc = e.funcionario
                INNER JOIN area a ON a.cod_area = f.area
                INNER JOIN cargo c ON c.cod_cargo = f.cargo
                WHERE e.serial = '{$serial}'";
        return $this->select($sql);
    }

    // TODO: COLOCAR EN OTRO MODEL EN EL FUTURO 

    public function selectSeccionales()
    {
        $sql = "SELECT cod_seccional,nom_seccional FROM seccional";
        return $this->selectAll($sql);
    }

    public function selectMunicipios(string $cod_seccional)
    {
        $sql = "SELECT cod_municipio,nom_municipio FROM municipio WHERE LEFT(cod_municipio, 2) = '{$cod_seccional}'";
        return $this->selectAll($sql);
    }

    public function selectFuncionarios()
    {
        $sql = "SELECT num_doc,CONCAT(nombre1,' ',nombre2,' ',apellido1,' ',apellido2) as 'nom_funcionario' FROM funcionario";
        return $this->selectAll($sql);
    }

    public function selectFuncionario(string $id)
    {
        $sql = "SELECT a.nom_area, c.nom_cargo FROM funcionario f
        INNER JOIN area a ON a.cod_area = f.area
        INNER JOIN cargo c ON c.cod_cargo = f.cargo
        WHERE f.num_doc = $id";
        return $this->select($sql);
    }
}
?>