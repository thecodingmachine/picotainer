<?php
namespace Mouf\Picotainer;

/**
 * Test class for Picotainer
 *
 * @author David Négrier <david@mouf-php.com>
 */
class PicotainerTest extends \PHPUnit_Framework_TestCase {

	public function testGet() {
		$container = new Picotainer([
				"instance" => function() { return "value"; }
		]);
		
		$this->assertEquals('value', $container->get('instance'));
	}
	
	public function testDelegateContainer() {
		$container = new Picotainer([
				"instance" => function() { return "value"; }
		]);
		
		$container2 = new Picotainer([
				"instance2" => function($container) { return $container->get('instance'); }
		], $container);
	
		$this->assertEquals('value', $container2->get('instance2'));
	}

	public function testHas() {
		$container = new Picotainer([
				"instance" => function() { return "value"; }
		]);

		$this->assertTrue($container->has('instance'));
		$this->assertFalse($container->has('instance2'));
	}
}