<?php

class model_Codigo extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function NewCodigo($datos) {
        try 
        {
            $datosCodigo = [$datos['Id_Lenguaje'], $datos['Valor'], $datos['Descripcion']];
            $idCodigo = $this->AddCodigo($datosCodigo);
            $datosRelacion = [$idCodigo, $datos['app']];
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
            $query = $this->db->query("SELECT * FROM Codigo  WHERE Id = '" + $Id + "' ;");
            return $query->row();
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }

    public function GetCodigos() {
        $query = $this->db->query("SELECT * FROM Codigos ");
        return $query->result_array();
    }

    public function GetCodigosByDescripcion($key) {
        $query = $this->db->query("SELECT * FROM Codigo WHERE Descripcion LIKE %" + $key + "% ;");
        return $query->result_array();
    }

}
