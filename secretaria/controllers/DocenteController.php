<?php

   class DocenteController
   {

      public function index()
      {
         $docente = Docente::findAll();

         view("docente.index", ["docente" => $docente]);
      }

      public function agregar()
      {
         view("docente.agregar", []);
      }

      public function insert()
      {
         $TipoIdentificacion = Main::limpiar_cadena($_POST['TipoIdentificacion']);
         $NumeroIdentificacion = Main::limpiar_cadena($_POST['NumeroIdentificacion']);
         $NombreDocente = Main::limpiar_cadena($_POST['NombreDocente']);

         $Contrasena = Main::encryption($NumeroIdentificacion);

         $param = [":TipoIdentificacion" => $TipoIdentificacion, ":NumeroIdentificacion" => $NumeroIdentificacion, ":NombreDocente" => $NombreDocente, ":Contrasena" => $Contrasena];
         $resp = Docente::Insert($param);

         echo json_encode($resp);
      }

      public function edit()
      {
         $DocenteID = Main::limpiar_cadena($_GET['id']);
         $DocenteID = Main::decryption($DocenteID);

         $param = [":DocenteID" => $DocenteID];
         $docente = Docente::findDocenteID($param);

         view("docente.edit", ["docente" => $docente]);
      }

      public function update()
      {
         $DocenteID = Main::limpiar_cadena($_POST['DocenteID']);
         $TipoIdentificacion = Main::limpiar_cadena($_POST['TipoIdentificacion']);
         $NumeroIdentificacion = Main::limpiar_cadena($_POST['NumeroIdentificacion']);
         $NombreDocente = Main::limpiar_cadena($_POST['NombreDocente']);
         
         $DocenteID = Main::decryption($DocenteID);

         $param = [":DocenteID" => $DocenteID, ":TipoIdentificacion" => $TipoIdentificacion, ":NumeroIdentificacion" => $NumeroIdentificacion, ":NombreDocente" => $NombreDocente];
         $resp = Docente::Update($param);

         echo json_encode($resp);
      }

      public function reset()
      {
         $DocenteID = Main::limpiar_cadena($_POST['DocenteID']);
         $Estado = Main::limpiar_cadena($_POST['Estado']);
         
         $DocenteID = Main::decryption($DocenteID);
         $Estado = Main::decryption($Estado);

         if($Estado){
            $Estado = 0;
        } else{
            $Estado = 1;
        }

         $param = [":DocenteID" => $DocenteID, ":Estado" => $Estado];
         $resp = Docente::Reset($param);

         echo json_encode($resp);
      }


   }