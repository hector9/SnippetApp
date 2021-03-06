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

            $this->load->view('common/header', $this->datos);
            $this->load->view('snippets/addSnippet', $this->datos);
            $this->load->view('common/footer');
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
              
            $text = $_POST['textarea'];
             
            $snippet = str_replace("<", "&lt;", $text);
            
            $nuevoSnippet = Array(
                'Id_Lenguaje' => $_POST['lenguaje'],
                'Valor' => $snippet,
                'Descripcion' => $_POST['descripcion'],
                'app' => $_POST['app'],
                'Titulo' => $_POST['titulo']
            );
            
            if($this->snippetModel->NewCodigo($nuevoSnippet))
            {
                //echo 'Guardado Correctamente';
                $this->datos['snippets'] = $this->snippetModel->GetCodigoByApp($_POST['app']);
//                $this->load->view('common/header', $this->datos);
//                $this->load->view('snippets/listaSnippets', $this->datos);
//                $this->load->view('common/footer');
                
                header('Content-Type: application/json');
                
                echo json_encode("1");
            }
            else
            {
                echo 'Error al guardar';
                $this->load->view('common/header', $this->datos);
                $this->load->view('snippets/addSnippet', $this->datos);
                $this->load->view('common/footer');
            }
	}
        
        public function EditSnippet($id) {
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();
            
            $this->load->view('common/header', $this->datos);
            $this->load->view('snippets/addSnippet', $this->datos);
            $this->load->view('common/footer');
        }
        
        public function DeleteSnippet($id) {
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();
            
            $this->load->view('common/header', $this->datos);
            $this->load->view('snippets/addSnippet', $this->datos);
            $this->load->view('common/footer');
        }
        
        public function SnippetsByLng($idLng) {
             /**/
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();

            $this->datos['snippets'] = $this->snippetModel->GetCodigoByLenguaje($idLng);
            var_dump($this->snippetModel->GetCodigosByDescripcion('p'));
            $this->load->view('common/header', $this->datos);
            $this->load->view('snippets/listasnippets', $this->datos);
            $this->load->view('common/footer');
        }
        /**/
        public function SnippetsByApp($idApp) {
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();

            $this->datos['snippets'] = $this->snippetModel->GetCodigoByApp($idApp);
            
            $this->load->view('common/header', $this->datos);
            $this->load->view('snippets/listasnippets', $this->datos);
            $this->load->view('common/footer');
        }
        
        public function SnippetById($idSnippet) {
            $this->datos['lenguajes'] = $this->lenguajeModel->GetLenguajes();
            $this->datos['apps'] = $this->appModel->GetApps();
            $this->datos['lenguajesCombo'] = $this->lenguajeModel->LenguajesCombo();
            $this->datos['appsCombo'] = $this->appModel->AppsCombo();

            $this->datos['snippets'] = $this->snippetModel->GetCodigo($idSnippet);
            
            $this->load->view('common/header', $this->datos);
            $this->load->view('snippets/listasnippets', $this->datos);
            $this->load->view('common/footer');
        }
        
        public function GetSnippets($texto) {

            header('Content-Type: application/json');
                
            $snippets = $this->snippetModel->GetCodigosByDescripcion($texto);
            
            echo json_encode($snippets);

        }
}
