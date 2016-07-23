<?php /* Smarty version 3.1.27, created on 2016-06-19 21:07:31
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/inc/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:404200964576709933a9ae4_50666570%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '864e1dbedb78cc2fcda89d696dcc73fc8aa8a7ea' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/inc/header.tpl',
      1 => 1465743082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '404200964576709933a9ae4_50666570',
  'variables' => 
  array (
    'CSS_DIR' => 0,
    'RES_DIR' => 0,
    'JS_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_576709933bc323_03451209',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_576709933bc323_03451209')) {
function content_576709933bc323_03451209 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '404200964576709933a9ae4_50666570';
?>
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
    <link href="<?php echo $_smarty_tpl->tpl_vars['CSS_DIR']->value;?>
/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['CSS_DIR']->value;?>
/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['CSS_DIR']->value;?>
/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['RES_DIR']->value;?>
/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Back-end CSS !-->
    <link href="<?php echo $_smarty_tpl->tpl_vars['CSS_DIR']->value;?>
/backend.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/lobibox/css/lobibox.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div id="ajax-loading"><img src="<?php echo $_smarty_tpl->tpl_vars['RES_DIR']->value;?>
/images/ajax-loading.gif" /></div>
        	<?php echo $_smarty_tpl->getSubTemplate ('inc/admin-bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </nav>

        <div id="page-wrapper"><?php }
}
?>