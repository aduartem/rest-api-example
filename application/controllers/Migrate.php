<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @author  aduartem
 *
 */
class Migrate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('migration');

        if( ! $this->input->is_cli_request())
        {
            show_404();
            return;
        }
	}

	public function current()
	{
        if( $this->migration->current() )
            echo 'Migración exitosa' . PHP_EOL;
        else
			show_error($this->migration->error_string());
	}

	public function version($version = NULL)
	{
		$version = (int) $version;
		
		if( empty($version) && $version !== 0 )
		{
			echo 'Falta parámetro versión' . PHP_EOL;
			return;
		}

        if( $this->migration->version($version) )
            echo 'Migración exitosa' . PHP_EOL;
        else
			show_error($this->migration->error_string());
	}

	public function latest()
	{
        if( $this->migration->latest() )
            echo 'Migración exitosa' . PHP_EOL;
        else
			show_error($this->migration->error_string());
	}
}