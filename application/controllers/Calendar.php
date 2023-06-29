<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'vendor/autoload.php';

class Calendar extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model(array('Calendar_model', 'General_model'));
        $this->load->library(array('session','form_validation', 'get_menu', 'Email'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
        date_default_timezone_set('America/Mexico_City');
        $this->validateSession();

        $val =  $this->session->userdata('certificado'). $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $_SESSION['rutaController'] = str_replace('' . base_url() . '', '', $val);
    }

    public function validateSession(){
        if($this->session->userdata('id_usuario')=="" || $this->session->userdata('id_rol')==""){
            redirect(base_url() . "index.php/login");
        }
    }

    public function calendar(){
        $client = new Google_Client();
        $client ->setAccessType("offline");
        $client->setIncludeGrantedScopes(true); 
        // Enter your Client ID
        $client->setAuthConfig('./client_secret.json');
        // Enter the Redirect URL
        $client ->setRedirectUri('http://localhost/sisfusion/Dashboard/dashboard');
        // Adding those scopes which we want to get ( calendar Information)
        $client ->addScope("https://www.googleapis.com/auth/calendar");

        $datos['googleEvents'] = '';
        if($_POST['googleCode'] != ''){
            $res = $client->isAccessTokenExpired();
            $token = $client->fetchAccessTokenWithAuthCode($_POST['googleCode']);
            if(!isset($token["error"])){
                $client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $this->session->set_userdata('refresh_token', $token['refresh_token']);

                 // Print the next 10 events on the user's calendar.
                $calendarId = 'primary';
                $optParams = array(
                    'maxResults' => 2500,
                    'orderBy' => 'startTime',
                    'singleEvents' => TRUE,
                    'timeMin' => '1090-12-11T23:59:59.000Z',
                    'showDeleted' => FALSE,
                );

                $service = new Google_Service_Calendar($client);
                $results = $service->events->listEvents($calendarId, $optParams);
                $datos['googleEvents'] = $results->items;
            }
        }
        $login_button = '';
        
        if(!$this->session->userdata('access_token')){
            $login_button = '<a href="'.$client->createAuthUrl().'"><i class="fab fa-google"></i></a>';
        }
        $datos['login_button'] =  $login_button;
        $datos['googleCode'] = $_POST['googleCode'];

        $this->load->view("dashboard/agenda/calendar", $datos);
    }

    public function Events(){
        $ids = $this->input->post('ids');
        $data = $this->Calendar_model->getEvents($ids, $this->session->userdata('id_usuario'));
        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }    
    }

    public function getAppointmentData(){
        $data = $this->Calendar_model->getAppointmentData($_POST['idAgenda']);
        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }
    }

    public function updateAppointmentData(){
        $objDatos = json_decode(file_get_contents("php://input"));
        $data = array(
            "medio" => $objDatos->estatus_recordatorio2,
            "fecha_cita" => str_replace("T", " ", $objDatos->dateStart),
            "titulo" => $objDatos->evtTitle,
            "fecha_final" => str_replace("T", " ", $objDatos->dateEnd),
            "id_direccion" => isset($objDatos->id_direccion) ? $objDatos->id_direccion :null,
            "direccion" => isset($objDatos->direccion) ? $objDatos->direccion :null,
            "descripcion" => $objDatos->description == '' ? null:$objDatos->description,
            "idGoogle" => isset($objDatos->inserted) ? $objDatos->inserted:null

        );
        $response = $this->General_model->updateRecord('agenda', $data, 'id_cita',  $objDatos->idAgenda);

        if($response){
            if(isset($objDatos->telefono2)){
                $dataN = array(
                    "telefono_2" => $objDatos->telefono2,
                );
                $responseN = $this->General_model->updateRecord('prospectos', $dataN, 'id_prospecto',  $objDatos->prospectoE);

                if($responseN)
                    echo json_encode(array("status" => 200, "message" => "Se ha actualizado el recordatorio y dato del prospecto correctamente."));
                else 
                    echo json_encode(array("status" => 400, "message" => "Oops, algo salió mal.Se ha actualizado el recordatorio pero no el dato del prospecto."));
            }
            else
                echo json_encode(array("status" => 200, "message" => "Se ha actualizado el recordatorio correctamente."));
        }
        else 
            echo json_encode(array("status" => 503, "message" => "Oops, no se ha podido actualizar el recordatorio ni el dato del prospecto."));
    }

    public function deleteAppointment(){
        $response = $this->Calendar_model->deleteAppointment($_POST['idAgenda']);
        echo json_encode($response);
    }

    public function getStatusRecordatorio(){
        echo json_encode($this->Calendar_model->getStatusRecordatorio()->result_array());
    }

    public function insertRecordatorio(){
        $objDatos = json_decode(file_get_contents("php://input"));
        $data = array(
            "fecha_creacion" => date("Y-m-d H:i:s"),
            "medio" => $objDatos->estatus_recordatorio,
            "fecha_cita" =>  str_replace("T", " ", $objDatos->dateStart),
            "idCliente" => $objDatos->id_prospecto_estatus_particular,
            "idOrganizador" => $this->session->userdata('id_usuario'),
            "estatus" => 1,
            "titulo" => $objDatos->evtTitle, 
            "fecha_final" =>  str_replace("T", " ", $objDatos->dateEnd),
            "id_direccion" => isset($objDatos->id_direccion) ? $objDatos->id_direccion :null,
            "direccion" => isset($objDatos->direccion) ? $objDatos->direccion :null,
            "descripcion" => $objDatos->description,
            "idGoogle" => isset($objDatos->idGoogle) ? $objDatos->idGoogle:null
        );

        $response = $this->General_model->addRecord('agenda', $data);

        if ($response){
            $dataN = array(
                "fecha_modificacion" => date("Y-m-d H:i:s"),
                "modificado_por" => $this->session->userdata('id_usuario'),
                "estatus_particular" => 3
            );

            if(isset($objDatos->telefono2)){
                $dataN['telefono_2'] = $objDatos->telefono2;
            }

            $responseN = $this->General_model->updateRecord('prospectos', $dataN, 'id_prospecto', $this->input->post("id_prospecto_estatus_particular"));

            if ($responseN)
                echo json_encode(array("status" => 200, "message" => "Se ha registrado el evento de manera exitosa."));
            else 
                echo json_encode(array("status" => 400, "message" => "Oops, algo salió mal. No se ha podido actualizar el estatus del prospecto"));
        } else 
            echo json_encode(array("status" => 503, "message" => "Oops, no se ha podido agendar cita, ni actualizar estatus del prospecto"));
    }

    public function getProspectos(){
        $idUser = $this->session->userdata('id_usuario');
        $data = $this->Calendar_model->getProspectos($idUser)->result_array();

        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }    
    }

    public function getOfficeAddresses(){
        $data = $this->Calendar_model->getOfficeAddresses()->result_array();

        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }
    }

    public function getManagers(){
        $idUser = $this->session->userdata('id_usuario');
        $data = $this->Calendar_model->getManagers($idUser)->result_array();

        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        } 
    }

    public function getCoordinators(){
        $idUser = $this->input->post('id');
        $data = $this->Calendar_model->getCoordinators($idUser)->result_array();

        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        } 
    }

    public function getAdvisers(){
        $idUser = $this->input->post('id');
        $data = $this->Calendar_model->getAdvisers($idUser)->result_array();

        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        } 
    }

    public function setAppointmentRate(){
        $objDatos = json_decode(file_get_contents("php://input"));
        $data = array(
            "estatus" => 2,
            "evaluacion" => $objDatos->rate,
            "observaciones" => $objDatos->observaciones
        );
        
        $response = $this->General_model->updateRecord('agenda', $data, 'id_cita',  $objDatos->idAgenda);

        if ($response)
            echo json_encode(array("status" => 200, "message" => "El registro se ha actualizado de manera exitosa."));
        else 
            echo json_encode(array("status" => 503, "message" => "Oops, algo salió mal. No se ha podido actualizar el estatus del prospecto"));
    }

    public function AllEvents(){
        $data['data'] = $this->Calendar_model->getAllEvents($this->session->userdata('id_usuario'));
        if($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }    
    }

    public function updateNFinishAppointments(){
        $response = $this->General_model->updateBatch("agenda", json_decode(file_get_contents("php://input")), "id_cita"); // MJ: SE MANDA CORRER EL UPDATE BATCH
        if ($response)
            echo json_encode(array("status" => 200, "message" => "El registro se ha actualizado de manera exitosa."));
        else 
            echo json_encode(array("status" => 503, "message" => "Oops, algo salió mal. No se ha podido actualizar la información de la(s) cita(s)."));
    }
}
 
