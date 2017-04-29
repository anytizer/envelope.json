<?php
/**
 * Client should know and expect the envelope data properly
 * No echo, print, print_r, header elsewhere through out the application
 *
 * @todo Make status and data as private members
 */
class envelope
{
    /**
     * @var boolean
     */
    public $status;

    /**
     * mixed
     */
    public $data;
	
	public function found($data)
	{
		$this->status = true;
		$this->data = $data;
	}
	
	public function not_found($data)
	{
		$this->status = false;
		$this->data = $data;
	}
	
	/**
	 * @todo Make it private after the the tests are ok
	 */
	public function json()
	{
		header("Content-Type: text/plain");
		echo json_encode($this);
	}
	
	public function __destruct()
	{
		$this->json();
	}
}
