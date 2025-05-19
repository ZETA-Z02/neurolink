<?php
class Login extends Controller
{
  function __construct()
  {
    parent::__construct();
  }
  public function crearUsuario()
  {
    $dni = $_POST['dni'];
    $ciudad = $_POST['ciudad'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];
    $fechaNac = date('Y-m-d', strtotime($_POST['fechaNac']));
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $password = $_POST['password'];
    $error = true;
    $res = false;
    if (strlen($password) > 20) {
      new Exception("El usuario no puede tener mas de 20 caracteres");
    }
    if ($this->model->CrearUsuario($nombre, $apellido, $dni, $ciudad, $genero, $email, $fechaNac, $password)) {
      $res = true;
      $error = false;
    }
    $response = array(
      "response" => $res,
      "error" => $error
    );
    echo json_encode($response);
  }
  public function loginCliente()
  {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $error = true;
    $res = false;
    $data = array();
    if ($user =  $this->model->Login($usuario)) {
      $res = true;
    }
    if ($user['password'] == $password) {
      $error = false;
      $data['idusuario'] = $user['idusuario'];
    }
    $response = array(
      "success" => $res,
      "error" => $error,
      "data" => $data
    );
    echo json_encode($response);
    //echo json_encode(array("usuario" => $usuario, "password" => $password));
  }
}

