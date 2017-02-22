<?php

/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class model_App extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     *
     * @return array de categorias, devuelve toda las categorias existentes
     */
    public function NewApp($datos) {
        try 
        {
            $this->db->insert('App', $datos);
            return $this->db->insert_id();
        } catch (Exception $ex) 
        {
            return false;
        }
        
    }
    
    public function GetApp($Id)
    {
        $query = $this->db->query("SELECT * FROM App  WHERE Id = '"+$Id+"' ;");
        return $query->row();
    }
    
    public function GetApps()
    {
        $query = $this->db->query("SELECT * FROM App ");
        return $query->result_array();
    }
    /**
     * 
     * @return Array de datos formateados para la etiqueta form_dropdown
     * ejemplo :
     * <?php echo form_label('Nombre: &nbsp;  '), form_dropdown('Id', $array); ?>
     */
//    public function AppsCombo() 
//    {
//      // armamos la consulta
//      $query = $this->db->query('SELECT Id,Nombre FROM Apps ORDER BY Nombre');
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
    public function AppsCombo() 
    {
        $query = $this->db->query('SELECT Id,Nombre FROM Apps ORDER BY Nombre');
        return $query->result_array();
    }

//

    

}


