<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orders extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$db = $this->load->database();
			$this->db->set('email_id', $this->input->post('email', TRUE));
			$this->db->set('created_at', date('Y-m-d H:i:s'));
			$this->db->set('updated_at', date('Y-m-d H:i:s'));
			$this->db->insert('orders');
			$orderid = $this->db->insert_id();
			$db = $this->load->database();
			$this->db->set('order_id', $orderid);
			$this->db->set('name', $this->input->post('order_item', TRUE));
			$this->db->set('price', $this->input->post('price', TRUE));
			$this->db->set('quantity', $this->input->post('quantity', TRUE));
			$this->db->set('created_at', date('Y-m-d H:i:s'));
			$this->db->set('updated_at', date('Y-m-d H:i:s'));
			$this->db->insert('ordered_items');

			echo json_encode('success');
		}else if($_SERVER['REQUEST_METHOD'] === 'GET') {
			echo json_encode('success');
		}
	}
	
	public function search()
	{

		$user_id = $this->input->get('user_id');
		$db = $this->load->database();
		$this->db->select('*');
		$this->db->from('ordered_items');
		$this->db->where('order_id', $user_id);
		$query = $this->db->get();

		$data = array();
	    if ( $query->num_rows() > 0 )
	    {
	        foreach ($query->result() as $key => $value) {
	        	$data[] = $value;
	        }
	        echo json_encode($data);
	    }

	}

	public function today()
	{
		$db = $this->load->database();
		$this->db->select('*');
		$this->db->from('ordered_items');
		//$this->db->where('created_at', '2015-10-05');
		$query = $this->db->get();

	    $data = array();
	    if ( $query->num_rows() > 0 )
	    {
	        foreach ($query->result() as $key => $value) {
	        	$data[] = $value;
	        }
	        echo json_encode($data);
	    }

		//echo json_encode('success');
	}

	public function order()
	{
		$db = $this->load->database();
		$URL = $_SERVER['REQUEST_URI'];
		$urlarr = explode('/', $URL);
		//var_dump($urlarr);
		$orderid = $urlarr['4'];
		$orderstatus = $urlarr['5'];
		$query = $this->db->query("update orders set status='".$orderstatus."' where id='".$orderid."'");
		$query->result();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */