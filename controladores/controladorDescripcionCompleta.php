<?php
include_once '../modelos/connect_data.php';   
include_once '../modelos/GrupoClass.php';  
include_once '../modelos/GrupoModel.php';  

$idGrupo = filter_input(INPUT_GET, 'sp_id');

$descripModel=new GrupoModel();

$descripModel->verGrupoId($idGrupo); 
                                          

$listDescripcion=$descripModel->getList();

include_once '../vistas/VerGrupoVista.php';

