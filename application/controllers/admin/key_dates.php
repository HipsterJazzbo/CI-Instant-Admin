<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Key_dates extends CI_Controller {
	
	function __construct() 
	{
		parent::__construct();		
		$this->load->library('instant_admin');
		$this->page = $this->instant_admin->page();
	}
	
	function view()
	{
		$this->page->add_column('Date', 'date_date');
		$this->page->add_column('Title', 'date_title');
		
		$this->page->load();
	}
	
	function edit($primary_key)
	{
		$this->page->set_record($primary_key);
		$this->page->add_field('Event Title', 'date_title');
		$this->page->add_field('Date', 'date_date', 'date');
		
		$this->page->load();
	}
}

/* End of file key-dates.php */
/* Location: ./application/controllers/key-dates.php */