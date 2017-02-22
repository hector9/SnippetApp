<?php

class model_Lenguaje extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function NewLenguaje($datos) {
        
        try
        {
            $this->db->insert('Lenguaje', $datos);
            return $this->db->insert_id();
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }
    
    public function GetLenguaje($Id)
    {
        $query = $this->db->query("SELECT * FROM Lenguaje  WHERE Id = '"+$Id+"' ;");
        return $query->row();
    }
    
    public function GetLenguajes()
    {
        $query = $this->db->query("SELECT * FROM Lenguaje ");
        return $query->result_array();
    }
    /**
     * 
     * @return Array de datos formateados para la etiqueta form_dropdown
     * ejemplo :
     * <?php echo form_label('Nombre: &nbsp;  '), form_dropdown('Id', $array); ?>
     */
//    public function LenguajesCombo() 
//    {
//      // armamos la consulta
//      $query = $this->db->query('SELECT Id,Nombre FROM Lenguajes ORDER BY Nombre');
//
//      // si hay resultados
//      if ($query->num_rows() > 0) {
//          // almacenamos en una matriz bidimensional
//          foreach ($query->result() as $row)
//              $arrDatos[htmlspecialchars($row->Id, ENT_QUOTES)] = htmlspecialchars($row->Nombre, ENT_QUOTES);
//
//          $query->free_result();
//          return $arrDatos;
//      }
//    }
    public function LenguajesCombo() 
    {
      // armamos la consulta
      $query = $this->db->query('SELECT Id,Nombre FROM Lenguajes ORDER BY Nombre');
      return $query->result_array();
    }
    

    

}


