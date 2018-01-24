<?php
	/**
	* 管理员的类
	*/
	class Goods extends BaseControl
	{
		private $Sqlmodel;

		//后台首页
		public function index()
		{
			
			if($this->Sqlmodel){
				$goods_list = $this->Sqlmodel->selectAll();
			}else{
				$goods_list = $this->model("Goods")->selectAll();
			}
			

			$file = [];
			foreach ($goods_list as $value) {
				$file[] = json_decode($value['file']);
			}

			//2.将数据注入到页面
			$this->assign("goods_list",$goods_list);
			$this->assign("file",$file);
			
			//3.显示页面
			$this->display("index");
		}

		// 添加商品
		public function add()
		{
			$goods = $this->get_Goods($_REQUEST,$_FILES);
			$this->Sqlmodel = $this->model("Goods");
			$this->Sqlmodel->insert($goods);
			$this->index();
		}


		//删除操作
		public function del()
		{	

			$del_index = $_POST["del_index"];
			foreach ($del_index as $value) {
				$value = (int)$value;
				if($this->Sqlmodel){
					$this->Sqlmodel->deleteById($value);
				}else{
					$this->Sqlmodel = $this->model("Goods");
					$this->Sqlmodel->deleteById($value);
				}
			}		

			$this->index();
		}

		//修改操作
		function update(){
			$new_name = $_POST["new_name"];
			$new_price = $_POST["new_price"];
			$edit_id = (int)$_POST["edit_id"];

			$update_data=[
				'goods_name'=>$new_name,
				'goods_price'=>$new_price
			];

			$this->Sqlmodel = $this->model("Goods");
			$this->Sqlmodel->accord("$edit_id")->update($update_data);
			$this->index();
		}

		function show_detail(){
			$id = $_GET["edit_id"];
			$res = $this->model("Goods")->selectById($id);
			$this->assign("goods",$res);
			$this->assign("file",json_decode($res['file']));			

			$this->display();
		}		

		/**
		 * 通过表单提交过来的数据获取一个商品
		 * @return Array          商品数组 封装了商品的属性 可以直接添加到数据库
		 */
		function get_Goods($Request,$Files){
			//获取表单提交的数据
			$name = $Request["name"];
			$price = (int)$Request["price"];
		  	$file = [];
			
			if($Files["file"]["error"][0]==0){
				$arr = $Files["file"]["tmp_name"];
				if(!empty($arr)){	
					foreach ($arr as $key => $value) {
						$file_type = $_FILES["file"]["type"][$key];
						
						list($type,$add) = explode("/", $file_type);
						
						//获取保存时间
						$format = 'YmdHis';
						$time = date($format,time());
						
						$filename="upload/".$time.rand(1000,9999).".".$add;
						copy($value, $filename);		
						$file[] = $filename;				
					}
				}
			}else{
				$file = ["upload/111.png"];
			}
			
			$file = json_encode($file);

			return $this->set_Goods($name,$price,$file);
			
		}

		/**
		 * 将数据封装进商品数组中，返回一个商品数组
		 * @param String $goods_name  商品名称
		 * @param Int $goods_price 商品价格
		 * @param String $file        商品图片信息
		 */
		function set_Goods($goods_name,$goods_price,$file,$ID=null){
			if($ID){
				$goods = [
					"id"=>$ID,
					"goods_name"=>$goods_name,
					"goods_price"=>$goods_price,
					"file"=>$file			
				];				
			}else{
				$goods = [
					"goods_name"=>$goods_name,
					"goods_price"=>$goods_price,
					"file"=>$file			
				];				
			}
			
			return $goods;
		}

		

	}	
?>