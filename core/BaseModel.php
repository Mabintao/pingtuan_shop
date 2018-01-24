<?php
	// 封装mysql的类
	class BaseModel{

		private $link;
		private $debug = true;  //调试模式是否开启
		private $definedCondition = "";  //自己定义的条件
		private $id;
		private $table;

		
		/**
		 * 新建Mysql类就建立连接
		 */
		function __construct($table){
			$this->link = new PDO('mysql:dbhost=localhost;dbname=pintuan_shop;charset=utf8','root');
			$this->table = $table;
			if ($this->debug) {
				$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		}
		
		/**
		 * 向指定表中添加数据
		 * @param  String $table    表明
		 * @param  Array  $add_data 数据数组
		 * @return null  
		 */
		function insert($add_data=[]){
			$table=$this->table;
			$col = $this->get_cols($add_data);
			$values = $this->get_colsValue($add_data);
			
			$this->link->query("insert into $table($col) values ($values)");

		}

		/**
		 * 删除指定条件的数据
		 * @param  String $table     表名
		 * @param  array  $condition 条件数组
		 * @return null           
		 */
		function delete($condition=[]){
			$table=$this->table;
			if(!empty($condition)){
				$this->definedCondition = $this->get_conditionStr($condition);
			}
			
			$this->link->query("delete from $table where $this->definedCondition");

		}

		/**
		 * 根据id进行删除操作
		 * @param  String $table 表名
		 * @param  number $id    要删除数据的id值
		 * @return null        
		 */
		function deleteById($id){
			$table=$this->table;
			$this->link->query("delete from $table where id = $id");
		}

		/**
		 * 更新操作
		 * @param  String $table     表名
		 * @param  array  $data      更新的数据
		 * @param  array  $condition 更新的条件
		 * @return null            
		 */
		function update($data=[],$condition=[]){
			$table=$this->table;
			$updataStr = $this->get_updateStr($data);
			if(!empty($condition)){
				$this->definedCondition = $this->get_conditionStr($condition);
				$this->link->query("update $table set $updataStr where $this->definedCondition");
			}else{
			
				$this->link->query("update $table set $updataStr where id = $this->id");
			}

			
		}

		/**
		 * 查询所有的商品
		 * @param  String $table 表名
		 * @return Array        包含商品信息的数组
		 */
		function selectAll(){
			$table=$this->table;
			$pdoStatement = $this->link->prepare("select * from $table");

			$pdoStatement->execute();

			return $pdoStatement->fetchAll();

		}

		/**
		 * 通过id查询商品
		 * @param  String $table 表名
		 * @param  String $id    查询的商品id
		 * @return Array        包含商品信息的数组
		 */
		function selectById($id){
			$table=$this->table;
			//使用预处理的好处
			//1.防止sql注入 select * from admin where user_name='' and user_pwd ='' or 1=1 or 1=''
			//  不需要用户名和密码可以直接登陆后台
			//  
			//2.获取结果集
			
			//1.预处理
			$pdoStatement = $this->link->prepare("select * from $table where id=$id");

			//2.执行
			$pdoStatement->execute();

			//3.获取信息
			return $pdoStatement->fetch();
 

			$res = $this->link->query("select * from $table where id = $id");
			return $res;
		}

		function accord($id){
			$this->id = $id;
			return $this;
		}

		/**
		 * 可以自己输入删除条件
		 * @param  String $condition 删除条件语句
		 * @return $this            链式调用 需要辅助该对象其他方法一起使用
		 */
		function definedCondition($condition){
			$this->definedCondition = $condition;
			return $this;
		}

		/**
		 * 从数组中获取字段名称
		 * @param  Array $data 传入的数组
		 * @return String           字段字符串
		 */
		function get_cols($data){
			$col_arr = array_keys($data);
			$col = implode(",",$col_arr);			
			return $col;
		}

		/**
		 * 从数组中获取字段值
		 * @param  Array $data 传入的数组
		 * @return String       字段值字符串
		 */
		function get_colsValue($data){	
			foreach ($data as $key => $value) {
				if(is_string($value)){
					
					$data[$key] = "'".$value."'";
				}	
			}	
			$values = implode(",",$data);
			return $values;						
		}

		/**
		 * 获取删除条件的数组
		 * @param  Array $condition 条件数组
		 * @return string            条件字符串
		 */
		function get_conditionStr($condition){
			$conditionStr = "";
			foreach ($condition as $key => $value) {
				if(empty($conditionStr)){
					$conditionStr.="$key='$value'";
				}else{
					$conditionStr.="and $key='$value'";
				}
			}
			return $conditionStr;
		}

		/**
		 * 获取更新数据的字符串
		 * @param  Array $data 更新数据数组
		 * @return String       更新数据字符串
		 */
		function get_updateStr($data){
			$updataStr = "";
			foreach ($data as $key => $value) {
				if(empty($updataStr)){
					$updataStr.="$key='$value'";
				}else{
					$updataStr.=","."$key='$value'";
				}
			}
			return $updataStr;
		}

	}

?>