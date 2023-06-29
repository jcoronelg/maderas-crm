<?php
  class formatter{

    private $_CI;
    public function __construct()
    {
      $this->_CI = & get_instance();
    }

    function removeNumberFormat($input){ // MJ: REMUEVE ESPACIOS EN BLANCO, ., ( Y )
      $search  = array('$', ',');
      $replace = array('');
      $subject = $input;
      return str_replace($search, $replace, $subject);
    }

    function monthFromNumberToLetter($month){ // MJ: CONVIERTE EL MES EN NÚMERO A LETRA
      $date = DateTime::createFromFormat('!m', $month);
      $final_month = strftime("%B", $date->getTimestamp());
      return $final_month;
    }

    function eliminar_tildes($cadena){

      //Codificamos la cadena en formato utf8 en caso de que nos de errores
      
     // $cadena = utf8_encode($cadena);
      //Ahora reemplazamos las letras
      $cadena = str_replace(
          array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
          array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
          $cadena
      );
  
      $cadena = str_replace(
          array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
          array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
          $cadena );
  
      $cadena = str_replace(
          array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
          array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
          $cadena );
  
      $cadena = str_replace(
          array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
          array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
          $cadena );
  
      $cadena = str_replace(
          array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
          array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
          $cadena );
  
      $cadena = str_replace(
          array('ñ', 'Ñ', 'ç', 'Ç'),
          array('ñ', 'Ñ', 'c', 'C'),
          $cadena
      );
  
      return $cadena;
    }

    

  }
?>
