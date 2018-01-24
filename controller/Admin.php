<?php
	/**
	* 管理员的类
	*/
	class Admin extends BaseControl
	{
		
		//后台首页
		public function index()
		{	
			$this->display();
		}

		// 登陆操作
		public function login()
		{
			$this->display();
		}


		//删除操作
		public function del()
		{
			$this->display();
		}

		
	}
?>