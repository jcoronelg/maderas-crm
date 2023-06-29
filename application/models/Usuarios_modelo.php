<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Usuarios_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getPersonalInformation()
    {
        return $this->db->query("SELECT id_usuario, nombre, apellido_paterno, apellido_materno, correo, usuario, telefono, rfc, usuario, contrasena, forma_pago FROM usuarios WHERE id_usuario = " . $this->session->userdata('id_usuario') . "");
    }

    function updatePersonalInformation($data, $id_usuario)
    {
        $response = $this->db->update("usuarios", $data, "id_usuario = $id_usuario");
        if (!$response) {
            return $finalAnswer = 0;
        } else {
            return $finalAnswer = 1;
        }
    }

    function getUsersList(){
        $id_rol = $this->session->userdata('id_rol');
        $id_lider = $this->session->userdata('id_lider');


        switch ($this->session->userdata('id_rol')) {
            case '54': // POPEA
                return $this->db->query("SELECT usuarios.id_usuario, id_rol, 
                CASE WHEN usuarios.nueva_estructura = 1 THEN oxcNE.nombre ELSE opcs_x_cats.nombre END puesto,
                CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno) AS nombre, 
                (CASE id_rol WHEN 7 THEN lider ELSE lider_coord END) AS jefe_directo, telefono, correo, usuarios.estatus, id_lider, id_lider_2, 0 nuevo, 
                usuarios.fecha_creacion, s.nombre sede, usuarios.nueva_estructura, usuarios.simbolico
                FROM usuarios 
                INNER JOIN (SELECT * FROM opcs_x_cats WHERE id_catalogo = 1) opcs_x_cats ON usuarios.id_rol = opcs_x_cats.id_opcion 
                LEFT JOIN (SELECT id_usuario AS id_lid, id_lider AS id_lider_2, CONCAT(apellido_paterno, ' ', apellido_materno, ' ', usuarios.nombre) lider FROM usuarios) AS lider_2 ON lider_2.id_lid = usuarios.id_lider 
                LEFT JOIN (SELECT id_usuario, id_lider AS id_lider3, CONCAT(apellido_paterno, ' ', apellido_materno, ' ', usuarios.nombre) lider_coord FROM usuarios) AS lider_3 ON lider_3.id_usuario = lider_2.id_lid 
                INNER JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(usuarios.id_sede AS VARCHAR(45))  
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = usuarios.id_rol AND oxcNE.id_catalogo = 83
                WHERE (id_rol IN (7) AND rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%' AND ISNULL(correo, '' ) NOT LIKE '%OOAM%' AND ISNULL(correo, '') NOT LIKE '%CASA%') ORDER BY nombre");
                break;
            case '19': // SUBDIRECTOR MKTD
            case '20': // GERENTE MKTD
                return $this->db->query("SELECT u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto,
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, s.nombre sede,
                CONCAT(us2.nombre, ' ', us2.apellido_paterno, ' ', us2.apellido_materno) jefe_directo2, 0 nuevo, u.fecha_creacion, u.nueva_estructura, u.simbolico
                FROM usuarios u 
                INNER JOIN sedes s ON CAST(s.id_sede as VARCHAR(45)) = u.id_sede
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                LEFT JOIN usuarios us2 ON us2.id_usuario = us.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = u.id_rol AND oxcNE.id_catalogo = 83
                WHERE u.estatus = 1 AND u.id_rol IN (7, 9) AND u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '' ) NOT LIKE '%test_%' AND oxc.id_catalogo = 1 ORDER BY s.nombre, nombre");
                break;
            case '4': // ASISTENTE DIRECCIÓN
                return $this->db->query("SELECT usuarios.id_usuario, id_rol, 
                CASE WHEN usuarios.nueva_estructura = 1 THEN oxcNE.nombre ELSE opcs_x_cats.nombre END puesto,
                CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno) AS nombre, 
                (CASE id_rol WHEN 7 THEN lider ELSE lider_coord END) AS jefe_directo, telefono, correo, usuarios.estatus, id_lider, id_lider_2, 0 nuevo, 
                usuarios.fecha_creacion, s.nombre sede, usuarios.nueva_estructura, usuarios.simbolico
                FROM usuarios 
                INNER JOIN (SELECT * FROM opcs_x_cats WHERE id_catalogo = 1) opcs_x_cats ON usuarios.id_rol = opcs_x_cats.id_opcion 
                LEFT JOIN (SELECT id_usuario AS id_lid, id_lider AS id_lider_2, CONCAT(apellido_paterno, ' ', apellido_materno, ' ', usuarios.nombre) lider FROM usuarios) AS lider_2 ON lider_2.id_lid = usuarios.id_lider 
                LEFT JOIN (SELECT id_usuario, id_lider AS id_lider3, CONCAT(apellido_paterno, ' ', apellido_materno, ' ', usuarios.nombre) lider_coord FROM usuarios) AS lider_3 ON lider_3.id_usuario = lider_2.id_lid 
                INNER JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(usuarios.id_sede AS VARCHAR(45))  
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = usuarios.id_rol AND oxcNE.id_catalogo = 83
                WHERE (id_rol IN (3, 7, 9) AND rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%' AND ISNULL(correo, '' ) NOT LIKE '%OOAM%' AND ISNULL(correo, '') NOT LIKE '%CASA%') ORDER BY nombre");                        
                break;
            case '5': // ASISTENTE SUBDIRECCIÓN
                if($this->session->userdata('id_usuario') == 4888 || $this->session->userdata('id_usuario') == 546) // ADRIANA PEREZ && DIRCE 3 (MÉRIDA) Y 11 (MONTERREY)
                    $id_sede = "(usuarios.id_sede LIKE ('%3%') OR usuarios.id_sede LIKE '%11%')";
                else if($this->session->userdata('id_usuario') == 10924 || $this->session->userdata('id_usuario') == 7097 || $this->session->userdata('id_usuario') == 7096 || $this->session->userdata('id_usuario') == 7324 || $this->session->userdata('id_usuario') == 5620) // GRISELL / EDGAR LEONARDO VE 4 (CIUDAD DE MÉXICO) Y 9 (SAN MIGUEL DE ALLENDE)
                    $id_sede = "(usuarios.id_sede LIKE '%4%' OR usuarios.id_sede LIKE '%9%' OR usuarios.id_sede LIKE '%13%') AND usuarios.id_usuario != ".$this->session->userdata('id_lider_2')."";
                else if($this->session->userdata('id_usuario') == 29 || $this->session->userdata('id_usuario') == 7934) // 29 FERNANDA MONJARAZ VE LO DE LEÓN Y GUADALAJARA
                    $id_sede = "(usuarios.id_sede LIKE '%5%' OR usuarios.id_sede LIKE '%12%')";
                else 
                    $id_sede = "(usuarios.id_sede LIKE('%".$this->session->userdata('id_sede')."%'))";

                if($this->session->userdata('id_usuario') == 29 || $this->session->userdata('id_usuario') == 7934)
                    $id_usuario = " OR usuarios.id_usuario IN (10105, 9585, 9704, 9404, 10107, 10106)";
                else 
                    $id_usuario = "";

                    return $this->db->query("SELECT usuarios.id_usuario, id_rol, 
                    CASE WHEN usuarios.id_usuario IN (3, 5, 607, 4) THEN 'Director regional' WHEN usuarios.nueva_estructura = 1 THEN oxcNE.nombre ELSE opcs_x_cats.nombre END AS puesto, 
                    CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno)
                    AS nombre, (CASE id_rol WHEN 7 THEN lider ELSE lider_coord END) AS jefe_directo, telefono, correo, usuarios.estatus, 
                    id_lider, id_lider_2, 0 nuevo, usuarios.fecha_creacion, s.nombre sede, usuarios.nueva_estructura, usuarios.simbolico 
                    FROM usuarios 
                    INNER JOIN (SELECT * FROM opcs_x_cats WHERE id_catalogo = 1) opcs_x_cats ON usuarios.id_rol = opcs_x_cats.id_opcion 
                    LEFT JOIN (SELECT id_usuario AS id_lid, id_lider AS id_lider_2, CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno) lider  
                    FROM usuarios) AS lider_2 ON lider_2.id_lid = usuarios.id_lider
                    LEFT JOIN (SELECT id_usuario, id_lider AS id_lider3, CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno) lider_coord  
                    FROM usuarios) AS lider_3 ON lider_3.id_usuario = lider_2.id_lid
                    LEFT JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(usuarios.id_sede AS VARCHAR(45))
                    LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = usuarios.id_rol AND oxcNE.id_catalogo = 83
                    WHERE ($id_sede AND id_rol IN (2, 3, 7, 9) AND rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '') NOT LIKE '%test_%' AND ISNULL(correo, '') NOT LIKE '%OOAM%')
                    $id_usuario
                    ORDER BY nombre");
                break;
            case '6': // ASISTENTE GERENCIA
                $id_lider = $this->session->userdata('id_lider');
                if ($this->session->userdata('id_usuario') == 895)
                    $where = "((id_lider = $id_lider OR id_lider_2 = $id_lider) AND id_rol IN (7, 9) AND rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%') OR (usuarios.id_usuario = $id_lider OR usuarios.id_lider = 896)";
                else if ($this->session->userdata('id_usuario') == 11656) { // Dulce María Facundo Torres VERÁ USUARIOS DE LA GERENCIA ACTUAL (7886 JESSIKA GUADALUPE NEAVES FLORES) Y LO DE SU ANTERIOR GERENCIA (106 ANA KARINA ARTEAGA LARA)
                    $id_lider = $this->session->userdata('id_lider') . ', 106';
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";
                }
                else if ($this->session->userdata('id_usuario') == 10795) { // ALMA GALICIA ACEVEDO QUEZADA
                    $id_lider = $this->session->userdata('id_lider') . ', 671';
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";
                }
                else if ($this->session->userdata('id_usuario') == 12449) { // MARCELA CUELLAR MORON
                    $id_lider = $this->session->userdata('id_lider') . ', 654';
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";
                }
                else if ($this->session->userdata('id_usuario') == 10270) { // ANDRES BARRERA VENEGAS
                    $id_lider = $this->session->userdata('id_lider') . ', 113';
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";
                }
                else
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";
                
                if($this->session->userdata('id_sede') == 6)
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR (usuarios.id_usuario IN (9827)) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";
                else if($this->session->userdata('id_sede') == 4)
                    $where = "(((id_lider IN ($id_lider) OR id_lider_2 IN ($id_lider)) AND id_rol IN (7, 9) AND (rfc NOT LIKE '%TSTDD%' AND ISNULL(correo, '' ) NOT LIKE '%test_%')) OR (usuarios.id_usuario IN (9359)) OR usuarios.id_usuario IN ($id_lider) OR usuarios.gerente_id IN ($id_lider))";

                return $this->db->query("SELECT usuarios.id_usuario, id_rol, 
                CASE WHEN usuarios.nueva_estructura = 1 THEN oxcNE.nombre ELSE opcs_x_cats.nombre END puesto,
                CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno)
                AS nombre, (CASE id_rol WHEN 7 THEN lider ELSE lider_coord END) AS jefe_directo, telefono, correo, usuarios.estatus, 
                id_lider, id_lider_2, 0 nuevo, usuarios.fecha_creacion, s.nombre sede, usuarios.nueva_estructura, usuarios.simbolico
                FROM usuarios 
                INNER JOIN (SELECT * FROM opcs_x_cats WHERE id_catalogo = 1) opcs_x_cats ON usuarios.id_rol = opcs_x_cats.id_opcion 
                LEFT JOIN (SELECT id_usuario AS id_lid, id_lider AS id_lider_2, CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno) lider  
                FROM usuarios) AS lider_2 ON lider_2.id_lid = usuarios.id_lider
                LEFT JOIN (SELECT id_usuario, id_lider AS id_lider3, CONCAT(usuarios.nombre, ' ', apellido_paterno, ' ', apellido_materno) lider_coord  
                FROM usuarios) AS lider_3 ON lider_3.id_usuario = lider_2.id_lid
                INNER JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(usuarios.id_sede AS VARCHAR(45))
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = usuarios.id_rol AND oxcNE.id_catalogo = 83
                WHERE $where
                ORDER BY nombre");
                break;
            case '41': // GENERALISTA
                if($this->session->userdata('id_usuario') == 4585) // PAOLA HURTADO HERNANDEZ 4 (CIUDAD DE MÉXICO) Y 9 (SAN MIGUEL DE ALLENDE)
                    $id_sede = "'4', '9'";
                else 
                    $id_sede = "'".$this->session->userdata('id_sede')."'";

                return $this->db->query("SELECT u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto,
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, u.correo, CASE WHEN DAY(u.fecha_creacion) >= 6 AND MONTH(u.fecha_creacion) = MONTH(GETDATE()) AND YEAR(u.fecha_creacion) = YEAR(GETDATE()) THEN 1 ELSE 0 END as nuevo, u.fecha_creacion, s.nombre sede, u.simbolico 
                FROM usuarios u 
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol
                INNER JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(u.id_sede AS VARCHAR(45))
                WHERE oxc.id_catalogo = 1 AND u.id_rol IN (7, 9, 3) AND u.id_sede IN ($id_sede) AND u.rfc NOT LIKE '%TSTDD%' AND ( u.correo IS NULL OR u.correo NOT LIKE '%test_%' ) ORDER BY nombre");
                break;
            case '13': // CONTRALORÍA
            case '17': // SUBDIRECTOR CONTRALORÍA
            case '70': // EJECUTIVO DE CONTRALORÍA JR
            case '32': // CONTRALORÍA CORPORATIVA
            case '63': // CONTRALORÍA CORPORATIVA
            case '33': // CONSULTA (CONTROL INTERNO)
            case '40': // COBRANZA
            case '73': // PRACTICANTE CONTRALORÍA
            case '80': // COORDINADOR DE CALL CENTER POSTVENTA
            case '81': // SUBDIRECCIÓN POSTVENTA
            case '55': // POSTVENTA
                return $this->db->query("SELECT pci2.abono_pendiente ,CONVERT(varchar,u.fechaIngreso,103) fechaIngreso, u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.id_usuario IN (3, 5, 607, 4) THEN 'Director regional' WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto, 
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, u.correo, oxc2.nombre forma_pago,
                s.nombre sede, CASE WHEN DAY(u.fecha_creacion) >= 6 AND MONTH(u.fecha_creacion) = MONTH(GETDATE()) AND YEAR(u.fecha_creacion) = YEAR(GETDATE()) THEN 1 ELSE 0 END as nuevo, u.fecha_creacion, u.ismktd,oxcN.nombre as nacionalidad,
                CASE WHEN oxcN.id_opcion = 0 THEN '2D572C' ELSE 'aeaeae' END AS color,oxcn.id_opcion as id_nacionalidad,u.forma_pago as id_forma_pago, u.nueva_estructura, u.simbolico
                FROM usuarios u 
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol AND oxc.id_catalogo = 1
                LEFT JOIN opcs_x_cats oxc2 ON oxc2.id_opcion = u.forma_pago AND oxc2.id_catalogo = 16
                LEFT JOIN opcs_x_cats oxcN ON oxcN.id_opcion = u.nacionalidad AND oxcN.id_catalogo = 11
                INNER JOIN sedes s ON s.id_sede = (CASE WHEN LEN (u.id_sede) > 2 THEN 2 ELSE u.id_sede END)
                LEFT JOIN (SELECT SUM(abono_neodata) abono_pendiente, id_usuario FROM pago_comision_ind WHERE estatus=1 and ( descuento_aplicado is null or descuento_aplicado=0) 
                GROUP BY id_usuario) pci2 ON pci2.id_usuario = u.id_usuario
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = u.id_rol AND oxcNE.id_catalogo = 83
                WHERE  u.id_rol IN (1, 2, 3, 7, 9, 25, 26, 27, 29, 30, 36) 
                AND (u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '' ) NOT LIKE '%test_%') 
                AND u.id_usuario NOT IN (821, 1366, 1923, 4340, 9623, 9624, 9625, 9626, 9627, 9628, 9629)
                OR u.id_usuario IN (9359, 9827)
                ORDER BY nombre");
                break;
            case '26': // MERCADÓLOGO
                return $this->db->query("SELECT u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto,
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, s.nombre sede,
                CONCAT(us2.nombre, ' ', us2.apellido_paterno, ' ', us2.apellido_materno) jefe_directo2, 0 nuevo, u.fecha_creacion, u.nueva_estructura, u.simbolico
                FROM usuarios u 
                INNER JOIN sedes s ON s.id_sede = u.id_sede
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                LEFT JOIN usuarios us2 ON us2.id_usuario = us.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = u.id_rol AND oxcNE.id_catalogo = 83
                WHERE u.estatus = 1 AND u.id_rol NOT IN (1, 2, 4, 5, 18, 19) AND u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '') NOT LIKE '%test_%' AND oxc.id_catalogo = 1 ORDER BY s.nombre, nombre");
                break;


            case '49': // CONSULTA (CAPITAL HUMANO DESCUENTOS UNIVERSIDAD)
                return $this->db->query("SELECT CONVERT(varchar,u.fechaIngreso,103) fechaIngreso, u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.id_usuario IN (3, 5, 607, 4) THEN 'Director regional' WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto, 
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, u.correo, oxc2.nombre forma_pago,
                s.nombre sede, CASE WHEN DAY(u.fecha_creacion) >= 6 AND MONTH(u.fecha_creacion) = MONTH(GETDATE()) AND YEAR(u.fecha_creacion) = YEAR(GETDATE()) THEN 1 ELSE 0 END as nuevo, 
                u.fecha_creacion, CASE WHEN du.id_usuario <> 0 THEN 1 ELSE 0 END as usuariouniv,
                (SELECT (MAX(fecha_creacion)) FROM auditoria aud WHERE u.id_usuario = aud.id_parametro AND aud.tabla='usuarios' AND col_afect='estatus' and anterior='1' and (nuevo='0' OR nuevo='3')) as fecha_baja, u.nueva_estructura, u.simbolico
                FROM usuarios u 
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol AND oxc.id_catalogo = 1
                LEFT JOIN opcs_x_cats oxc2 ON oxc2.id_opcion = u.forma_pago AND oxc2.id_catalogo = 16
                INNER JOIN sedes s ON s.id_sede = (CASE WHEN LEN (u.id_sede) > 1 THEN 2 ELSE u.id_sede END)
                LEFT JOIN descuentos_universidad du ON du.id_usuario = u.id_usuario
                --LEFT JOIN  (SELECT id_usuario FROM descuentos_universidad GROUP BY id_usuario) du ON du.id_usuario = u.id_usuario
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = u.id_rol AND oxcNE.id_catalogo = 83
                WHERE u.id_usuario not in (select id_usuario_d from relacion_usuarios_duplicados) AND (u.id_rol IN (3, 7, 9, 2) 
                AND (u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '' ) NOT LIKE '%test_%') AND u.id_usuario NOT IN (821, 1366, 1923, 4340, 4062, 4064, 4065, 4067, 4068, 4069, 6578, 712 , 9942, 4415, 3, 607)) OR u.id_usuario IN (9359, 9827)
                ORDER BY nombre");
                break;

            case '8': //SOPORTE
                if($this->session->userdata('id_usuario') != 1297)
                    $id_rol = "AND u.id_rol NOT IN ('18', '19', '20', '2', '1', '28')";
                else 
                    $id_rol = "";
                    
                return $this->db->query("SELECT u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.id_usuario IN (3, 5, 607, 4) THEN 'Director regional' WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto, 
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, u.correo, CASE WHEN DAY(u.fecha_creacion) >= 6 AND MONTH(u.fecha_creacion) = MONTH(GETDATE()) AND YEAR(u.fecha_creacion) = YEAR(GETDATE()) THEN 1 ELSE 0 END as nuevo, u.fecha_creacion, s.nombre sede, u.nueva_estructura, u.simbolico
                FROM usuarios u 
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol AND oxc.id_catalogo = 1
                LEFT JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(u.id_sede AS VARCHAR(45))
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = u.id_rol AND oxcNE.id_catalogo = 83
                WHERE (u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '' ) NOT LIKE '%test_%') $id_rol OR u.id_usuario IN (9359, 9827) ORDER BY nombre");
                break;

            default: // VE TODOS LOS REGISTROS
                if($this->session->userdata('id_usuario') != 1)
                    $id_rol = " AND u.id_rol NOT IN ('18', '19', '20','2','1','17','13','32','28')";
                else
                    $id_rol = "";

                return $this->db->query("SELECT u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
                u.telefono, 
                CASE WHEN u.id_usuario IN (3, 5, 607, 4) THEN 'Director regional' WHEN u.nueva_estructura = 1 THEN oxcNE.nombre ELSE oxc.nombre END puesto, 
                CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, u.correo, CASE WHEN DAY(u.fecha_creacion) >= 6 AND MONTH(u.fecha_creacion) = MONTH(GETDATE()) AND YEAR(u.fecha_creacion) = YEAR(GETDATE()) THEN 1 ELSE 0 END as nuevo, u.fecha_creacion, s.nombre sede, u.nueva_estructura, u.simbolico
                FROM usuarios u 
                LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
                INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol AND oxc.id_catalogo = 1
                LEFT JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(u.id_sede AS VARCHAR(45))
                LEFT JOIN opcs_x_cats oxcNE ON oxcNE.id_opcion = u.id_rol AND oxcNE.id_catalogo = 83
                WHERE (u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '' ) NOT LIKE '%test_%') $id_rol OR u.id_usuario IN (9359, 9827) ORDER BY nombre");
                break;
        }
    }

    function getPaymentMethod()
    {
        return $this->db->query("SELECT id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo = 16 AND estatus = 1 ORDER BY id_opcion, nombre");
    }

    function getMemberType()
    {
        switch ($this->session->userdata('id_rol')) {
            case '5': // ASISTENTE SUBDIRECCIÓN
                return $this->db->query("SELECT id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo = 1 AND estatus = 1 AND id_opcion IN (3, 7, 9) ORDER BY nombre");
                break;
            case '4': // ASISTENTE DIRECCIÓN
                return $this->db->query("SELECT id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo = 1 AND estatus = 1 AND id_opcion IN (7, 9) ORDER BY nombre");
            case '6': // ASISTENTE GERENCIA
                return $this->db->query("SELECT id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo = 1 AND estatus = 1 AND id_opcion IN (3, 7, 9) ORDER BY nombre");
                break;
            case '41': // GENERALISTA
                return $this->db->query("SELECT id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo = 1 AND estatus = 1 AND id_opcion IN (7, 9) ORDER BY nombre");
                break;
            default: // VE TODOS LOS REGISTROS (SOPORTE)
                return $this->db->query("SELECT id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo = 1 AND estatus = 1 ORDER BY nombre");
                break;
        }
    }

    function getHeadquarter()
    {
        switch ($this->session->userdata('id_rol')) {
            case '41': // GENERALISTA
                return $this->db->query("SELECT id_sede id_opcion, nombre FROM sedes WHERE estatus = 1 AND id_sede = " . $this->session->userdata('id_sede') . " ORDER BY nombre");
                break;
            default: // VE TODAS LAS SEDES (SOPORTE)
                return $this->db->query("SELECT id_sede id_opcion, nombre FROM sedes WHERE estatus = 1 ORDER BY nombre");
                break;
        }
    }

    function getLeadersList($headquarter, $type) {
        $id_lider = $this->session->userdata('id_lider');
        switch ($type) {
            case '2': // SUBDIRECTOR
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios 
                WHERE (id_rol = 1 AND estatus = 1) OR (id_usuario = $id_lider) OR (id_sede LIKE '%$headquarter%' AND id_rol = 2) ORDER BY nombre");
                break;
            case '3': // GERENTE
                $sede = '';
                $lider = "";
                if ($headquarter == 11)
                    $sede = " OR id_sede='3'";
                else if ($headquarter == 12)
                    $sede = " OR id_sede='5'";
                    return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                            id_rol = 2 AND (id_sede LIKE '%" . $headquarter . "%' $sede) $lider AND estatus = 1 ORDER BY nombre");
                break;
            case '4': // ASISTENTE DIRECTOR
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 1 AND estatus = 1 ORDER BY nombre");
                break;
            case '5': // ASISTENTE SUBDIRECTOR
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 2 AND id_sede LIKE '%" . $headquarter . "%' AND estatus = 1 ORDER BY nombre");
                break;
            case '6': // ASISTENTE GERENTE
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 3 AND id_sede LIKE '%" . $headquarter . "%' AND estatus = 1 ORDER BY nombre");
                break;
            case '7': // ASESOR
                if ($this->session->userdata('id_usuario') == 32) { // VALIDACIÓN ÚNICA PARA ASISTENTE DE GERENTE MONSERRAT - GTE ISABEL
                    return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 9 AND id_sede LIKE '%" . $headquarter . "%' AND estatus = 1
                                        UNION ALL
                                        SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_usuario = " . $this->session->userdata('id_lider') . " AND estatus = 1 ORDER BY nombre");
                } else {
                    return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol IN (3, 9) AND id_sede LIKE '%" . $headquarter . "%' AND rfc NOT LIKE '%TSTDD%' AND correo NOT LIKE '%test_%' AND estatus = 1 ORDER BY nombre");
                }
                break;
            case '9': // COORDINADOR DE VENTAS
                if ($headquarter == 3) {
                    return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 3 AND id_sede IN ('3', '6') AND rfc NOT LIKE '%TSTDD%' AND correo NOT LIKE '%test_%' AND estatus = 1 ORDER BY nombre");
                } else {
                    return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 3 AND id_sede LIKE '%" . $headquarter . "%' AND rfc NOT LIKE '%TSTDD%' AND correo NOT LIKE '%test_%' AND estatus = 1 ORDER BY nombre");
                }
                break;
            case '10': // EJECUTIVO ADMINISTRATIVO DE MKTD
            case '19': // SUBDIRECTOR MKTD
            case '25': // ASESOR DE CONTENIDO RRSS
            case '26': // MERCADÓLOGO
            case '27': // COMUNITY MANAGER
            case '28': // EJECUTIVO ADMINISTRATIVO
            case '29': // ASESOR COBRANZA
            case '30': // DESARROLLO WEB
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 18 AND estatus = 1 ORDER BY nombre");
                break;
            case '20': // GERENTE MKTD
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 19 AND id_sede LIKE '%" . $headquarter . "%' AND estatus = 1 ORDER BY nombre");
                break;
            case '22': // EJECUTIVO CLUB MADERAS
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 23 AND estatus = 1 ORDER BY nombre");
                break;
            case '1': // DIRECTOR
            case '8': // SOPORTE
            case '11': // ADMINISTRACIÓN
            case '12': // CAJA
            case '13': // CONTRALORÍA
            case '14': // DIRECCIÓN ADMINISTACIÓN
            case '15': // JURÍDICO
            case '16': // CONTRATACIÓN
            case '17': // SUBDIRECTOR CONTRALORÍA
            case '18': // DIRECTOR MKTD
            case '21': // CLIENTE
            case '23': // SUBDIRECTOR CLUB MADERAS
            case '24': // ASESOR USA
            case '31': // INTERNOMEX
            default:
                return $this->db->query("SELECT id_usuario, CONCAT(nombre, ' ', apellido_paterno, ' ', ISNULL(apellido_materno, '')) nombre, id_sede FROM usuarios WHERE 
                                        id_rol = 100 AND estatus = 1 ORDER BY nombre");
                break;
        }
    }

    function saveUser($data)
    {
        if ($data != '' && $data != null) {
            $response = $this->db->insert("usuarios", $data);
            if (!$response) {
                return $finalAnswer = 0;
            } else {
                return $finalAnswer = 1;
            }
        } else {
            return 0;
        }
    }

    function changeUserStatus($data, $id_usuario)
    {
        $response = $this->db->update("usuarios", $data, "id_usuario = $id_usuario");
        if (!$response) {
            return $finalAnswer = 0;
        } else {
            return $finalAnswer = 1;
        }
    }

    function getUserInformation($id_usuario)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE id_usuario = " . $id_usuario . "");
        return $query->result_array();
    }

    function updateUser($data, $id_usuario)
    {
        $response = $this->db->update("usuarios", $data, "id_usuario = $id_usuario");
        if (!$response) {
            return $finalAnswer = 0;
        } else {
            return $finalAnswer = 1;
        }
    }

    /*------CONSULTAS PARA EL CHAT-----------------------*/

    public function getNationality()
    {
        echo json_encode($this->Clientes_model->getNationality()->result_array());
    }
    public function getEstados()
    {
        echo json_encode($this->Clientes_model->getEstados()->result_array());
    }






















    function getAllFoldersPDF()
    {
        $this->db->select("*");
        $this->db->where('estatus', 1);
        $query = $this->db->get('archivos_carpetas');
        return $query;
    }

    function getChangelog($id_usuario)
    {
        switch ($this->session->userdata('id_rol')) {
            case '17': // SUBDIRECCIÓN CONTRALORÍA
            case '70': // Ejecutivo de contraloría JR
            case '80': // CONTRALORÍA CORPORTATICA
                $query = $this->db->query("SELECT fecha_creacion, creador, 
                (CASE col_afect 
                WHEN 'id_lider' THEN 'líder'
                WHEN 'id_rol' THEN 'rol'
                WHEN 'id_sede' THEN 'sede'
                WHEN 'apellido_paterno' THEN 'apellido paterno'
                WHEN 'apellido_materno' THEN 'apellido materno'
                WHEN 'telefono' THEN 'teléfono'
                WHEN 'forma_pago' THEN 'forma de pago'
                ELSE col_afect
                END
                )parametro_modificado,(
                CASE col_afect
                WHEN 'id_lider' THEN (SELECT CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre FROM usuarios WHERE id_usuario = nuevo)
                WHEN 'id_rol' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 1)
                WHEN 'id_sede' THEN (SELECT nombre FROM sedes WHERE id_sede = nuevo)
                WHEN 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 3)
                WHEN 'forma_pago' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 16)
                ELSE nuevo  
                END) AS nuevo,(
                CASE col_afect
                WHEN 'id_lider' THEN (SELECT CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre FROM usuarios WHERE id_usuario = anterior)
                WHEN 'id_rol' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 1)
                WHEN 'id_sede' THEN (SELECT nombre FROM sedes WHERE id_sede = anterior)
                WHEN 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 3)
                WHEN 'forma_pago' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 16)
                ELSE anterior  
                END) AS anterior
                FROM auditoria
                INNER JOIN (SELECT id_usuario AS id_creador, 
                CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) AS creador  FROM usuarios) 
                AS creadores ON CAST(id_creador AS VARCHAR(255)) = CAST(creado_por AS VARCHAR(255))
                WHERE id_parametro = $id_usuario AND tabla = 'usuarios' ORDER BY fecha_creacion DESC");
                break;
            case '41': // GENERALISTAS
            case '5': // ASISTENTE SUBDIRECCIÓN
            case '6': // ASISTENTE GERENCIA
            case '8': // ASISTENTE SUBDIRECCIÓN
                $query = $this->db->query("SELECT fecha_creacion, creador, 
                (CASE col_afect 
                WHEN 'id_lider' THEN 'líder'
                WHEN 'id_rol' THEN 'rol'
                WHEN 'id_sede' THEN 'sede'
                WHEN 'apellido_paterno' THEN 'apellido paterno'
                WHEN 'apellido_materno' THEN 'apellido materno'
                WHEN 'telefono' THEN 'teléfono'
                WHEN 'forma_pago' THEN 'forma de pago'
                ELSE col_afect
                END
                )parametro_modificado,(
                CASE col_afect
                WHEN 'id_lider' THEN (SELECT CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre FROM usuarios WHERE id_usuario = nuevo)
                WHEN 'id_rol' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 1)
                WHEN 'id_sede' THEN (SELECT nombre FROM sedes WHERE id_sede = nuevo)
                WHEN 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 3)
                WHEN 'forma_pago' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 16)
                ELSE nuevo  
                END) AS nuevo,(
                CASE col_afect
                WHEN 'id_lider' THEN (SELECT CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre FROM usuarios WHERE id_usuario = anterior)
                WHEN 'id_rol' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 1)
                WHEN 'id_sede' THEN (SELECT nombre FROM sedes WHERE id_sede = anterior)
                WHEN 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 3)
                WHEN 'forma_pago' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 16)
                ELSE anterior  
                END) AS anterior
                FROM auditoria
                INNER JOIN (SELECT id_usuario AS id_creador, 
                CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) AS creador  FROM usuarios) 
                AS CAST(id_creador AS VARCHAR(255)) = CAST(creado_por AS VARCHAR(255))
                WHERE id_parametro = $id_usuario AND col_afect NOT IN ('contrasena', 'tiene_hijos', 'sesion_activa', 'imagen_perfil', 'jerarquia_user', 'usuario') AND tabla = 'usuarios' ORDER BY fecha_creacion DESC");
                break;
            case '49': // CAPITAL HUMANO
                $query = $this->db->query("SELECT fecha_creacion, creador, col_afect parametro_modificado,(
                CASE col_afect
                WHEN 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 3)
                ELSE nuevo  
                END) AS nuevo,(
                CASE col_afect
                WHEN 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 3)
                ELSE anterior  
                END) AS anterior
                FROM auditoria
                INNER JOIN (SELECT id_usuario AS id_creador, 
				CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) AS creador  FROM usuarios) 
				AS creadores ON CAST(id_creador AS VARCHAR(255)) = CAST(creado_por AS VARCHAR(255))
                WHERE id_parametro = $id_usuario AND tabla = 'usuarios' ORDER BY fecha_creacion DESC");
                break;
        }
        return $query;
    }



    /**-------OPINION DE CUMPLIMIENTO */
    function Opn_cumplimiento($id_usuario)
    {
        return  $query = $this->db->query("SELECT * FROM opinion_cumplimiento WHERE id_usuario = " . $id_usuario . " order by fecha_creacion desc");
    }

    function SaveCumplimiento($user, $pdf, $opc, $obs = 'NULL')
    {
        $estatus = 1;
        if ($opc == 1) {
            $estatus = 2;
        }

        $respuesta = $this->db->query("INSERT INTO opinion_cumplimiento VALUES ($user,'$pdf',$estatus,GETDATE(), '$obs')");
        if (!$respuesta) {
            return 0;
        } else {
            return 1;
        }
    }

    function updatePDF($id)
    {
        $respuesta = $this->db->query("UPDATE opinion_cumplimiento set estatus=0 WHERE id_opn=$id");

        if (!$respuesta) {
            return 0;
        } else {
            return 1;
        }
    }

    function Update_OPN($usuario)
    {
        $respuesta = $this->db->query("UPDATE opinion_cumplimiento set estatus=2 WHERE id_usuario=$usuario and estatus=1;");

        if (!$respuesta) {
            return 0;
        } else {
            return 1;
        }
    }

    function getPersonalInformation2($id)
    {
        return $this->db->query("SELECT id_usuario, nombre, apellido_paterno, apellido_materno, correo, usuario, telefono, rfc, usuario, contrasena, forma_pago FROM usuarios WHERE id_usuario = " . $id . "");
    }

    public function getChangeLogUsers($id_usuario)
    {
        /*return "MODEL: ".$id_usuario;*/

        $query =  $this->db->query("SELECT fecha_creacion, creador, col_afect,(
                                CASE 
                                    WHEN col_afect = 'usuario' THEN (SELECT CONCAT( apellido_paterno,' ',apellido_materno,' ',nombre) as nombre FROM usuarios WHERE id_usuario = nuevo)
                                    WHEN col_afect = 'id_lider' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 10)
                                    WHEN col_afect = 'forma_pago' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 16)
                                    WHEN col_afect = 'id_sede' THEN (SELECT nombre FROM sedes WHERE CAST(id_sede AS VARCHAR(45)) = CAST(nuevo AS VARCHAR(45)))
                                    WHEN col_afect = 'id_rol' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 1)
                                    WHEN col_afect = 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = nuevo AND id_catalogo = 3)
                                    ELSE nuevo  
                                END) AS nuevo,(
                                CASE 
                                    WHEN col_afect = 'usuario' THEN (SELECT CONCAT( apellido_paterno,' ',apellido_materno,' ',nombre) as nombre FROM usuarios WHERE id_usuario = anterior)
                                    WHEN col_afect = 'id_lider' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 10)
                                    WHEN col_afect = 'forma_pago' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 16)
                                    WHEN col_afect = 'id_sede' THEN (SELECT nombre FROM sedes WHERE CAST(id_sede AS VARCHAR(45)) = CAST(anterior AS VARCHAR(45)))
                                    WHEN col_afect = 'id_rol' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 1)
                                    WHEN col_afect = 'estatus' THEN (SELECT nombre FROM opcs_x_cats WHERE id_opcion = anterior AND id_catalogo = 3)

                                    ELSE anterior  
                                END) AS anterior
                                FROM auditoria
                                INNER JOIN (SELECT id_usuario AS id_creador, CONCAT(nombre, ' ', apellido_paterno,' ',apellido_materno) AS creador  FROM usuarios) AS creadores ON CAST(id_creador AS VARCHAR(45)) = CAST(creado_por AS VARCHAR(45))
                                WHERE id_parametro = $id_usuario AND tabla = 'usuarios' ORDER BY fecha_creacion DESC");
        return $query->result_array();
    }

    function getCatalogs()
    {
        $id_rol = $this->session->userdata('id_rol');
        $whereTwo = "";
        if ($id_rol == 5 || $id_rol == 6) // MJ: ASISTENTE SUBDIRECCIÓN / GERENCIA
            $where = " AND id_opcion IN (2, 3, 7, 9)";
        else if ($id_rol == 4 || $id_rol == 41) { // MJ: ASISTENTE DIRECCIÓN / GENERALISTA
            $where = " AND id_opcion IN (7, 9, 3)";
            if ($id_rol == 41)
                $whereTwo = "AND id_sede = " . $this->session->userdata('id_sede') . "";
        } else if ($id_rol == 8) {
            $where = " AND id_opcion NOT IN (1,2,3,7,9,59)";
        } else // MJ: VE TODOS LOS REGISTROS
            $where = "";

        return $this->db->query("SELECT id_catalogo, id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo IN (16) AND estatus = 1 
        UNION ALL
        SELECT id_catalogo, id_opcion, nombre FROM opcs_x_cats WHERE id_catalogo IN (1) AND estatus = 1 $where
        UNION ALL
        SELECT 0 id_catalogo, id_sede id_opcion, nombre FROM sedes WHERE estatus = 1 $whereTwo
        ORDER BY nombre, id_catalogo");
    }

    function getMktdAvisersList()
    {
        $where = "";
        if ($this->session->userdata('id_rol') == 20)
            $where = " AND u.id_sede IN ('" . $this->session->userdata('id_sede') . "')";
        else {
            if ($this->session->userdata('id_usuario') == 1988)
                $where = " AND u.getUsersListByLeaderid_sede IN ('5')";
            else
                $where = " AND u.id_sede IN ('2', '3', '4', '6')";
        }
        return $this->db->query("SELECT u.estatus, u.id_usuario, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, u.correo,
        u.telefono, oxc.nombre puesto, CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) jefe_directo, s.nombre sede,
        CONCAT(us2.nombre, ' ', us2.apellido_paterno, ' ', us2.apellido_materno) jefe_directo2, 0 nuevo, u.fecha_creacion, u.ismktd FROM usuarios u 
        INNER JOIN sedes s ON CAST(s.id_sede as VARCHAR(45)) = u.id_sede
        LEFT JOIN usuarios us ON us.id_usuario = u.id_lider
        LEFT JOIN usuarios us2 ON us2.id_usuario = us.id_lider
        INNER JOIN opcs_x_cats oxc ON oxc.id_opcion = u.id_rol
        WHERE u.id_rol IN (7, 9) $where AND u.rfc NOT LIKE '%TSTDD%' AND ISNULL(u.correo, '' ) NOT LIKE '%test_%' AND oxc.id_catalogo = 1 ORDER BY s.nombre, nombre");
    }

    function changeUserType($data, $id_usuario)
    {
        $response = $this->db->update("usuarios", $data, "id_usuario = $id_usuario");
        if (!$response) {
            return $finalAnswer = 0;
        } else {
            return $finalAnswer = 1;
        }
    }

    public function ServicePostCH($url, $data = array())
    {
        $ch = curl_init($url);
        # Setup request to send json via POST.
        $payload = json_encode($data);
        //echo base64_encode($payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, base64_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Send request.
        $result = curl_exec($ch);
        //  print_r($result);
        curl_close($ch);
        $row = base64_decode($result);
        return   $row;
    }

    public function UpdateProspect($id_usuario, $id_lider, $rol_seleccionado, $rol_actual, $sedeCH, $sucursal, $datosCH)
    {
        $resultado = 0;
        //$url='https://prueba.gphsis.com/RHCV/index.php/WS/movimiento_interno_asesor';
        //RUTA DE PRUEBAS
        $url = "https://prueba.gphsis.com/RHCV/index.php/WS/movimiento_interno_asesor_v2";
        //RUTA DE PRODUCCIÓN
        //$url="https://rh.gphsis.com/index.php/WS/movimiento_interno_asesor";
        if ($rol_seleccionado == $rol_actual) {
            //ENTONCES NO HUBO UN CAMBIO DE ROL
            $query = $this->db->query("SELECT * FROM usuarios WHERE id_usuario = " . $id_usuario . " and id_lider=" . $id_lider . " ")->result_array();
            if (count($query) == 0) {
                //ENTONCES SI CAMBIO DE LIDER
                
                $getLider = $this->db->query("SELECT u.id_usuario as lider,u2.id_usuario as lider2 FROM usuarios u inner join usuarios u2 on u.id_lider=u2.id_usuario WHERE u.id_usuario = " . $id_lider . " ")->result_array();
                if ($rol_actual == 7) {
                    //ASESOR, CONSULTAR LOS PROSPECTOS QUE TIENE ASIGNADOS DE TIPO 0 

                    $datosCH['dcontrato']['idpuesto'] = 7;
                    $datosCH['dcontrato']['idgerente'] = $getLider[0]['lider2'];
                    $datosCH['dcontrato']['idcoordinador'] = $id_lider;
                    $datosCH['dcontrato']['idsedech'] = $sedeCH;
                    $datosCH['dcontrato']['idsucursalch'] = $sucursal;


                    $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
                } else if ($rol_actual == 9) {
;
                    $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
                    $datosCH['dcontrato']['idpuesto'] = 9;
                    $datosCH['dcontrato']['idgerente'] = $id_lider;
                    $datosCH['dcontrato']['idcoordinador'] = $id_usuario;
                    $datosCH['dcontrato']['idsedech'] = $sedeCH;
                    $datosCH['dcontrato']['idsucursalch'] = $sucursal;
                } else if ($rol_actual == 3) {

                    $datosCH['dcontrato']['idpuesto'] = 3;
                    $datosCH['dcontrato']['idgerente'] = $id_usuario;
                    $datosCH['dcontrato']['idcoordinador'] = $id_usuario;
                    $datosCH['dcontrato']['idsedech'] = $sedeCH;
                    $datosCH['dcontrato']['idsucursalch'] = $sucursal;
                    $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
                }
            } else {
                //NO CAMBIO DE LIDER Y TERMINA EL PROCESO, (SOLO SE ACTUALIZA SU INFO)
                $getLider = $this->db->query("SELECT u.id_usuario as lider,u2.id_usuario as lider2 FROM usuarios u inner join usuarios u2 on u.id_lider=u2.id_usuario WHERE u.id_usuario = " . $id_lider . " ")->result_array();
                $datosCH['dcontrato']['idpuesto'] = $rol_actual;
                $datosCH['dcontrato']['idgerente'] = $getLider[0]['lider2'];
                $datosCH['dcontrato']['idcoordinador'] = $id_lider;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;
                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            }
        } else {
            //$resultado=false;
            $getLider = $this->db->query("SELECT u.id_usuario as lider,u2.id_usuario as lider2 FROM usuarios u inner join usuarios u2 on u.id_lider=u2.id_usuario WHERE u.id_usuario = " . $id_lider . " ")->result_array();
            //SI HUBO UN CAMBIO DE ROL
            if ($rol_actual == 7 && $rol_seleccionado == 9) {
                //SE CAMBIO DE ASESOR A COORDINADOR
                $datosCH['dcontrato']['idpuesto'] = 9;
                $datosCH['dcontrato']['idgerente'] = $id_lider;
                $datosCH['dcontrato']['idcoordinador'] = $id_usuario;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;

                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            } else if ($rol_actual == 7 && $rol_seleccionado == 3) {
                //SE CAMBIO DE ASESOR A GERENTE
                $datosCH['dcontrato']['idpuesto'] = 3;
                $datosCH['dcontrato']['idgerente'] = $id_usuario;
                $datosCH['dcontrato']['idcoordinador'] = $id_usuario;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;

                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            } else if ($rol_actual == 9 && $rol_seleccionado == 7) {
                //SE CAMBIO DE COORDINADOR A ASESOR
                $datosCH['dcontrato']['idpuesto'] = 7;
                $datosCH['dcontrato']['idgerente'] = $getLider[0]['lider2'];
                $datosCH['dcontrato']['idcoordinador'] = $id_lider;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;

                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            } else if ($rol_actual == 9 && $rol_seleccionado == 3) {
                //SE CAMBIO DE COORDINADOR A GERENTE
                $datosCH['dcontrato']['idpuesto'] = 3;
                $datosCH['dcontrato']['idgerente'] = $id_usuario;
                $datosCH['dcontrato']['idcoordinador'] = $id_usuario;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;


                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            } else if ($rol_actual == 3 && $rol_seleccionado == 9) {
                //SE CAMBIO DE GERENTE A COORDINADOR
                $datosCH['dcontrato']['idpuesto'] = 9;
                $datosCH['dcontrato']['idgerente'] = $id_lider;
                $datosCH['dcontrato']['idcoordinador'] = $id_usuario;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;
                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            }
            else if ($rol_actual == 3 && $rol_seleccionado == 7) {
                //SE CAMBIO DE GERENTE A ASESOR
                $datosCH['dcontrato']['idpuesto'] = 7;
                $datosCH['dcontrato']['idgerente'] = $getLider[0]['lider2'];
                $datosCH['dcontrato']['idcoordinador'] = $id_lider;
                $datosCH['dcontrato']['idsedech'] = $sedeCH;
                $datosCH['dcontrato']['idsucursalch'] = $sucursal;
                $resultado = $this->Usuarios_modelo->ServicePostCH($url, $datosCH);
            }
        }





        //  print_r($resultado);
        $r = json_decode($resultado);
        //  print_r($r);
        if (isset($r->resultado)) {
            if ($r->resultado == 1) {
                return json_decode($r->resultado);
            } else {
                return json_decode(0);
            }
        } else {
            return json_decode(0);
        }
    }
    function DatosProsp($id_usuario)
    {
        $query = $this->db->query("SELECT 
        CASE 
        WHEN u.id_rol = 7 THEN u.id_usuario 
        WHEN u.id_rol = 9 THEN u.id_usuario
        WHEN u.id_rol = 3 THEN u.id_usuario
        ELSE u.id_usuario
        END AS id_usuario_asesor,
        CASE 
        WHEN u.id_rol = 7 THEN c.id_usuario 
        WHEN u.id_rol = 9 THEN u.id_usuario
        WHEN u.id_rol = 3 THEN u.id_usuario
        ELSE u.id_usuario
        END AS id_coordinador,
        CASE 
        WHEN u.id_rol = 7 THEN g.id_usuario 
        WHEN u.id_rol = 9 THEN c.id_usuario 
        WHEN u.id_rol = 3 THEN u.id_usuario
        ELSE u.id_usuario
        END AS id_gerente,
        CASE 
        WHEN u.id_usuario = 2 THEN 0 
        WHEN u.id_rol = 7 THEN s.id_usuario 
        WHEN u.id_rol = 9 THEN g.id_usuario 
        WHEN u.id_rol = 3 THEN c.id_usuario
        ELSE  u.id_usuario END id_subdirector,
        CASE 
        WHEN u.id_usuario = 2 THEN 0 
        WHEN u.id_rol = 7 THEN IIF(r.id_usuario = 2, 0, r.id_usuario) 
        WHEN u.id_rol = 9 THEN IIF(s.id_usuario =2,0,s.id_usuario)
        WHEN u.id_rol = 3 THEN IIF(g.id_usuario=2,0,g.id_usuario)
        ELSE IIF(c.id_usuario=2,0,c.id_usuario) END id_regional
        FROM usuarios u 
        LEFT JOIN usuarios c ON u.id_lider = c.id_usuario
        LEFT JOIN usuarios g ON c.id_lider = g.id_usuario
        LEFT JOIN usuarios s ON g.id_lider = s.id_usuario
        LEFT JOIN usuarios r ON s.id_lider = r.id_usuario
        WHERE u.id_usuario = $id_usuario ");
        return $query;
    }

    function getUsersListByLeader($idUsuario)
    {
        $id_rol = $this->session->userdata('id_rol');
        if ($id_rol == 2) // MJ: SUBDIRECTOR / REGIONAL
            $where = "u.subdirector_id = $idUsuario OR u.regional_id = $idUsuario ";
        else if ($id_rol == 3) // MJ: GERENTE
            $where = "u.gerente_id = $idUsuario ";
        else if ($id_rol == 9) // MJ: COORDINADOR
            $where = "u.id_lider = $idUsuario ";
        return $this->db->query("SELECT u.id_usuario, u.id_rol, opcs_x_cats.nombre AS puesto, CONCAT(u.nombre, ' ', u.apellido_paterno, ' ', u.apellido_materno) nombre, 
            UPPER(CONCAT(u1.nombre, ' ', u1.apellido_paterno, ' ', u1.apellido_materno)) coordinador, 
            UPPER(CONCAT(u2.nombre, ' ', u2.apellido_paterno, ' ', u2.apellido_materno)) gerente, 
            UPPER(CONCAT(u3.nombre, ' ', u3.apellido_paterno, ' ', u3.apellido_materno)) subdirector, 
            UPPER(CONCAT(u4.nombre, ' ', u4.apellido_paterno, ' ', u4.apellido_materno)) regional, 
            u.telefono, u.correo, u.estatus, 
            u.id_lider, 0 nuevo, u.fecha_creacion, s.nombre sede 
            FROM usuarios u
            INNER JOIN opcs_x_cats ON u.id_rol = opcs_x_cats.id_opcion and id_catalogo = 1
            INNER JOIN sedes s ON CAST(s.id_sede AS VARCHAR(45)) = CAST(u.id_sede AS VARCHAR(45))
            LEFT JOIN usuarios u1 ON u1.id_usuario = u.id_lider
            LEFT JOIN usuarios u2 ON u2.id_usuario = u.gerente_id
            LEFT JOIN usuarios u3 ON u3.id_usuario = u.subdirector_id
            LEFT JOIN usuarios u4 ON u4.id_usuario = u.regional_id
            WHERE $where
            ORDER BY u.id_rol");
    }

    function VerificarComision($idUsuario)
    {
        return $this->db->query("SELECT SUM(abono_neodata) abono_pendiente, id_usuario 
            FROM pago_comision_ind 
            WHERE id_usuario=$idUsuario and estatus=1 and ( descuento_aplicado is null or descuento_aplicado=0) group by id_usuario");
    }

    function getUserPassword()
    {
        switch ($this->session->userdata('id_rol')) {
            case '4': //ASISTENTE DIRECCION
                return $this->db->query("SELECT usuario, contrasena FROM usuarios WHERE id_rol = 61");
                break;
        }
    }

    function updatePersonalPassword($data)
    {
        $response = $this->db->update("usuarios", $data, "id_rol = 61");

        if (!$response) {
            return $finalAnswer = 0;
        } else {
            return $finalAnswer = 1;
        }
    }

    function getFormaPago($id_factura)
    {
        return $this->db->query("select * from opcs_x_cats where id_catalogo=16 and id_opcion=$id_factura")->result_array();
    }

    function deleteDocumentoExtranjero($idDocumento)
    {
        $response = $this->db->query("UPDATE opinion_cumplimiento SET estatus = 0 WHERE id_opn = $idDocumento");

        return $response;
    }
}
