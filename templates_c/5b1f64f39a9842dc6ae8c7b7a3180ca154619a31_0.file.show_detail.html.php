<?php
/* Smarty version 3.1.30, created on 2018-01-23 16:22:11
  from "C:\wamp64\www\xiaomi_mvc\view\Goods\show_detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a676133a0a2a1_28965975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b1f64f39a9842dc6ae8c7b7a3180ca154619a31' => 
    array (
      0 => 'C:\\wamp64\\www\\xiaomi_mvc\\view\\Goods\\show_detail.html',
      1 => 1516724529,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a676133a0a2a1_28965975 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
</p>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['file']->value, 'img_path');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['img_path']->value) {
?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['img_path']->value;?>
" alt='' width='100px' height='100px' class='image' style='margin-left:10px'>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</body>
</html><?php }
}
