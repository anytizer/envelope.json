<?php
namespace common;

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
    public $success;

    /**
     * mixed
     */
    public $data;
	
	/**
	 * @var boolean Automatically echo/flush output
	 */
	private $auto_output;

    /**
     * envelope constructor.
     * @param bool $auto_output
     */
	public function __construct(bool $auto_output=true)
	{
		/**
		 * For live implementation, set to "true" auto_output mode.
		 * For testing, set to "false" auto_output mode.
		 */
		$this->auto_output = $auto_output;
	}
	
	/**
	 * Everything completed normally
	 *
     * @param $data
     */
	public function found($data)
	{
		$this->success = true;
		$this->data = $data;
	}
	
	/**
	 * Oh, there was an error at server side
	 * Client should handle this case
	 *
     * @param $data
     */
	public function not_found($data)
	{
		$this->success = false;
		$this->data = $data;
	}
	
	/**
	 * @todo Make it private after the the tests are ok
	 */
	public function output()
	{
	    $output = json_encode($this);
        return $output;
	}

    /**
     * Flushes the JSON output
     */
	public function __destruct()
	{
		if($this->auto_output === true)
		{
			if(!headers_sent())
			{
				header("Content-Type: text/json");
			}

			$output = $this->output();
            
            echo $output;
			flush();
		}
	}
}
