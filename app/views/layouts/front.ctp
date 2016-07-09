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
            

     </nav>

        <div id="page-wrapper">
            &nbsp;
            <?php echo $content_for_layout ?>
        </div>

    </div>
    
</body>

</html>
