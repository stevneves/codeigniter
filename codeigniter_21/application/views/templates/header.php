<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $page_title; ?></title>
        <style type="text/css">
            table{ border: solid 1px #000; border-spacing: 10px 10px; width: 100%; }
            td{ padding-left: 10px; border-left: solid 1px #000; }
            th{ text-align: left; }
            .noborder{ border:none; }
            .nopadding{ padding: 0px; }
            .clear{ clear:both; }
            .required_msg{ color: #A00; }
        </style>
        <style type="text/css" title="currentStyle">
                @import "<?php echo base_url('css/jquery.dataTables.css'); ?>";
                @import "<?php echo base_url('css/jquery.dataTables.css'); ?>";
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script src="http://datatables.net/download/build/jquery.dataTables.nightly.js<?php //echo base_url('js/flexigrid.pack.js'); ?>"></script>
       
    </head>
    <body>
        <span style="float:right;"><a href="<?php echo site_url('login/dologout')?>">logout</a></span>