<?php 
class LoginModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function get(){
        $sql = "Consulta sql";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function CrearUsuario($nombres,$apellidos,$dni,$ciudad,$genero,$email,$fechaNac,$password){
        $this->conn->conn->begin_transaction();
        try{
            $usuario = "INSERT INTO usuarios (nombres,apellidos,dni,ciudad,genero,email,fechaNac) VALUES('$nombres','$apellidos','$dni','$ciudad','$genero','$email','$fechaNac');";
            $result1 = $this->conn->ConsultaSin($usuario);
            $idusuario = $this->conn->conn->insert_id;
            $login = "INSERT INTO login(idusuario, usuario, password) VALUES('$idusuario','$email','$password');";
            $result2 = $this->conn->ConsultaSin($login);
            $this->conn->conn->commit();
            return $idusuario;
            //return $result1 && $result2;
        }catch(Exception $e){
            $this->conn->conn->rollback();
            echo $e->getMessage();
        }
    }
    public function Login($usuario,$nivel=1){
        $sql = "SELECT idusuario,usuario,password FROM login WHERE usuario = '$usuario' AND nivel = '$nivel';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Usuario($idusuario){
        $sql = "SELECT nombres, apellidos, fechaNac,nivel,puntaje FROM usuarios WHERE idusuario = `$idusuario`;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}