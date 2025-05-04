<?php
session_start();
class App
{
  function __construct()
  {
    header("Content-Type: application/json");// ← Importante para API
    header("Access-Control-Allow-Origin: *");
    #echo "<p>Nueva APP</p>";
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);
      #echo "Inicio de session";

      #echo "con parametros";
      $archivoController = "controller/" . $url[0] . ".php";

      if (file_exists($archivoController)) {
        #echo "Si existe";
        require_once $archivoController;
        $controller = new $url[0];
        $controller->loadModel($url[0]);
        # numero de elementos del arreglo
        $nparam = sizeof($url);
        if ($nparam > 1) {
          if ($nparam > 2) {
            $param = [];
            for ($i = 2; $i < $nparam; $i++) {
              array_push($param, $url[$i]);
            }
            $controller->{$url[1]}($param);
          } else {
            $controller->{$url[1]}();
          }
        } else {
          echo json_encode("ERROR 404, APP.PHP, NO TIENE PARAMETROS");
        }
      } else {
        echo json_encode("ERROR 404, APP.PHP");
      }
    
  }

}



