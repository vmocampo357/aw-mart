<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Awards Mart | Administrative Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
    <link href="{$CSS_DIR}/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{$CSS_DIR}/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{$CSS_DIR}/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{$RES_DIR}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Back-end CSS !-->
    <link href="{$CSS_DIR}/backend.css" rel="stylesheet">
    <link href="{$JS_DIR}/lobibox/css/lobibox.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div id="ajax-loading"><img src="{$RES_DIR}/images/ajax-loading.gif" /></div>
        	{include file='inc/admin-bar.tpl'}
            {include file='inc/sidebar.tpl'}
        </nav>

        <div id="page-wrapper">