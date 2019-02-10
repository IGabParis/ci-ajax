<?php
class Product extends CI_Controller{
	// Construct - Load Model
	function __construct(){
		parent::__construct();
		$this->load->model('ProductModel');
	}

	//Load View
	function index(){
		$this->load->view('productView');
	}

	//Call data
	function dataProduct(){
		$data=$this->ProductModel->listAll();
		echo json_encode($data);
	}

	//Save data product
	function saveProduct(){
		$data=$this->ProductModel->insertProduct();
		echo json_encode($data);
	}

	//Update data product
	function updateProduct(){
		$data=$this->ProductModel->updateProduct();
		echo json_encode($data);
	}

	//Delete data product
	function deleteProduct(){
		$data=$this->ProductModel->deleteProduct();
		echo json_encode($data);
	}

}