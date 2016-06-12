<?php 
/*!========================================================================
 * Version: v1.0
 * Create: 2016年6月12日 下午5:34
 * ========================================================================
 * Author: Vace (ocdo@qq.com)
 * Description: <模板字符串写法>
 * ======================================================================== */


function taglibs_build_closure(){

$taglib_volist = <<<EOL
<volist name="{{list}}" id="{{vo}}">
    {{#}}
</volist>
EOL;

$taglib_foreach = <<<EOL
<foreach name="{{list}}" item="{{v}}">
    {{#}}
</foreach>
EOL;

$taglib_for = <<<EOL
<for start="{{0}}" end="{{100}}">
    {{#}}
</for>
EOL;

$taglib_switch = <<<EOL
<switch name="{{\$case}}" >
    <case value="{{1}}" break="{{0或1}}">{{content1}}</case>
	<default />{{#}}
</switch>
EOL;

$taglib_case = <<<EOL
<case value="{{\$value}}">{{#}}</case>
EOL;

$taglib_eq = <<<EOL
<eq name="{{name}}" value="{{value}}">{{#}}</eq>
EOL;

$taglib_neq = <<<EOL
<neq name="{{name}}" value="{{value}}">{{#}}</neq>
EOL;

$taglib_equal = <<<EOL
<equal name="{{name}}" value="{{value}}">{{#}}</equal>
EOL;

$taglib_notequal = <<<EOL
<notequal name="{{name}}" value="{{value}}">{{#}}</notequal>
EOL;

$taglib_gt = <<<EOL
<gt name="{{name}}" value="{{value}}">{{#}}</gt>
EOL;

$taglib_egt = <<<EOL
<egt name="{{name}}" value="{{value}}">{{#}}</egt>
EOL;

$taglib_lt = <<<EOL
<lt name="{{name}}" value="{{value}}">{{#}}</lt>
EOL;

$taglib_elt = <<<EOL
<elt name="{{name}}" value="{{value}}">{{#}}</elt>
EOL;

$taglib_heq = <<<EOL
<heq name="{{name}}" value="{{value}}">{{#}}</heq>
EOL;

$taglib_nheq = <<<EOL
<nheq name="{{name}}" value="{{value}}">{{#}}</nheq>
EOL;

$taglib_else = <<<EOL
<else />
EOL;

$taglib_in = <<<EOL
<in name="{{id}}" value="{{1,2,3}}">{{#}}</nheq>
EOL;

$taglib_notin = <<<EOL
<notin name="{{id}}" value="{{1,2,3}}">{{#}}</notin>
EOL;

$taglib_between = <<<EOL
<between name="{{id}}" value="{{1,10}}">{{#}}</between>
EOL;

$taglib_notbetween = <<<EOL
<notbetween name="{{id}}" value="{{1,10}}">{{#}}</notbetween>
EOL;

$taglib_range = <<<EOL
<range name="{{id}}" value="{{1,10}}" type="in">{{#}}</range>
EOL;

$taglib_if = <<<EOL
<if condition="{{conditon}}">
    {{#}}
</if>
EOL;

$taglib_elseif = <<<EOL
<elseif condition="{{conditon}}">
    {{#}}
EOL;

$taglib_present = <<<EOL
<present name="{{name}}">{{#}}</present>
EOL;

$taglib_notpresent = <<<EOL
<notpresent name="{{name}}">{{#}}</notpresent>
EOL;

$taglib_empty = <<<EOL
<empty name="{{name}}">{{#}}</empty>
EOL;

$taglib_defined = <<<EOL
<defined name="{{name}}">{{#}}</defined>
EOL;

$taglib_notdefined = <<<EOL
<notdefined name="{{name}}">{{#}}</notdefined>
EOL;

$taglib_assign = <<<EOL
<assign name="{{id}}" value="{{1}}" />
EOL;

$taglib_define = <<<EOL
<define name="{{id}}" value="{{1}}" />
EOL;

$taglib_import = <<<EOL
<import type="{{js}}" file="{{orgName}}" />
EOL;

$taglib_load = <<<EOL
<load href="{{hrefPath}}" />
EOL;

$taglib_js = <<<EOL
<js href="{{hrefPath}}" />
EOL;

$taglib_css = <<<EOL
<css href="{{hrefPath}}" />
EOL;

$taglib_block = <<<EOL
<block name="{{name}}">
	{{#}}
</block>
EOL;

$taglib_extend = <<<EOL
<extend name="{{name}}" />
EOL;

$taglib_include = <<<EOL
<extend name="{{name}}" />
EOL;

$taglib_layout = <<<EOL
<include file="{{hrefPath}}"/>
	{__CONTENT__}
<include file="{{hrefPath}}"/>
EOL;

$taglib_compare = <<<EOL
<compare name="{{name}}" value="{{value}}" type="{{eq}}">
    {{value}}
</compare>
EOL;

$taglib_literal = <<<EOL
<literal>
    {{#}}
</literal>
EOL;

$taglib_nolayout = <<<EOL
{__NOLAYOUT__}
{{#}}
EOL;


$taglib_php = <<<EOL
<php>
    echo '{{#}}';
</php>
EOL;

$taglib_fun = <<<EOL
{\$name|fun={{arg2}},{{###}}}
EOL;

$taglib_def = <<<EOL
{\$name|default="{{#}}"}
EOL;

$defined_vars = get_defined_vars();

$return_result = [];
foreach ($defined_vars as $tag => $vars) {
	if(strpos($tag, 'taglib') === 0){
		$return_result[ substr($tag, 6) ] = $vars;
	}
}

return $return_result;
}

return taglibs_build_closure();
