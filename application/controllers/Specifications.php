<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Specifications extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('specification_model');
	}
	
	public function index() {
		redirect('/employees/dashboard/');
	}
	
	public function get_specifications() {
		if($this->input->post('categoryId')) {			

			$specifications = $this->specification_model->getRows(array('select' => array('specifications.id','specifications.name'),
																	    'conditions' => array('categories.id' => $this->input->post('categoryId')),
																		'joins' => array('category_specifications' => 'category_specifications.specification_id = specifications.id',
																						 'categories' => 'categories.id = category_specifications.category_id')));
			header('Content-Type:application/json');																			 
			echo ($specifications) ? json_encode($specifications) : json_encode("");
		} else {
			redirect('/employees/dashboard/');
		}
	}

	
}	
?>
