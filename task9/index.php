<?php
    include_once 'lib/HtmlHelper.php';
	include_once 'lib/functions.php';
	include_once 'lib/config.php';

$output = array();


$arrDl = array('One' => 'dasdasdasdas',
				'Two'=> 'weqweqwewqeqwe',
				'Three' => 'zcxczczcxzcadasdasdsadsadsadasdsadasdasdasdasd');


$output['%dl%'] = HtmlHelper::makeDl($arrDl);

$arrSel = array('one' => 'One Text',
				'two' => 'two Text',
				'three' => 'Three text',
				'four' => 'Four Text',);

$selected = array('two' => 'two Text', 'four' => 'Four Text');  
$output['%selMult%'] = HtmlHelper::makeSelect($arrSel,'select', 3, true, $selected);



$output['%selSing%'] = HtmlHelper::makeSelect($arrSel, 'select', 0, false, array('two' => 'two Text'));


$arrCheckRadio = array('One' => 'valueOne',
				'Two'=> 'valueTwo',
				'Three' => 'valueThree');

$checked = array('Three' => 'valueThree', 'One' => 'valueOne');

$output['%checkBox%'] = HtmlHelper::makeCheckBox($arrCheckRadio, false, $checked);


$output['%radioBoxVertical%'] = HtmlHelper::makeRadioBox($arrCheckRadio, 'Two', 'radio', false);
$output['%ulBox%'] = HtmlHelper::makeList($arrSel);
$output['%olBox%'] = HtmlHelper::makeList($arrSel, false);

$tableArr = array(array('1' => 'text One',
						'2' => 'text Two',
						'3' => 'text Three',
						'4' => 'text Four',),
				  array('odin' => 'qqqqq',
						'dva' => 'wwwwww',
						'tri' => 'eeeeeee',
						'chetire' => 'rrrrrrr'),
				  array('aaaa' => 'aaa',
						'ssss' => 'sss',
						'ddd' => 'ddd',
						'ffffff' => 'ff'));


$output['%tableAlignRightWithName%'] = HtmlHelper::makeTable($tableArr,'TABLE!','right',5);
$output['%tableAlignCenter%'] = HtmlHelper::makeTable($tableArr,'');


templateRender($output);

?>

