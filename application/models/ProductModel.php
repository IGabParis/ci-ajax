<?php
class ProductModel extends CI_Model{

	function listAll(){
		$data=$this->db->get('products');
		return $data->result();
	}

	function insertProduct(){
		$data = array(
				'code' => $this->input->post('code'), 
				'name_product' => $this->input->post('name_product'), 
				'cat_product' => $this->input->post('cat_product'), 
				'price' => $this->input->post('price'), 
				'quant' => $this->input->post('quant'), 
			);
		$result=$this->db->insert('products',$data);
		return $result;
	}

	function updateProduct(){
		$code=$this->input->post('code');
		$price=$this->input->post('price');
		$quant=$this->input->post('quant');

		$this->db->set('price', $price);
		$this->db->set('quant', $quant);
		$this->db->where('code', $code);
		$result=$this->db->update('products');
		return $result;
	}

	function deleteProduct(){
		$code=$this->input->post('code');
		$this->db->where('code', $code);
		$result=$this->db->delete('products');
		return $result;
	}
	
}