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

		$value = '&meta_keywords(メタキーワード) &meta_description(メタディスクリプション)';
		//$this->assertEquals(1, $hoge->count());
		echo $convert_value = isExistMetaTag($value);
		echo "\n";
		echo convertMetaKeywords($convert_value);


		$this->stack = array('1111', '2222', '33333', '43');
		$this->assertEquals(3, 3);

		//$this->assertEquals('bar', $hoge->レディス());



		/*
		$hoge->push('hoge');
		$this->assertEquals(1, $hoge->count());
		$this->assertEquals('hoge', $hoge->pop());

		$this->assertEquals(0, $hoge->カウント());
		*/
	}

	public function testArrayPop(){

	}
}

function isExistMetaTag($value) {
	if(strpos($value, '&meta_') !== FALSE){
		return TRUE;
	}
	return FALSE;
}

function convertMetaKeywords($value) {
	if(strpos($value, '&meta_keywords') !== FALSE && preg_match('/'. META_KEYWORDS_RE .'/', $value)){
		return preg_replace('/'. META_KEYWORDS_RE .'/', "", $value);

	}
}
function convertMetaDescription() {
	if(strpos($value, '&meta_description') !== FALSE && preg_match('/'. META_DESCRIPTION_RE .'/', $value)){
		return preg_replace('/'. META_DESCRIPTION_RE .'/', "", $value);
	}
}

function convertMetaCanonical() {
	if(strpos($value, '&meta_canonical') !== FALSE && preg_match('/'. META_CANONICAL_RE .'/', $value)){
		return preg_replace('/'. META_CANONICAL_RE .'/', "", $value);
	}
}

/*
	//titleタグ削除処理
	if(strpos($value, '&title(') !== FALSE && preg_match('/'. TITLE_RE .'/', $value)){
		$value = preg_replace('/'. TITLE_RE .'/', "", $value);
		if(!$value){//preg_replaceで変換して空行になった場合には改行しない
			$return_flg = FALSE;
		}
	}

	// entry_title変更構文
	// entry_titleタグ削除処理
	if(strpos($value, '&entry_title(') !== FALSE && preg_match('/'. ENTRY_TITLE_RE .'/', $value)){
		$value = preg_replace('/'. ENTRY_TITLE_RE .'/', "", $value);
		if(!$value){//preg_replaceで変換して空行になった場合には改行しない
			$return_flg = FALSE;
		}
	}

}
*/
/*
class Hoge
{
	public $stack = array();
	public function __construct(){
		$this->stack = array();
	}
	public function push($value){
		array_push($this->stack, $value);
	}
	public function pop(){
		return array_pop($this->stack);
	}
	public function count(){
		return count($this->stack);
	}
	public function カウント(){
		return $this->count();
	}

	public function レディス(){
		require 'vendor/autoload.php';

		$client = new Predis\Client('tcp://127.0.0.1:6379');
		$client->set('foo', 'bar');
		$value = $client->get('foo');
		return $value;
	}
}
*/