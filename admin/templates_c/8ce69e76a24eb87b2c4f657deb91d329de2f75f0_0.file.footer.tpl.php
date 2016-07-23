<?php /* Smarty version 3.1.27, created on 2015-11-26 05:35:41
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\inc\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:955056568c1d9813b3_51365699%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ce69e76a24eb87b2c4f657deb91d329de2f75f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\inc\\footer.tpl',
      1 => 1448512503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '955056568c1d9813b3_51365699',
  'variables' => 
  array (
    'JS_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56568c1d9cf5c6_87698230',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56568c1d9cf5c6_87698230')) {
function content_56568c1d9cf5c6_87698230 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '955056568c1d9813b3_51365699';
?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/jquery.js"><?php echo '</script'; ?>
>

    <!-- TinyMCE !-->
    <?php echo '<script'; ?>
 src="//cdn.tinymce.com/4/tinymce.min.js"><?php echo '</script'; ?>
>

    <!-- Lobibox!!! !-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/lobibox/js/lobibox.min.js"><?php echo '</script'; ?>
>

    <!-- Uploader -->
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/upload/vendor/jquery.ui.widget.js"><?php echo '</script'; ?>
>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/upload/jquery.iframe-transport.js"><?php echo '</script'; ?>
>
    <!-- The basic File Upload plugin -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/upload/jquery.fileupload.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/typeahead.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/handlebars.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/pagination.js"><?php echo '</script'; ?>
>

    <!-- Morris Charts JavaScript -->
    <!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/plugins/morris/raphael.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/plugins/morris/morris.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/plugins/morris/morris-data.js"><?php echo '</script'; ?>
>!-->

    <!-- Site Javascript !-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/uploader.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/api.js"><?php echo '</script'; ?>
>    
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['JS_DIR']->value;?>
/sitewide.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
?>