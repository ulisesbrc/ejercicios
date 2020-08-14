<?php
 class Db{
   private $host="localhost";
   private $usuario="root";
   private $password="";
   private $base_datos="naiades_ejercicio";
   public $pbd;
   static $_instance;
 
   /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
   private function __construct(){
      $this->conectar();
   }
 
   /*Evitamos el clonaje del objeto. Patrón Singleton*/
   private function __clone(){ }
 
   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
   public static function getInstance(){ 
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
      return self::$_instance;
   }
 
   /*Realiza la conexión a la base de datos.*/
   private function conectar(){
      $this->pbd = new PDO('mysql:host='.$this->host.';dbname='.$this->base_datos,  $this->usuario, $this->password);
   }
   
}