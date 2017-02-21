<?php

class model_Codigo extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function NewCodigo($datos) {

        //$datosCodigo = [$datos['']]
        $this->db->insert('Codigo', $datosCodigo);
        $this->db->insert('codigo_por_app', $datosRelacion);
        return $this->db->insert_id();
    }
    
    public function GetCodigo($Id)
    {
        $query = $this->db->query("SELECT * FROM Codigo  WHERE Id = '"+$Id+"' ;");
        return $query->row();
    }
    
    public function GetCodigos()
    {
        $query = $this->db->query("SELECT * FROM Codigos ");
        return $query->result_array();
    }
    
}


