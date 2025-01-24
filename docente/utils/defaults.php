<?php

if (!function_exists("view")) {
    function view($nombreVista, $params)
    {
      foreach ($params as $key => $param) {
          $$key = $param;
      }
      $vista = explode('.', $nombreVista); // [0] => tareas, [1] => index

      if($vista[0]=='login' || $vista[0]=='error' || ($vista[0] == 'calificacion' && $vista[1] == 'reporte')) {
        include_once "./views/{$vista[0]}/$vista[1].php";
        
      } else{
        include_once './views/layout/head.php';
        include_once './views/layout/nav.php';
        include_once './views/layout/sidebar.php';
        include_once "./views/{$vista[0]}/$vista[1].php";
        include_once './views/layout/footer.php';
      }
    }
}