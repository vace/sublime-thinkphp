<?php 
class UserModel extends \Think\Model {
    protected $_validate =   array();  // 自动验证定义
    protected $_auto     =   array();  // 自动完成定义
    protected $_map      =   array();  // 字段映射定义
    protected $_scope    =   array();  // 命名范围定义
	
	public function getUser(){}

	protected function _after_find(&$result, $options) {
	    
	}
}


class UserViewModel extends \Think\Model\ViewModel {
    public $viewFields = array();

    protected function _after_db() {}
}


