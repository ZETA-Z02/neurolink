<?php  
class Clientes extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function get(){
        $error = true;
        $res = false;
        $data = array();
        if($result = $this->model->get()){
            $res = true;
        }
        try{
            while($row = mysqli_fetch_array($result)){
                $data[] = array(
                    "idusuario" => $row['idusuario'],
                    "nombres" => $row['nombres'],
                    "apellidos" => $row['apellidos'],
                    "dni" => $row['dni'],
                    "ciudad" => $row['ciudad'],
                    "genero" => $row['genero'],
                    "email" => $row['email'],
                    "fechaNac" => $row['fechaNac'],
                    "nivel" => $row['nivel'],
                    "puntaje" => $row['puntaje'],
                    "nivelLogin" => $row['level']
                );
            }
            $error = false;
        }catch(Exception $e){
            $data['error'] = $e->getMessage();
        }

        $response = array(
            "success" => $res,
            "error" => $error,
            "data" => $data
        );
        echo json_encode($response);
    }
    public function getById(){
        $error = true;
        $res = false;
        $id = $_POST['idusuario'];
        if($data = $this->model->getById($id)){
            $res = true;
            $error = false;
        }
        $response = array(
            "success" => $res,
            "error" => $error,
            "data" => $data
        );
        echo json_encode($response);
    }
    public function update(){
        $error = true;
        $res = false;
        $id = $_POST['idusuario'];
        $nivel = $_POST['nivel'];
        $puntaje = $_POST['puntaje'];
        if($data = $this->model->update($id,$nivel,$puntaje)){
            $res = true;
            $error = false;
        }
        $response = array(
            "success" => $res,
            "error" => $error,
            "data" => $data
        );
        echo json_encode($response);
    }
    public function delete(){

    }
    public function sumarPuntaje(){
        $error = true;
        $res = false;
        $idusuario = $_POST['idusuario'];
        $puntaje = $_POST['puntaje'];
        if($data = $this->model->SumarPuntaje($idusuario,$puntaje)){
            $res = true;
            $error = false;
        }
        $response = array(
            "success" => $res,
            "error" => $error,
            "data" => $data
        );
        echo json_encode($response);
    }
}





?>