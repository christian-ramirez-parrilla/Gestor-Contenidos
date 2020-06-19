<?php

    class Conexion {
        private const HOST = '';
        private const USER = '';
        private const PASS = '';
        private const BBDD = '';

        public static function iniciar(){
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            );
            return new PDO("mysql:host=".self::HOST.";dbname=".self::BBDD.";charset=UTF8",self::USER,self::PASS, $options);
        } 

        public static function select($x){

            $cabecera = self::iniciar()->prepare($x);
            $cabecera->setFetchMode(PDO::FETCH_OBJ);
            $cabecera->execute();


            switch ($cabecera->rowCount()) {
                case 0:
                    return 'no hay datos';
                    break;
                
                case 1:
                    return $cabecera->fetch();
                    break;

                default:
                    return $cabecera->fetchAll();
                    break;
            }

            

            
        }
    }

    class Gestor{

        public static function sql( $query ){
            $insertar = Conexion::iniciar()->prepare($query);
            $insertar->execute();
        }
        
    }

    class Correo{

        public $quienRecibe;
        public $asunto;
        public $texto;
        public $nombreEnvia;
        public $correoEnvia;
        
 
        public function enviarCorreo(){
 
         
 
         
 
 
         $quienEnvia = "From: $this->nombreEnvia <$this->correoEnvia>"."\r\n"; 
 
         $quienEnvia .= "MIME-Version 1.0"."\r\n";
 
         $quienEnvia .= "Content-type: text/html; charset=utf-8"."\r\n";
 
 
 
         mail($this->quienRecibe, $this->asunto, $this->texto, $this->quienEnvia) or die ('Fallo');            
 
 
 
 
        }
 
        public function __construct($a,$b,$c,$d,$e){
 
             $this->quienRecibe    = $a;
             $this->asunto         = $b;
             $this->texto          = $c;
             $this->nombreEnvia    = $d;
             $this->correoEnvia    = $e;
             
 
 
 
        }
 
 
    }

    class Cookies{

        public static function crear( $a , $b ){
            setcookie($a,$b,time()+60*60*24*7,'/','');
        }
        public static function borrar( $a ){
            setcookie($a,'',time()-10,'/','');
        }

    }

    class Seguridad{

        private const  CLAVE= ''; 

        public static function encriptar($x){

            return openssl_encrypt($x,'',self::CLAVE);

        }

        public static function desencriptar($x){

            return openssl_decrypt($x,'',self::CLAVE);

        }

        

    }

    
    
?>