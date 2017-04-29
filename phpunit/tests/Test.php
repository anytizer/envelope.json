<?php
/**
 * Define your own Test Cases
 */
class ApiPingTest extends PHPUnit\Framework\TestCase
{
	public function setup()
	{
		$this->envelope = new envelope(false);
	}
	
	public function testBoolFalseFound()
	{
		$expect = array(
			"status" => true,
			"data" => false
		);		
		
		$data = $expect["data"];
		$this->envelope->found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
	
	public function testBoolTrueFound()
	{
		$expect = array(
			"status" => true,
			"data" => true
		);		
		
		$data = $expect["data"];
		$this->envelope->found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testTestArrayFound()
	{
		$expect = array(
			"status" => true,
			"data" => array(
				"id" => "25"
			),
		);
		
		$envelope = new envelope(false);
		
		$data = $expect["data"];
		$this->envelope->found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
	
	public function testTestComplexArrayFound()
	{
		$expect = array(
			"status" => true,
			"data" => array(
				"id" => "40",
				"children" => array(
					"total" => 80,
					"error" => true,
				),
				"others" => "no",
			),
		);
		
		$envelope = new envelope(false);
		
		$data = $expect["data"];
		$this->envelope->found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
	
	public function testBoolTrueNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => true
		);		
		
		$data = $expect["data"];
		$this->envelope->not_found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
	
	public function testBoolFalseNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => false
		);		
		
		$data = $expect["data"];
		$this->envelope->not_found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testTestArrayNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => array(
				"id" => "25"
			),
		);
		
		$envelope = new envelope(false);
		
		$data = $expect["data"];
		$this->envelope->not_found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
	
	public function testTestComplexArrayNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => array(
				"id" => "40",
				"children" => array(
					"total" => 80,
					"error" => true,
				),
				"others" => "no",
			),
		);
		
		$envelope = new envelope(false);
		
		$data = $expect["data"];
		$this->envelope->not_found($data);
		$json = $this->envelope->json();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
}
