<?php
    class conexion{
        private $user="root";
        private $pass = "";
        private $host = "mysql:dbname=notas;host=localhost";
        private $conexion;

        public function __construct()
        {
            try{
                $this->conexion = new PDO($this->host,$this->user,$this->pass);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $ex){
                echo "la conexion fue erronea ".$ex;
            }
        }
        public function consultar($sql){
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }
        public function ejecutar($sql){
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }
        public function delete($id){
            $sentencia = $this->conexion->prepare("DELETE FROM `notas` WHERE id=:id");
            $sentencia->bindValue('id',$id);
            return $sentencia->execute();
        }
        }
?>