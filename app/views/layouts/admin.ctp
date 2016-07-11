<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienestar Estudiantil</title>

    <?php echo $html->css('bootstrap.min'); ?>
    <?php echo $html->css('metisMenu.min'); ?>
    <?php echo $html->css('sb-admin-2'); ?>
    <?php echo $html->css('font-awesome.min'); ?>
    <?php echo $html->css('estilos'); ?>

    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('host'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('metisMenu.min'); ?>
    <?php echo $this->Html->script('bootbox.min'); ?>
    <?php

    echo $this->Html->script('sb-admin-2');
    
    //DataTable
    echo $this->Html->script('../css/DataTables-1.10.9/js/jquery.dataTables');
    echo $this->Html->script('../css/DataTables-1.10.9/js/dataTables.bootstrap');
    echo $html->css('DataTables-1.10.9/css/dataTables.bootstrap');

    //Date Picker
    echo $this->Html->script('../css/bootstrap-datepicker/js/bootstrap-datepicker');
    echo $this->Html->script('../css/bootstrap-datepicker/locales/bootstrap-datepicker.es.min');    
    echo $html->css('bootstrap-datepicker/css/bootstrap-datepicker');

    //Awesome Checkbox master
    echo $html->css('awesome-checkbox-master/build');    
    echo $html->css('awesome-checkbox-master/bower_components/Font-Awesome/css/font-awesome');

    //alphanumeric
    echo $this->Html->script('jquery.alphanum');

    ?>
</head>

<body>
    <div class="logo-unerg">
        <div class="row">
            <div class="col-sm-9">
                <p>Universidad Rómulo Gallegos</p>
                <p>Dirección de Atención Estudiantil</p>
                <p>Programas de Ayudas Socioeconómicas</p>
            </div>
            <div class="col-sm-3 hidden-xs">
                <?php echo $this->Html->image('logo-unerg.svg?v=1.1') ?>
            </div>
        </div>
            
    </div>
    <div id="wrapper">        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right pull-right">
                <span class="text-muted"><?php echo $session->read("user.User.nombres"). ' ' . $session->read("user.User.apellidos"); ?>
                </span>

                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->webroot . 'admin/change_password' ?>"><i class="fa fa-gear fa-fw"></i> Cambiar contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->webroot . 'front/logout/' ?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Solicitudes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'solicitantes/' ?>"><i class='fa fa-list-ol fa-fw'></i> Pendientes</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'solicitantes/negadas' ?>"><i class='fa fa-list-ol fa-fw'></i> Rechazadas</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'solicitantes/add/' ?>"><i class='fa fa-plus fa-fw'></i> Nueva Solicitud</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-star"></i> &nbsp; Beneficiados<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'becados/' ?>"><i class='fa fa-list-ol fa-fw'></i> Activos</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'becados/inactivos' ?>"><i class='fa fa-list-ol fa-fw'></i> Inactivos</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'becados/culminados' ?>"><i class='fa fa-list-ol fa-fw'></i> Culminados</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'becados/buscar_cedula/' ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-open"></i> &nbsp; Pagos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'nominas/' ?>"><i class='fa fa-list-ol fa-fw'></i> Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'nominas/add/' ?>"><i class='fa fa-plus fa-fw'></i> Crear</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'nominas/montos/' ?>"><i class='glyphicon glyphicon-piggy-bank'></i> &nbsp; Montos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-home"></i> &nbsp;Núcleos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'nucleos/' ?>"><i class='fa fa-list-ol fa-fw'></i> Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'nucleos/add/' ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-bookmark"></i> &nbsp; Dependencias<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'dependencias/' ?>"><i class='fa fa-list-ol fa-fw'></i> Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'dependencias/add/' ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-education"></i> &nbsp; Carreras<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'carreras/' ?>"><i class='fa fa-list-ol fa-fw'></i> Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'carreras/add/' ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-list-alt"></i> &nbsp; Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'reportes/nomina_txt' ?>"><i class='glyphicon glyphicon-menu-right'></i> Cierre mensual</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'reportes/pago_alumno' ?>"><i class='glyphicon glyphicon-menu-right'></i> Pago por Alumno</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'reportes/beneficiados_excel' ?>"><i class='glyphicon glyphicon-menu-right'></i> Beneficiados Excel</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'reportes/total_general' ?>"><i class='glyphicon glyphicon-menu-right'></i> <small>Beneficiados en General</small></a>
                                </li>
                                
                                
                            </ul>
                        </li>
                        <?php
                        if($session->read("user.User.nivel") == 2)
                        {
                        ?>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Administradores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->webroot . 'users/' ?>"><i class='fa fa-list-ol fa-fw'></i> Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . 'users/add/' ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>                                
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            &nbsp;
            <?php echo $content_for_layout ?>
        </div>

    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>

</html>
