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
	
	/**
	 * @var boolean Automatically output
	 */
	private $auto;
	
	public function __construct(bool $auto=true)
	{
		/**
		 * For live implementation, set to "true" auto mode.
		 * For testing, set to "false" auto mode.
		 */
		$this->auto = $auto;
	}
	
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
		return json_encode($this);
	}
	
	public function __destruct()
	{
		if($this->auto)
		{
			header("Content-Type: text/plain");
			echo $this->json();
		}
	}
}
