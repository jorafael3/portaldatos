<?php


class ActivarDatos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('principal/activar');
    }
    function Buscar_inactivos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Buscar_inactivos($array);
        //$this->CrecimientoCategoriasIndex();
    }
    function actualizar_inactivos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->actualizar_inactivos($array);
        //$this->CrecimientoCategoriasIndex();
    }
}
