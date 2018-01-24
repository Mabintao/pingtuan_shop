<?php
/* Smarty version 3.1.30, created on 2018-01-23 15:20:47
  from "C:\wamp64\www\xiaomi_mvc\view\Goods\add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6752cfc9c161_10388967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38240ec29d46534c8cc1731eeba17aa18b134111' => 
    array (
      0 => 'C:\\wamp64\\www\\xiaomi_mvc\\view\\Goods\\add.html',
      1 => 1516715260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6752cfc9c161_10388967 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<?php echo '<script'; ?>
 src="jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body>

	<div class="container box form">
		<form action="index.php?control=goods&action=add" method="post" class="container form" enctype="multipart/form-data">
			 <input type="hidden" name="location" value="product_mng.php">
			 <input type="hidden" name="method" value="add">
			 <div class="form-group">
			    <label for="name">商品名称</label>    
			    <input type="text" class="form-control" id="name"  name= "name" placeholder="请输入名称">
			 </div>
			  <div class="form-group">
			 	<!--label  for 指向值input为id属性 -->
			    <label for="price">价格</label>    
			    <input type="text" class="form-control" id="price"  name= "price" placeholder="请输入价格">
			 </div>
			  <div class="form-group">
			 	<!--label  for 指向值input为id属性 -->
			    <label for="file">图片上传:</label>
				<input type="file" name="file[]" id="file" multiple /> 
			 </div>
					 
			<button type="submit" class="btn btn-primary">提交</button>
		</form>
	</div>

	<div class="container box">
		<form action="product_do.php" method="post" id="form_del">
			<input type="hidden" name="location" value="product_mng.php">
			<input type="hidden" name="method" value="del">
			<table class="table">
				<caption>商品信息</caption>
				<thead>
				      <th>序号</th>
				      <th>名称</th>
				      <th>价格</th>
				      <th>图片展示</th>
				      <th>
				      	<input type="checkbox" id="control">
				      </th>
				      <th>
				      	<input type="button" value="删除" id="btn" class="btn btn-danger">
				      </th>
				      
				    </tr>
		  		</thead>
		  		<tbody>

		  			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goods_list']->value, 'goods', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['goods']->value) {
?>
		  				<tr id='tr_$id'>
							<td class='col-md-1'><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
							<td class='col-md-2'><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</td>
							<td class='col-md-3'><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
</td>
							<td class='col-md-6 img_father' >
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['file']->value[$_smarty_tpl->tpl_vars['key']->value], 'img_path');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['img_path']->value) {
?>
								<img src=$img_path alt='' width='50px' height='40px' class='image' style='margin-left:10px'>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</td>
							<td class='col-md-1'>
								<input class='checkbox' type='checkbox' name='del_index[]' value='<?php echo $_smarty_tpl->tpl_vars['goods']->value["id"];?>
'>
							</td>
								<td class='col-md-1'>
									<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' id='edit' onclick='edit_product(<?php echo $_smarty_tpl->tpl_vars['goods']->value["id"];?>
)'>编辑</button>
								</td>
								<td class='col-md-1'>
									<button type='button' class='btn btn-primary' id='detail' onclick='showDetail(<?php echo $_smarty_tpl->tpl_vars['goods']->value["id"];?>
)'>详情</button>
								</td>
							</tr>
		  			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		  			
		  		</tbody>
			</table>
		</form>
	</div>

	<!-- Bootstrap 模态框 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">编辑</h4>
	      </div>
	      <div class="modal-body">
	        <form action="product_do.php" method="post" class="form" id="ajaxForm" enctype="multipart/form-data">
				 <input type="hidden" name="location" value="product_mng.php">
				 <input type="hidden" name="method" value="update">
				 <input type="hidden" name="edit_id" value="update" id="edit_id">
				 <div class="form-group">
				    <label for="new_name">商品名称</label>    
				    <input type="text" class="form-control" id="new_name"  name= "new_name" placeholder="请输入名称">
				 </div>
				  <div class="form-group">
				    <label for="new_price">价格</label>    
				    <input type="text" class="form-control" id="new_price"  name= "new_price" placeholder="请输入价格">
				 </div>

				  <div class="form-group" id="img">

				  </div>
				  <div class="form-group" id="button" style="text-align: right;">
						<button type="button" class="btn btn-danger" id = "img_del">删除图片</button> 
				  </div>
				   
			</form>
	      </div>
	      <div class="modal-footer">

	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	        <button type="button" class="btn btn-primary" id = "update">更新</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>

<?php echo '<script'; ?>
>
	var control = document.getElementById("control");
	var aItem = document.getElementsByClassName("checkbox");
	var flag = true;  //判断是否所有的checkbox都被选中
	var btn = document.getElementById("btn");
	var form_del = document.getElementById("form_del");


	control.onclick=function(){
		if(control.checked){
			for(var i=0;i<aItem.length;i++){
				aItem[i].checked=true;
			}
		}else{
			for(var i=0;i<aItem.length;i++){
				aItem[i].checked=false;
			}
		}
	}

	for(var i=0;i<aItem.length;i++){
		aItem[i].index = i;
		aItem[i].onclick=function(){
			flag=true;
			for(var j=0; j<aItem.length;j++){
				if(aItem[j].checked==false){
					flag=false;
				}
			}
			control.checked=flag;
		}
	}

	btn.onclick = del;

	function del(){
		var answer = confirm("确定删除吗？");
		if(answer){
			form_del.submit();
		}else {
			return;
		}
	}



	var edit_id;

	function edit_product(id){
		edit_id=id;
		var new_name = $(".table #tr_"+id+" td").eq(1).text();
		$("#new_name").val(new_name);
		var new_price = $(".table #tr_"+id+" td").eq(2).text();
		$("#new_price").val(new_price);
		var img = $(".table #tr_"+id+" img[style='margin-left:10px']");
		var src;
		$("#img").html("");
		for(var i=0;i<img.length;i++){
			src = img[i].src;
			var str = $("#img").html()+"<label class='checkbox-inline img_label'><input type='checkbox' name='del_index[]' class='img_box' value='"+i+"'><img src='"+src+"' width='100px' height='100px'></label>";
			$("#img").html(str);
		}
	}

	//假装删除 没有提交到后台 点击更新才会真正删除
	$("#img_del").click(function(event) {
		var aCheckBox = $(".img_box");
		for(var i=0; i<aCheckBox.length;i++){
			if(aCheckBox[i].checked){
				aCheckBox[i].parentNode.style.display = 'none';
			}
		}
	});

	$("#update").click(function(event) {

		$("#edit_id").val(edit_id);
		$.ajax({  
         
          type: "POST", 
          url: "product_do.php",       
          data: $('#ajaxForm').serialize(),  
           
       });  
	  
	   var name = $("#new_name").val();
	   var price = $("#new_price").val();
	   var img_father = document.querySelectorAll(".table #tr_"+edit_id+" td")[3];
	   var img_arr = document.getElementsByClassName("image");	
	   var $td =  $(".table #tr_"+edit_id+" td");
	   $(".img_label[style]").each(function(index, el) {
	   		var index = el.firstChild.value;
	   		img_father.removeChild(img_arr[index]);
	   
	   }); 	

	   $td.eq(1).text(name);
	   $td.eq(2).text(price);
 	   $('#myModal').modal('hide');

	});
	
	function showDetail(id){
		edit_id = id;
		window.location.href="product_detail.php?edit_id="+id; 
	}
	
<?php echo '</script'; ?>
>
</html><?php }
}
