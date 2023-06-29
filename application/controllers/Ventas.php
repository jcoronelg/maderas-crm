<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {
	public function __construct() {
        
		parent::__construct();
        $this->load->model(array('Ventas_modelo', 'Statistics_model', 'asesor/Asesor_model'));
        $this->load->library(array('get_menu', 'Jwt_actions'));
		$this->load->helper(array('url','form'));
        $this->jwt_actions->authorize('3515', $_SERVER['HTTP_HOST']);
		$this->load->database('default');
        $this->validateSession();

        $val =  $this->session->userdata('certificado'). $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $_SESSION['rutaController'] = str_replace('' . base_url() . '', '', $val);
    }

    public function validateSession() {
        if($this->session->userdata('id_usuario') == "" || $this->session->userdata('id_rol') == "")
            redirect(base_url() . "index.php/login");
    }

	public function index() {
        $id_rol = $this->session->userdata('id_rol');
		if($id_rol == FALSE || ($id_rol != '1' && $id_rol != '2' && $id_rol != '3' && $id_rol != '4' && $id_rol != '5'
                && $id_rol != '7' && $id_rol != '9' && $id_rol != '6' && $id_rol != '18' && $id_rol != '63')) {
			redirect(base_url().'login');
		}
        switch ($id_rol) {
            case '1': // DIRECTOR
            case '2': // SUBDIRECTOR
            case '3': // GERENTE
            case '4': // ASISTENTE DIRECCIÓN
            case '5': // ASISTENTE SUBDIRECCIÓN
            case '6': // ASISTENTE GERENCIA
            case '7': // ASESOR
            case '9': // COORDINADOR
            case '18': // DIRECTOR TI
            case '63': // CONTROL INTERNO
            default: // POR DEFECTO
                $this->load->view('template/header');
                $this->load->view("template/home");
                $this->load->view('template/footer');
            break;
        }
	}

    public function repoVtasAsesor(){
        $this->validateSession();
        $this->load->view('template/header');
        $this->load->view("ventas/vtas_periodo_asesor");
    }

    public function getInfRepoVta(){
        $data = $this->Ventas_modelo->getGralInfRepoVta()->result_array();
        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }
    }
    
    public function getInfDetVta(){
        if (isset($_POST) && !empty($_POST)) {
            $id_asesor = $this->input->post("user");
            $data = $this->Ventas_modelo->GetInfoDetalleVta($id_asesor)->result_array();
            if($data != null) {
                echo json_encode($data);
            } else {
                echo json_encode(array());
            }
        }else{
            echo json_encode(array());
        }
    }

}
