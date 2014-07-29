<!doctype html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/style.css">
        
        <script src="<?php echo base_url()?>public/js/jquery.js"></script>
        <script src="<?php echo base_url()?>public/js/bootstrap.js"></script>        
        <script src="<?php echo base_url()?>public/js/rep_ciudadano/dashboard/result.js"></script>
        <script src="<?php echo base_url()?>public/js/rep_ciudadano/dashboard/event.js"></script>        
        <script src="<?php echo base_url()?>public/js/rep_ciudadano/dashboard/template.js"></script>        
        <script src="<?php echo base_url()?>public/js/rep_ciudadano/dashboard.js"></script>
        
        
        
<script type="text/javascript">
    $(function() {
        //Inicializar la aplicacion Dashboard
        var dashboard = new Dashboard();
    });
</script>              
        
    </head>
    <body>
        
        <nav class="navbar">
            <div class="navbar-inner">
                <span class="brand"><image style="width: 25px; height: 25px" src="<?php echo site_url('public/img/icono.png') ?>" />&nbsp;Reportero Ciudadano</span>
                <ul class="nav">
                    <li><a href="#">Panel de Control</a></li>
                    <li><a href="#">Usuario</a></li>
                    <li><a href="<?php echo site_url('dashboard/logout');?>">Cerrar Sesion</a></li>
                </ul>
            </div>
        </nav>
        <!--Start wrapper-->
        <div class="wrapper">
            <div id="error" class="alert alert-error hide"></div>
            <div id="success" class="alert alert-success hide"></div>
