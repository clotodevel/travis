<?php
class HogeTest extends PHPUnit_Framework_TestCase
{
	public $stack = array();
	/**
	 * @test
	 */
	public function Hogeをテスト(){

		define('META_KEYWORDS_RE',			 '&meta_keywords\([^\)<>\/\'\"&]*\)');
		define('META_DESCRIPTION_RE',		 '&meta_description\([^\)<>\/\'\"&]*\)');
		define('META_CANONICAL_RE',			 '&meta_canonical\([^\)<>\'\"]*\)');
		define('TITLE_RE',					 '&title\(([^\t\n]*)\)');

		$value = '&meta_keywords(メタキーワード)';
		$value2 = '&meta_description(ディスクリプション)';
		//$this->assertEquals(1, $hoge->count());
		$this->assertTrue(isExistMetaTag($value));

		echo $convert_value = convertMetaKeywords($value);
		$regptn = '<meta name="keywords"';

		$this->assertRegExp('/^'.$regptn.'/', $convert_value);
		//echo convertMetaDescription($value);
	}
}

function isExistMetaTag($value) {
	if(strpos($value, '&meta_') !== FALSE){
		return TRUE;
	}
	return FALSE;
}

function convertMetaKeywords($value) {
	if (preg_match('/'. META_KEYWORDS_RE .'/', $value, $match)) {
		preg_match('/\(.+\)$/', $match[0], $m);
		$description = '<meta name="keywords" content="'.trim($m[0], "()").'">';
		//return htmlspecialchars($description);
		return $description;
	}
	return $value;
}
function convertMetaDescription($value) {
	if(strpos($value, '&meta_description') !== FALSE && preg_match('/'. META_DESCRIPTION_RE .'/', $value)){
		die('adf');
		preg_match('/\(.+\)$/', $match[0], $m);
		$description = '<meta name="description" content="'.trim($m[0], "()").'">';
		return htmlspecialchars($description);
	}
}

function convertMetaCanonical() {
	if(strpos($value, '&meta_canonical') !== FALSE && preg_match('/'. META_CANONICAL_RE .'/', $value)){
		return preg_replace('/'. META_CANONICAL_RE .'/', "", $value);
	}
}
