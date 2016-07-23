<?php /* Smarty version 3.1.27, created on 2016-06-19 21:07:19
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21228161775767098710b5f3_54446499%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8adb5660cfdabd0d88a4155489c23c510447b495' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/login.tpl',
      1 => 1465743079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21228161775767098710b5f3_54446499',
  'variables' => 
  array (
    'has_message' => 0,
    'the_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_576709871ca287_66234428',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_576709871ca287_66234428')) {
function content_576709871ca287_66234428 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21228161775767098710b5f3_54446499';
?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/login-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="container">

    <!-- Page Heading -->
    <div class="row">
       <div class="col-lg-6 col-lg-push-3">
            <h1 class="page-header">
                AwardsMart Admin <small>Login to your system</small>
            </h1>            
            <?php if ($_smarty_tpl->tpl_vars['has_message']->value) {?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <?php echo $_smarty_tpl->tpl_vars['the_message']->value;?>

                </div>
            <?php }?>            
        </div>        
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-lg-push-3">
            <form action="" method="POST">
            	<label>Your Username</label>
            	<input name="username" type="text" class="form-control" />
            	<label>Your Password</label>
            	<input name="password" type="password" class="form-control" />
            	<br /><br />
            	<input type="submit" value="Login" class="btn btn-success form-control" />
                <input type="hidden" value="1" name="trigger-login" />
            </form>
        </div>
    </div>
    <div class="row" style="height:400px;"></div>    

</div>
<!-- /.container-fluid -->
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php }
}
?>