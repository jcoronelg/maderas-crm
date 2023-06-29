<?php
require_once './dist/js/jwt/JWT.php';

use Firebase\JWT\JWT;

    class jwt_actions extends CI_Controller{
        private $_CI;   
        public function __construct()
        {
           

        }

        function authorize_externals($controller, $requestHeaders){
            if (!isset($requestHeaders) || $requestHeaders == '') {
                echo json_encode(array("status" => 400, "message" => "La petición no cuenta con el encabezado Authorization."), JSON_UNESCAPED_UNICODE);
                die ("Access Denied");       
            }
            else {
                $tkn = $requestHeaders;
                $response = $this->validateToken_authorize_externals($tkn, $controller);
                $res = json_decode($response);
                if($res->status != 200){
                    die ("Access Denied");
                }
            }
        }
        

        function authorize($controller, $requestHeaders){
            $this->helper($requestHeaders);
            $tkn = $this->generateToken($controller);
            $response = $this->validateToken_authorize($tkn, $controller);
            $res = json_decode($response);
            if($res->status != 200){
                $CI =& get_instance();
                $CI->load->view('errors/404not-found');
            }
        }

        function generateToken_externals($controller){
            $CI =& get_instance();
            $CI->load->library('session');
            $time = time();
            $JwtSecretKey = $this->getSecretKey($controller);
            $data = array(
                "iat" => $time, // Tiempo en que inició el token
                "exp" => $time + (24 * 60 * 60), // Tiempo en el que expirará el token (24 horas)
                "data" => array("sistema" => 'CAJA'),
            );
            $token = JWT::encode($data, $JwtSecretKey);
            return $token;
        }

        function generateToken($controller){
            
            $CI =& get_instance();
            $CI->load->library('session');
            $time = time();
            $JwtSecretKey = $this->getSecretKey($controller);
            $data = array(
                "iat" => $time, // Tiempo en que inició el token
                "exp" => $time + (24 * 60 * 60), // Tiempo en el que expirará el token (24 horas)
                "data" => array("id_rol" => $CI->session->userdata('id_rol'), "id_usuario" => $CI->session->userdata('id_usuario')),
            );
            $token = JWT::encode($data, $JwtSecretKey);
            return $token;
        }
    

        function getSecretKey($controller){

            $obj = (object) array(
                '62' => '679231_8076+4591_',
                '2736' => '43325_356+710_',
                '4001' => '394580_3999+373_',
                '7099' => '933926_8666+3337_',
                '9774' => '389884_1018+4283_',
                '6489' => '977929_5117+8773_',
                '615' => '338716_2828+866_',
                '2296' => '613618_5711+9834_',
                '137' => '414496_5913+3117_',
                '8900' => '906562_938+857_',
                '7396' => '148931_7647+2510_',
                '5336' => '345690_1289+7745_',
                '905' => '62461_6725+4614_',
                '2565' => '252654_4037+5723_',
                '4291' => '76041_2921+020_',
                '2410' => '71934_9922+1496_',
                '1955' => '571335_8549+3668_',
                '3604' => '461874_6625+6128_',
                '1272' => '37381_8478+4325_',
                '5029' => '904122_6350+3670_',
                '5897' => '961194_576+3640_',
                '3096' => '41556_9052+1085_',
                '8912' => '954291_8938+3785_',
                '7346' => '271946_2759+3328_',
                '7831' => '916853_8514+8128_',
                '6705' => '539482_2678+2335_',
                '2032' => '45485_293+6714_',
                '5995' => '964481_9824+7442_',
                '4802' => '483516_742+878_',
                '3484' => '736161_684+283_',
                '1544' => '947115_8726+6057_',
                '2892' => '481719_227+9817_',
                '7902' => '42163_9366+2221_',
                '1550' => '90452_2018+2139_',
                '733' => '794075_1046+1214_',
                '2278' => '514159_2121+326_',
                '8669' => '322510_4759+1893_',
                '5773' => '474151_5568+1667_',
                '2290' => '417969_4529+5994_',
                '3186' => '42988_5997+504_',
                '9717' => '23480_7660+6947_',
                '8761' => '871697_737+8339_',
                '9775' => '204954_4992+7056_',
                '3356' => '601627_1972+5620_',
                '5423' => '55884_9965+120_',
                '1499' => '17315_1724+5762_',
                '3522' => '84891_4114+798_',
                '9850' => '616765_1583+1676_',
                '4579' => '899814_5230+3138_',
                '9472' => '59417_9522+9069_',
                '3515' => '458867_6328+6486_',
                '7520' => '946080_4384+756_',
                '3450' => '937262_3521+2345_',
                '4582' => 'thisismysecretkeytest', // Internomex
                '9860' => '&66a5k_f7k133+c9r$OFt' //DRAGON
            );
            return $obj->$controller;
        }
        function validateUserPass($userName, $password){
            if($userName == 'ojqd58DY3@' && $password == 'I2503^831NQqHWxr')
                return json_encode(array("status" => 200, "message" => "Usuario y contraseña autenticados con éxito."));
            else
                return json_encode(array("status" => 404, "message" => "El usuario no se ha podido identificar"));
        }
        function getSecretKey2(){
           
            return 'ThisIsMySecretKey';
        }

        function validateToken($token)
        {
            $time = time();
            $JwtSecretKey = $this->getSecretKey2();
            $result = JWT::decode($token, $JwtSecretKey, array('HS256'));
            if (in_array($result, array('ALR001', 'ALR003', 'ALR004', 'ALR005', 'ALR006', 'ALR007', 'ALR008', 'ALR009', 'ALR010', 'ALR012', 'ALR013'))) {
                return json_encode(array("timestamp" => $time, "status" => 503, "error" => "Servicio no disponible", "exception" => "Servicio no disponible", "message" => "El servidor no está listo para manejar la solicitud. Por favor, inténtelo de nuevo más tarde."));
            } else if ($result == 'ALR002') {
                return json_encode(array("timestamp" => $time, "status" => 400, "error" => "Solicitud incorrecta", "exception" => "Número incorrecto de parámetros", "message" => "Verifique la estructura del token enviado."));
            } else if ($result == 'ALR011') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Verificación de firma fallida", "message" => "Estructura no válida del token enviado."));
            } else if ($result == 'ALR014') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Token caducado", "message" => "El tiempo de vida del token ha expirado."));
            } else {
                return json_encode(array("status" => 200, "message" => "Autenticado con éxito.", "data"=> $result));
            }
        }

        function validateToken_authorize($token, $controller)
        {
            $CI =& get_instance();
            $CI->load->library('session');
            $time = time();
            $JwtSecretKey = $this->getSecretKey($controller);
            $result = JWT::decode($token, $JwtSecretKey, array('HS256'));
            if (in_array($result, array('ALR001', 'ALR003', 'ALR004', 'ALR005', 'ALR006', 'ALR007', 'ALR008', 'ALR009', 'ALR010', 'ALR012', 'ALR013'))) {
                return json_encode(array("timestamp" => $time, "status" => 503, "error" => "Servicio no disponible", "exception" => "Servicio no disponible", "message" => "El servidor no está listo para manejar la solicitud. Por favor, inténtelo de nuevo más tarde."));
            } else if ($result == 'ALR002') {
                return json_encode(array("timestamp" => $time, "status" => 400, "error" => "Solicitud incorrecta", "exception" => "Número incorrecto de parámetros", "message" => "Verifique la estructura del token enviado."));
            } else if ($result == 'ALR011') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Verificación de firma fallida", "message" => "Estructura no válida del token enviado."));
            } else if ($result == 'ALR014') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Token caducado", "message" => "El tiempo de vida del token ha expirado."));
            } else {
                $validate= true;
                $keys = array_keys((array)$result->data );
                foreach($keys as $key){
                    if($result->data->$key != $CI->session->userdata($key) || $result->data->$key == null){
                        $validate = false;
                    }
                }
                if($validate){
                    return json_encode(array("status" => 200, "message" => "Autenticado con éxito.", "data"=> $result));
                }else{
                    return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Verificación de firma fallida", "message" => "Estructura no válida del token enviado."));
                }
            }
        }

        function validateToken_authorize_externals($token, $controller){
            $CI =& get_instance();
            $CI->load->library('session');
            $time = time();
            $JwtSecretKey = $this->getSecretKey($controller);
            $result = JWT::decode($token, $JwtSecretKey, array('HS256'));
            if (in_array($result, array('ALR001', 'ALR003', 'ALR004', 'ALR005', 'ALR006', 'ALR007', 'ALR008', 'ALR009', 'ALR010', 'ALR012', 'ALR013'))) {
                return json_encode(array("timestamp" => $time, "status" => 503, "error" => "Servicio no disponible", "exception" => "Servicio no disponible", "message" => "El servidor no está listo para manejar la solicitud. Por favor, inténtelo de nuevo más tarde."));
            } else if ($result == 'ALR002') {
                return json_encode(array("timestamp" => $time, "status" => 400, "error" => "Solicitud incorrecta", "exception" => "Número incorrecto de parámetros", "message" => "Verifique la estructura del token enviado."));
            } else if ($result == 'ALR011') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Verificación de firma fallida", "message" => "Estructura no válida del token enviado."));
            } else if ($result == 'ALR014') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Token caducado", "message" => "El tiempo de vida del token ha expirado."));
            } else {
                if(!$this->getSistema($result->data->username) || $result->data->username == null){
                    $validate = false;
                }else{
                    $validate= true;
                }
                if($validate){
                    return json_encode(array("status" => 200, "message" => "Autenticado con éxito.", "data"=> $result));
                }else{
                    return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Verificación de firma fallida", "message" => "Estructura no válida del token enviado."));
                }
            }
        }

        function helper($requestHeaders){
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: Content-Type,Origin, authorization, X-API-KEY,X-Requested-With,Accept,Access-Control-Request-Method');
            header('Access-Control-Allow-Method: GET, POST, PUT, DELETE,OPTION');
            $urls = array('https://prueba.gphsis.com','prueba.gphsis.com','localhost','http://localhost','127.0.0.1','https://rh.gphsis.com','rh.gphsis.com','https://maderascrm.gphsis.com','maderascrm.gphsis.com');
            date_default_timezone_set('America/Mexico_City');
            

            //echo $_SERVER['HTTP_ORIGIN'];
            if(isset($requestHeaders['origin'])){
                $origin = $requestHeaders;
            }else if(array_key_exists('HTTP_ORIGIN',$_SERVER)){
                $origin = $_SERVER['HTTP_ORIGIN'];
            }else if(array_key_exists('HTTP_PREFERER',$_SERVER)){
                $origin = $_SERVER['HTTP_PREFERER'];
            }
            else{
                $origin = $_SERVER['HTTP_HOST'];
            }
            if(in_array($origin,$urls) || strpos($origin,"192.168")){
              
                }else{
                    die ("Access Denied");       
                }
        }

        function getSistema($sistema) {
            $obj = (object) array(
                'caja' => 1,
                'suma_outs_9346' => 2,
                'ojqd58DY3@' => 3
            );
            if($obj->$sistema)
                return true;
            else
                return false;
        }

        function decodeData($controller, $token){
            $time = time();
            $JwtSecretKey = $this->getSecretKey($controller);
            $result = JWT::decode($token, $JwtSecretKey, array('HS256'));
            if (in_array($result, array('ALR001', 'ALR003', 'ALR004', 'ALR005', 'ALR006', 'ALR007', 'ALR008', 'ALR009', 'ALR010', 'ALR012', 'ALR013'))) {
                return json_encode(array("timestamp" => $time, "status" => 503, "error" => "Servicio no disponible", "exception" => "Servicio no disponible", "message" => "El servidor no está listo para manejar la solicitud. Por favor, inténtelo de nuevo más tarde."));
            } else if ($result == 'ALR002') {
                return json_encode(array("timestamp" => $time, "status" => 400, "error" => "Solicitud incorrecta", "exception" => "Número incorrecto de parámetros", "message" => "Verifique la estructura del token enviado."));
            } else if ($result == 'ALR011') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Verificación de firma fallida", "message" => "Estructura no válida del token enviado."));
            } else if ($result == 'ALR014') {
                return json_encode(array("timestamp" => $time, "status" => 401, "error" => "No autorizado", "exception" => "Token caducado", "message" => "El tiempo de vida del token ha expirado."));
            } else
                return $result;
        }
    }
?>