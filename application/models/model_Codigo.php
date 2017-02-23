<?php

class model_Codigo extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function NewCodigo($datos) {
        try 
        {
            $datosCodigo = Array( 
                'Valor' => $datos['Valor'],
                'Descripcion' => $datos['Descripcion'],
                'Id_Lenguaje' => $datos['Id_Lenguaje'],
                'Titulo' => $datos['Titulo']);
            
            //var_dump($datosCodigo);
            $idCodigo = $this->AddCodigo($datosCodigo);
            $datosRelacion = Array(
                'Id_codigo'=>$idCodigo, 
                'Id_app'=>$datos['app']);
            //var_dump($datosRelacion);
            $id = $this->AddCodApp($datosRelacion);
            
            return true;
            
        } catch (Exception $e) 
        {
            return false;
        }
    }

    public function AddCodigo($datos) {
        try
        {
            $this->db->insert('codigo', $datos);
            return $this->db->insert_id();
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function AddCodApp($datos) {
        try 
        {
            $this->db->insert('codigo_por_app', $datos);
            return $this->db->insert_id();
        } 
        catch (Exception $ex) 
        {
            return false;
        }        
    }

    public function GetCodigo($Id) {
        try
        {
            $query = $this->db->query("SELECT * FROM Codigo  WHERE Id = '" . $Id . "' ;");
            return $query->result_array();
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }
    public function GetCodigoByLenguaje($Leng) {
        try
        {   
            $cadena ="SELECT * FROM Codigo  WHERE Id_Lenguaje = " . parse_str($Leng) . " ;";

            $query = $this->db->query("SELECT * FROM Codigo  WHERE Id_Lenguaje = " . $Leng . " ;");
            
            return $query->result_array();
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }
    public function GetCodigoByApp($app) {
        try
        {
            $query = $this->db->query("SELECT * FROM Codigo,Codigo_por_app  WHERE Codigo.Id = Codigo_por_app.Id_Codigo AND Id_app = '" . $app ."' ;");
            return $query->result_array();
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }
    
    public function GetCodigos() {
        $query = $this->db->query("SELECT * FROM Codigo ");
        return $query->result_array();
    }

    public function GetCodigosByDescripcion($key) {
        $query = $this->db->query("SELECT * FROM Codigo WHERE Descripcion LIKE '%" . $key . "%' ;");
        return $query->result_array();
    }

}
