<?php
	
	class BaseControl{
		
		protected static $control_name;
		protected static $action_name;
		private $smarty;     //使用smarty模板引擎 最终实现效果 能在html页面中书写php代码

		function __construct(){
			
			//创建smarty对象
			$this->smarty = new Smarty();

			//指定smarty视图层的位置
			$this->smarty->template_dir = "view";

		}

		//父类控制器run方法封装
		public static function run(){

			//获取请求的控制器的名称 如果没有输入 默认进入goods控制器
			self::$control_name = isset($_REQUEST["control"])?ucfirst($_REQUEST["control"]):ucfirst("goods");
			//获取请求的操作的名称 如果没有输入 默认实行index操作
			self::$action_name = isset($_REQUEST["action"])?$_REQUEST["action"]:"index";

			$control_name = self::$control_name;
			$action_name = self::$action_name;

			//确定是否存在控制器文件  不存在提示错误
			if(!file_exists("controller/$control_name.php")){
				echo "控制器: $control_name 不存在"; exit();
			}

			include "controller/$control_name.php"; //引入控制器文件

			$object = new $control_name();//实例化指定的对象
			
			//判断方法是否存在 不存在提示错误
			if(!method_exists($object, $action_name)){
				echo "方法： $action_name 不存在";
			}			

			$object->$action_name();//调用对象指定的行为
		} 

		/**
		 * smarty向页面注入数据模型
		 * @param  String $key   键值
		 * @param  不限   $value 注入的数据
		 */
		function assign($key,$value){
			$this->smarty->assign($key,$value);
		}

		/**
		 * Smarty控制页面显示
		 */
		function display($index=""){
			if($index==""){
				$this->smarty->display(self::$control_name.'/'.self::$action_name.'.html');
			}else{
				$this->smarty->display('Goods/index.html');
			}
			
		}

		function model($model_name){
			$model = $model_name.'Model';
			if(!file_exists("model/$model.php")){
				echo "模型 $model 不存在";exit();
			}
			include "model/$model.php";
			if($model_name == "Goods"){
				return new $model("sp_goods");
			}else{
				return new $model("sp_admin");
			}
			
		}

	}
?>