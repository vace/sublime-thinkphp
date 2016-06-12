<?php 

/*!========================================================================
 * Version: v1.0
 * Create: 2016年6月12日 下午5:35
 * ========================================================================
 * Author: Vace (ocdo@qq.com)
 * Description: <tp内部函数注释>
 * ======================================================================== */

function readFunctionsByFile($file,$ismodel=false){
	$preg_func = '/function\s(\w+)\(.+?\)/';
	$preg_param = '/(\$\w+)/';
	$txt = file_get_contents($file);
	preg_match_all($preg_func, $txt, $matchs);
	$results = [];
	foreach ($matchs[0] as $key => $value) {
		preg_match_all($preg_param,$value,$paramsMatchs);
		$params = array_map(function($param){ return '{{'.$param.'}}'; },array_pop($paramsMatchs));
		$function = ($ismodel ? '->' : '') . $matchs[1][$key];
		$result = $function .'(' . implode(', ',$params) . ')';
		$results[$function] = $result;
	}
	return $results;
}


$_af = <<<EOL
protected function _after_find(&\$result, \$options) {
    {{#}}
}
EOL;

$_ad = <<<EOL
protected function _after_delete(\$data, \$options ) {
    {{#}}
}
EOL;

$_adb = <<<EOL
protected function _after_db() {}
EOL;

$_ai = <<<EOL
protected function _after_insert(\$data, \$options) {
    {{#}}
}
EOL;

$_as = <<<EOL
protected function _after_select(&\$result, \$options){
    foreach(\$result as &\$record){
        \$this->_after_find(\$record,\$options);
    }
    {{#}}
}
EOL;

$_au = <<<EOL
protected function _after_update(\$data, \$options) {
   {{#}}
}
EOL;

$_bi = <<<EOL
protected function _before_insert(&\$data, \$options) {
    {{#}}
}
EOL;

$_bu = <<<EOL
protected function _before_update(&\$data, \$options) {
 
}
EOL;

$snipperOne = compact('_af','_ad','_ai','_as','_au','_bi','_bu','_adb');
$snipperTwo = readFunctionsByFile('./assets/functions.txt');
$snipperThr = readFunctionsByFile('./assets/models.txt',true);

return array_merge($snipperOne,$snipperTwo,$snipperThr);
