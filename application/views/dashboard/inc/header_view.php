<!doctype html>
<html>
    <head>
        <title>JrDash</title>
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/style.css">
        
        <script src="<?php echo base_url()?>public/js/jquery.js"></script>
        <script src="<?php echo base_url()?>public/js/bootstrap.js"></script>
    </head>
    <body>
        
        <nav class="navbar">
            <div class="navbar-inner">
                <span class="brand">jrDash</span>
                <ul class="nav">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">User</a></li>
                    <li><a href="<?php echo site_url('dashboard/logout');?>">Logout</a></li>
                </ul>
            </div>
        </nav>
        <!--Start wrapper-->
        <div class="wrapper">
