<?php 

/**
 * 系统内部类定义
 */

$Model = <<<EOF
class {{User}}Model extends \Think\Model {
    protected \$_validate =   array();  // 自动验证定义
    protected \$_auto     =   array();  // 自动完成定义
    protected \$_map      =   array();  // 字段映射定义
    protected \$_scope    =   array();  // 命名范围定义
	
	{{#}}
}

EOF;

$AdvModel = <<<EOF
class {{User}}Model extends \Think\Model\AdvModel {
    protected \$_filter        =   array();  // 过滤的字段
    protected \$serializeField =   array();  // 序列化字段
    protected \$blobFields     =   array();  // 文本字段
    protected \$readonlyField  =   array();  // 只读字段
    protected \$partition      =   array(); // 数据分表
    protected \$returnType     =   'array'; // 返回类型
    protected \$optimLock      =   'lock_version'; //悲观锁和乐观锁

    {{#}}
}

EOF;



$ViewModel = <<<EOF
class {{User}}Model extends \Think\Model\ViewModel {
    public \$viewFields = array();

    {{#}}
}

EOF;



$RelationModel = <<<EOF
class {{User}}Model extends \Think\Model\RelationModel {
    protected \$_link = array();

    {{#}}
}

EOF;


$MongoModel = <<<EOF
class {{User}}Model extends \Think\Model\MongoModel {
    protected \$_link = array();

    {{#}}
}

EOF;

$Controller = <<<EOF
class {{Index}}Controller extends \Think\Controller {
	public function {{index}}(){
		{{#}}
	}
}

EOF;

$TagLib = <<<EOF
class {{New}}TagLib extends \Think\Template\Taglib {
	protected \$tags = array({{#}});

	public function {{_tagName}}(\$tag,\$content){
		return \$content;
	}
}
EOF;

$Widget = <<<EOF
class {{New}}Widget extends \Think\Controller{
    public function menu(){
		{{#}}
    }
}
EOF;

$Behavior = <<<EOF
class {{New}}Behavior extends \Think\Behavior {
    public function run(&\$return){
    	{{#}}
    }
}
EOF;

$_c908a2775653 = compact(
	'Model','AdvModel','ViewModel','RelationModel','MongoModel',
	'Controller','TagLib','Widget','Behavior'
);

return $_c908a2775653;