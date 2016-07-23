<?php /* Smarty version 3.1.27, created on 2016-06-19 21:07:31
         compiled from "/home/vmocampo357/public_html/2016/awards-mart/admin/html/inc/sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:649925600576709933d3ee6_25042247%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04f31251ce22774f781187f26a71575cea43b413' => 
    array (
      0 => '/home/vmocampo357/public_html/2016/awards-mart/admin/html/inc/sidebar.tpl',
      1 => 1465743083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '649925600576709933d3ee6_25042247',
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_576709933e1973_85136644',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_576709933e1973_85136644')) {
function content_576709933e1973_85136644 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '649925600576709933d3ee6_25042247';
?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <!--<li>
            <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Statistics</a>
        </li>!-->
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/products"><i class="fa fa-fw fa-table"></i> Products</a>
       </li>
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/categories"><i class="fa fa-fw fa-sitemap"></i> Taxonomies</a>
       </li>           
        <!--<li>
            <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
        </li>
        <li>
            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-cogs"></i> Options</a>
        </li>!-->
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/orders"><i class="fa fa-fw fa-file"></i> Orders</a>
        </li>     
        <!--<li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/customers"><i class="fa fa-fw fa-users"></i> Customers</a>
        </li>!-->
        <!--<li>
            <a href="blank-page.html"><i class="fa fa-fw fa-users"></i> Staff</a>
        </li>!-->
        <!--<li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/settings"><i class="fa fa-fw fa-wrench"></i> Settings</a>
        </li>!-->
        <!--<li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
        </li>!-->
    </ul>
</div>
<!-- /.navbar-collapse --><?php }
}
?>