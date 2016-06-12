#!/usr/bin/php
<?php 

class ParseTemplate{

	private $scope = [
		'php' => 'source.php - variable.other.php',
		'html'=> 'text.html - source - meta.tag, punctuation.definition.tag.begin, text.tpl'
	];

	const LANG_PHP  = 'php';
	const LANG_HTML = 'html';

	const CONF_SUFFIX = '.conf.php';
	const OUTPUT_SUFFIX = '.sublime-completions';

	private $_task = [];
	public function addConf($src,$outputName,$lang){
		$this->_task[] = [
			'src'  => $src,
			'name' => $outputName,
			'lang' => $lang
		];
		return $this;
	}

	private $_outputDir = '../';

	public function output($dirs=null){
		if($dirs !== null){
			$this->_outputDir = $dirs;
		}
		
		return array_map([$this,'_runTask'],$this->_task);
	}

	private function _runTask($task){
		$results = include_once	$task['src'] . static::CONF_SUFFIX;
		$completions = [];
		$compleRegex = '/{{(\^?\w*?|#)}}/';
		
		foreach ($results as $key => $value) {
			$counts = 1;
			$value = str_replace(['$'], ['^'], $value);
			$result = preg_replace_callback($compleRegex, function($mathes) use (&$counts){
				return $mathes[1]==='#' ? '$0' : ('${' .$counts++. ':'.$mathes[1].'}');
			}, $value);
			$result = str_replace('^', '\\$' ,$result);
			$completions[] = [
				'trigger' => $key,
				'contents' => $result
			];
		}

		$json_base = [
			'scope'       => $this->scope[$task['lang']],
			'completions' => $completions
		];
		$snipperName = $this->_outputDir . $task['name'] . static::OUTPUT_SUFFIX;
		file_put_contents($snipperName, json_encode($json_base));

		echo  $snipperName . ' build success' . PHP_EOL;

		return $snipperName;
	}
	public static function instance(){
		return new ParseTemplate();
	}

}


$parse = ParseTemplate::instance();

$parse->addConf('./functions','tp-functions',ParseTemplate::LANG_PHP);
$parse->addConf('./system.class','tp-system-class',ParseTemplate::LANG_PHP);
$parse->addConf('./taglibs','tp-taglibs-html',ParseTemplate::LANG_HTML);

$parse->output();