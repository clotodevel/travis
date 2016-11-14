<?php
class HogeTest extends PHPUnit_Framework_TestCase
{
	public $stack = array();
	/**
	 * @test
	 */
	public function Hogeをテスト(){
		$hoge = new Hoge();
		$this->assertEquals(0, $hoge->count());
		//$this->assertEquals(1, $hoge->count());

		$this->stack = array('1111', '2222', '33333', '43');
		$this->assertEquals(3, 3);
		$this->assertEquals('bar', $hoge->レディス());



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
		print $value;

	}
}