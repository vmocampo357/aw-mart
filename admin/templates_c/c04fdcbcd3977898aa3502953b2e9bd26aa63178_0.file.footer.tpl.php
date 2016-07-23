<?php /* Smarty version 3.1.27, created on 2016-06-19 21:07:20
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/inc/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:75281108257670988156109_68649789%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c04fdcbcd3977898aa3502953b2e9bd26aa63178' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/inc/footer.tpl',
      1 => 1465743082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75281108257670988156109_68649789',
  'variables' => 
  array (
    'JS_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_576709882a02c2_71774683',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_576709882a02c2_71774683')) {
function content_576709882a02c2_71774683 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '75281108257670988156109_68649789';
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