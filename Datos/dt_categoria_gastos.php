<?php

include_once("conexion.php");

class dt_categoria_gastos extends Conexion
{
    private $myCon;

    public function listarCategoriaGastos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_Categoria_gastos();

                $us->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                $us->__SET('nombre_categoria', $r->nombre_categoria);
                $us->__SET('descripcion', $r->descripcion);
                $us->__SET('estado', $r->estado);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarVwCategoriaGastos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_categoria_gastos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_Categoria_gastos();

                $us->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                $us->__SET('nombre_categoria', $r->nombre_categoria);
                $us->__SET('descripcion', $r->descripcion);
                $us->__SET('Name_exp_4', $r->Name_exp_4);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regCategoriaGastos(categoria_gastos $com)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_categoria_gastos(nombre_categoria, descripcion, estado)
                VALUES (?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                $com->__GET('nombre_categoria'),
                $com->__GET('descripcion'),
                $com->__GET('estado')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getCategoriaGastos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos where id_categoria_gastos= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $ic = new categoria_gastos();

                //_SET(CAMPOBD, atributoEntidad)
                $ic->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                $ic->__SET('nombre_categoria', $r->nombre_categoria);
                $ic->__SET('descripcion', $r->descripcion);
                $ic->__SET('estado', $r->estado);
            $this->myCon = parent::desconectar();
            return $ic;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
