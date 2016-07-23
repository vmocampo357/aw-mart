<?php /* Smarty version 3.1.27, created on 2016-03-06 17:11:53
         compiled from "C:\xampp\htdocs\sidework\shopping-cart-awards\admin\html\inc\sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:671456dc56c93cb9d6_27381326%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34a61e5deef72622bf545db9d8ab8f9b5e574acd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sidework\\shopping-cart-awards\\admin\\html\\inc\\sidebar.tpl',
      1 => 1457280711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '671456dc56c93cb9d6_27381326',
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56dc56c96197e5_49259608',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56dc56c96197e5_49259608')) {
function content_56dc56c96197e5_49259608 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '671456dc56c93cb9d6_27381326';
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