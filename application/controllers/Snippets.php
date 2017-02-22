<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Snippets extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
         * 
	 */
    
        function __construct() {
            parent::__construct();
            
            $this->load->model('model_App', 'appModel');
            $this->load->model('model_Lenguaje', 'lenguajeModel');
            $this->load->model('model_Codigo', 'snippetModel');

        }


        public function index()
	{
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();

            $this->load->view('snippets/addSnippet', $this->datos);
	}
        
        public function AddSnippet()
	{
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();

//            $datosCodigo = [$datos['Id_Lenguaje'], $datos['Valor'], $datos['Descripcion']];
//            $idCodigo = AddCodigo($datosCodigo);
//            $datosRelacion = [$idCodigo, $datos['app']];
//            $id = AddCodApp($datosRelacion);
              
            $snippet = $_POST['textarea'];
             
            $nuevoSnippet = Array(
                'Id_Lenguaje' => $_POST['lenguaje'],
                'Valor' => $snippet,
                'Descripcion' => $_POST['descripcion'],
                'app' => $_POST['app']
            );
            
            if($this->snippetModel->NewCodigo($nuevoSnippet))
            {
                echo 'Guardado Correctamente';
            }
            else
            {
                echo 'Error al guardar';
            }
            
            $this->load->view('snippets/addSnippet', $this->datos);
	}
        
        public function EditSnippet($id) {
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();
            
            $this->load->view('snippets/addSnippet', $this->datos);
        }
        
        public function DeleteSnippet($id) {
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();
            
            $this->load->view('snippets/addSnippet', $this->datos);
        }
        
        public function SnippetsByLng($idLng) {
            
        }
        
        public function SnippetByApp($idApp) {
            
        }
}
