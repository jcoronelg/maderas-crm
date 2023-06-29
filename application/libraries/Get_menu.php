<?php
    class get_menu{
        private $_CI;   
        public function __construct()
        {
            $this->_CI = & get_instance();
            $this->_CI->load->model('General_model','gm');
        }
 
        function get_menu_data($id_rol,$id_usuario,$estatus){
            
            if ($id_rol == FALSE) {
                redirect(base_url());
            }
            $datos = array();
            $datos['datos2'] = $this->_CI->gm->get_menu($id_rol,$id_usuario,$estatus)->result();
            $datos['datos3'] = $this->_CI->gm->get_children_menu($id_rol,$id_usuario,$estatus)->result();
            return $datos;
        }

        function get_submenu_data($id_rol, $id_usuario,$estatus){
            if ($id_rol == FALSE) {
                redirect(base_url());
            }
            $datos = array();
            $datos = $this->_CI->gm->get_submenu_data($id_rol, $id_usuario,$estatus)->result();
            return $datos;
        }
    }
?>