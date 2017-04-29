<?php
namespace tests;
use common\envelope;
use PHPUnit\Framework\TestCase;

/**
 * @see https://phpunit.de/manual/current/en/appendixes.assertions.html#appendixes.assertions.assertJsonStringEqualsJsonString
 */
class JsonEnvelopeTest extends TestCase
{
	public function setup()
	{
	}

	public function testBoolFalseFound()
	{
		$expect = array(
			"status" => true,
			"data" => false
		);
		
		$envelope = new envelope(false);

		$data = $expect["data"];
		$envelope->found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testBoolTrueFound()
	{
		$expect = array(
			"status" => true,
			"data" => true
		);
		
		$envelope = new envelope(false);

		$data = $expect["data"];
		$envelope->found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testArrayFound()
	{
		$expect = array(
			"status" => true,
			"data" => array(
				"id" => "25"
			),
		);

		$envelope = new envelope(false);

		$data = $expect["data"];
		$envelope->found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testComplexArrayFound()
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
		$envelope->found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testBoolTrueNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => true
		);

		$envelope = new envelope(false);

		$data = $expect["data"];
		$envelope->not_found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testBoolFalseNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => false
		);

		$envelope = new envelope(false);

		$data = $expect["data"];
		$envelope->not_found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testArrayNotFound()
	{
		$expect = array(
			"status" => false,
			"data" => array(
				"id" => "25"
			),
		);

		$envelope = new envelope(false);

		$data = $expect["data"];
		$envelope->not_found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}

	public function testComplexArrayNotFound()
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
		$envelope->not_found($data);
		$json = $envelope->output();

		$this->assertJsonStringEqualsJsonString(json_encode($expect), $json);
	}
}
