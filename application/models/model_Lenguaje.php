<?php

/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class model_Lenguaje extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     *
     * @return array de categorias, devuelve toda las categorias existentes
     */
    public function NewLenguaje($datos) {

        $this->db->insert('Lenguaje', $datos);
        return $this->db->insert_id();
    }
    
    public function GetLenguaje($Id)
    {
        $query = $this->db->query("SELECT * FROM Lenguaje  WHERE Id = '"+$Id+"' ;");
        return $query->result_array();
    }
    
    public function GetLenguajes($Id)
    {
        $query = $this->db->query("SELECT * FROM Lenguaje ");
        return $query->row();
    }
    /**
     * 
     * @return Array de datos formateados para la etiqueta form_dropdown
     * ejemplo :
     * <?php echo form_label('Nombre: &nbsp;  '), form_dropdown('Id', $array); ?>
     */
    public function LenguajesCombo() 
    {
      // armamos la consulta
      $query = $this->db->query('SELECT Id,Nombre FROM Lenguajes ORDER BY Nombre');

      // si hay resultados
      if ($query->num_rows() > 0) {
          // almacenamos en una matriz bidimensional
          foreach ($query->result() as $row)
              $arrDatos[htmlspecialchars($row->Id, ENT_QUOTES)] = htmlspecialchars($row->Nombre, ENT_QUOTES);

          $query->free_result();
          return $arrDatos;
      }
    }
    

    

}


