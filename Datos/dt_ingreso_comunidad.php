<?php
include_once("Conexion.php");

class Dt_Ingreso_Comunidad extends Conexion
{
    private $myCon;

    public function listaComunidad()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_ingcom";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vic = new Vw_Ingreso_Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $vic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $vic->__SET('kermesse', $r->kermesse);
                $vic->__SET('comunidad', $r->comunidad);
                $vic->__SET('producto', $r->producto);
                $vic->__SET('cant_productos', $r->cant_productos);
                $vic->__SET('nom_bono', $r->nom_bono);
                $vic->__SET('denominacion', $r->denominacion);
                $vic->__SET('cantidad', $r->cantidad);
                $vic->__SET('subtotal_bono', $r->subtotal_bono);
                $vic->__SET('total_bonos', $r->total_bonos);
                $vic->__SET('usuario_creacion', $r->usuario_creacion); 
                $vic->__SET('fecha_creacion', $r->fecha_creacion);
               

                $result[] = $vic;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaIngresoComunidad()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $ic = new Ingreso_Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $ic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $ic->__SET('id_kermesse', $r->id_kermesse);
                $ic->__SET('id_comunidad', $r->id_comunidad);
                $ic->__SET('id_producto', $r->id_producto);
                $ic->__SET('cant_productos', $r->cant_productos);
                $ic->__SET('total_bonos', $r->total_bonos);
                $ic->__SET('usuario_creacion', $r->usuario_creacion);
                $ic->__SET('fecha_creacion', $r->fecha_creacion);
                $ic->__SET('usuario_modificacion', $r->usuario_modificacion);
                $ic->__SET('fecha_modificacion', $r->fecha_modificacion);
                $ic->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $ic->__SET('fecha_eliminacion', $r->fecha_eliminacion);

                $result[] = $ic;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function regIngComunidad(Ingreso_Comunidad $ic)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad(id_kermesse,id_comunidad, id_producto, cant_productos, total_bonos, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                /* $com->__GET('id_comunidad'), */
                $ic->__GET('id_kermesse'),
                $ic->__GET('id_comunidad'),
                $ic->__GET('id_producto'),
                $ic->__GET('cant_productos'),
                $ic->__GET('total_bonos'),
                $ic->__GET('usuario_creacion'),
                $ic->__GET('fecha_creacion'),
                $ic->__GET('usuario_modificacion'),
                $ic->__GET('fecha_modificacion'),
                $ic->__GET('usuario_eliminacion'),
                $ic->__GET('fecha_eliminacion')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getIngComunidad($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad where id_ingreso_comunidad= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $ic = new Ingreso_Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $ic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $ic->__SET('id_kermesse', $r->id_kermesse);
                $ic->__SET('id_comunidad', $r->id_comunidad);
                $ic->__SET('id_producto', $r->id_producto);
                $ic->__SET('cant_productos', $r->cant_productos);
                $ic->__SET('total_bonos', $r->total_bonos);
                $ic->__SET('usuario_creacion', $r->usuario_creacion);
                $ic->__SET('fecha_creacion', $r->fecha_creacion);
                $ic->__SET('usuario_modificacion', $r->usuario_modificacion);
                $ic->__SET('fecha_modificacion', $r->fecha_modificacion);
                $ic->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $ic->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                
            

            $this->myCon = parent::desconectar();
            return $ic;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
