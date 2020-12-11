<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base extends CI_Controller
{

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		// Construct the parent class
		parent::__construct();
		// load library
		$this->load->library('session');
		// check session
		$userdata = $this->session->all_userdata();
		if (empty($userdata['username'])) {
			redirect('/login', 'refresh');
		}

		if ((!empty($userdata['username']) && $userdata['user_type'] == '1')) {
			redirect('public/profile', 'refresh');
		} elseif ($userdata['username'] && $userdata['user_type'] == '2') {
			redirect('pemilik/pemilik', 'refresh');
		}
	}
}
