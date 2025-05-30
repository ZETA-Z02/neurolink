<?php 
class ClientesModel extends Model{

    function __construct(){
        parent::__construct();
    }
    public function get(){
        $sql = "SELECT u.*, l.nivel as level, l.estado FROM usuarios u JOIN login l ON u.idusuario = l.idusuario;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function getById($id){
        $sql = "SELECT u.*, l.nivel as level, l.estado FROM usuarios u JOIN login l ON u.idusuario = l.idusuario WHERE u.idusuario = $id;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function update($id, $nivel, $puntaje){
        $sql = "UPDATE usuarios SET nivel='$nivel', puntaje='$puntaje' WHERE idusuario = '$id';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function delete(){
        $sql = "DELETE";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function SumarPuntaje($idusuario,$puntaje){
        $sql = "UPDATE usuarios SET puntaje=(SELECT puntaje FROM usuarios WHERE idusuario=$idusuario)+$puntaje WHERE idusuario=$idusuario;";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
}

?>