<?php
/* Smarty version 3.1.30, created on 2018-01-23 13:00:14
  from "C:\wamp64\www\php_class\xiaomi02\header.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6731dea7db06_84239505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27bc46459e2e49ee0a30ef681b431349ed8ca1f7' => 
    array (
      0 => 'C:\\wamp64\\www\\php_class\\xiaomi02\\header.php',
      1 => 1516262409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6731dea7db06_84239505 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>小米商城导航栏</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<?php echo '<script'; ?>
 src="jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<style>
		body{
			font-family: "微软雅黑";
			font-size: 14px;
			color: #000;
		}
		.nav{
			margin: 10px auto;
		}
		#logo{
			margin-left: 50px;
		}
		.nav ul li{
			list-style: none;
			float: left;	
			line-height: 56px;
			display: block;
			padding: 0px 10px;
			cursor: pointer;
		}
		.nav ul li:hover{
			color:#ff6700;
		}
		.nav .search{
			margin-top: 10px;
		}

		.content{
			height: 500px;
			background: #333;
		}

		.tab.container{
			width: 100%;
			height: 200px;
			background: #fff;
			border-top: 1px solid #ccc;
			position: absolute;
			top: 75px;
			display: none
		}

		.tab.container .container ul li{
			list-style: none;
		}
		.tab.container ul li .box{
			width: 200px;
			text-align: center;
			margin-top: 30px;
		}
		.price{
			color: #ff6700;

		}
		.show{
			display: block;
		}
		.hide{
			display: none;
		}
		.box.form{
			text-align: left;
			margin-top: 50px;
		}	
		.box{
			text-align: center;
			margin-top: 50px;
		}	
		.box th,td{
			text-align: center;
		}

	</style>
</head>

<body>
		<?php echo '<?php
		';?>$list=[
			"小米手机"=>[
				'product1'=>[
					'product_name'=>'小米MIX 2',
					'price'=>'3299',
					'thumb'=>'image/mix.png'
				],
				'product2'=>[
					'product_name'=>'小米Note 3',
					'price'=>'1999',
					'thumb'=>'image/mix.png'
				],
				'product3'=>[
					'product_name'=>'小米6',
					'price'=>'2299',
					'thumb'=>'image/mix.png'
				]
			],
			"红米"=>[
				'product1'=>[
					'product_name'=>'红米5',
					'price'=>'799',
					'thumb'=>'image/mix.png'
				],
				'product2'=>[
					'product_name'=>'红米5 Plus',
					'price'=>'999',
					'thumb'=>'image/mix.png'
				],
				'product3'=>[
					'product_name'=>'红米5A',
					'price'=>'599',
					'thumb'=>'image/mix.png'
				]
			],
			"笔记本"=>[
				'product1'=>[
					'product_name'=>'小米MIX 2',
					'price'=>'3299',
					'thumb'=>'image/mix.png'
				],
				'product2'=>[
					'product_name'=>'小米Note 3',
					'price'=>'1999',
					'thumb'=>'image/mix.png'
				],
				'product3'=>[
					'product_name'=>'小米6',
					'price'=>'2299',
					'thumb'=>'image/mix.png'
				]
			],
			"电视"=>[
				'product1'=>[
					'product_name'=>'红米5',
					'price'=>'799',
					'thumb'=>'image/mix.png'
				],
				'product2'=>[
					'product_name'=>'红米5 Plus',
					'price'=>'999',
					'thumb'=>'image/mix.png'
				],
				'product3'=>[
					'product_name'=>'红米5A',
					'price'=>'599',
					'thumb'=>'image/mix.png'
				]
			],
			"盒子"=>[],
			"新品"=>[],
			"路由器"=>[],
			"智能硬件"=>[],
			"服务"=>[],
			"社区"=>[]
		];
	<?php echo '?>';?>
	<div class="container nav">
		<header>
			<div class="row">
			  <div class="col-md-2">
			  	<img src="image/logo.png" id="logo" alt="">
			  </div>
			  <div class="col-md-7">
			  	<ul>
			  		<?php echo '<?php
			  			';?>foreach ($list as $key => $value) {
			  				$count = count($value);
			  				echo '<li class="li" onmousemove=show("'.$key.'","'.$count.'") onmouseout=hide("'.$key.'")>'.$key.'</li>';
			  			}
			  		<?php echo '?>';?>
			  		   <!--"<li class='li' >$key</li>"-->
			  	<ul/>
			  </div>
			  <div class="col-md-3 search">
					<input type="text" class="form-control">
			  </div>
			</div>
			 
		</header><!-- /header -->
	</div>

	<div class="tab container">

		<div class="container">
			<ul class="row">
				<!-- <li class="col-md-2">
					<div class="box">
						<img src="image/mix.png" width="160px" height="110px" alt="">
						<p>小米6</p>
						<p>2299</p>
					</div>
				</li> -->

				<?php echo '<?php
					';?>// $attr=$_GET['attr'];
					foreach ($list as $key => $value) {
						$arr = $value;
						$ID = $key;
						foreach ($arr as $key => $value) {
							echo '<li class="col-md-2" id="'.$ID.'">
										<div class="box">
											<img src="'.$value["thumb"].'" width="160px" height="110px" alt="">
											<p>'.$value["product_name"].'</p>
											<p class="price">￥'.$value["price"].'</p>
										</div>
									</li>';
						}
						
					}
				<?php echo '?>';?>
				
			</ul>
		</div>
		
	</div>

		<?php echo '<script'; ?>
>
		var ali = document.querySelectorAll(".nav ul li");
		var tab = document.querySelector(".tab.container");
		var aProduct = document.querySelectorAll(".tab ul li");

		function show(att,count){
			if(count==0){
				return;
			}
			for (var i =0; i < aProduct.length; i++) {
				var ID = aProduct[i].getAttribute("id");
				if (ID==att) {
					aProduct[i].className="col-md-2 show";
				}else {
					aProduct[i].className="col-md-2 hide";
				}
			}
			tab.style.display = 'block';
		}

		function hide(att){
			tab.style.display = 'none';
		}

	<?php echo '</script'; ?>
>
<?php }
}
