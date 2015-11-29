<?php
    /*
 *
			Copyright 2015 João Rodolfo da Silva Paiva

	This file is part of E-RESERVAS.

    E-RESERVAS is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    E-RESERVAS is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with E-RESERVAS.  If not, see <http://www.gnu.org/licenses/>.

 *
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Salas extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('array');
		$this->load->model('Sala');
		if($this->session->userdata('logado')==FALSE)
			redirect('home');
	}

	public function index() {
		$data_template = array(
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'index',
						);

		$this -> load -> view('template', $data_template);
	}

	public function create(){
		$this->form_validation->set_rules('descricaosala','DESCRIÇÃO','trim|required|max_length[15]|ucwords');
		$this->form_validation->set_rules('bloco','BLOCO','trim|max_length[15]|ucwords');

		if($this->form_validation->run()==TRUE){
			$dados = elements(array('descricaosala','bloco'),$this->input->post());
			$this->Sala->do_insert($dados);
		}else{

			$data_template = array(
								'controller' => $this->router->fetch_class(),
								'action' => $this->router->fetch_method(),
								'page' => 'create',
							);
			$this -> load -> view('template', $data_template);
		}
	}

	public function retrieve(){
		$this->load->library('pagination');
		$config['base_url'] = base_url('salas/retrieve');
		$config['total_rows'] = $this->Sala->get_all()->num_rows();
		$config['per_page'] = 15;
		$config['first_link'] = 'Primeira';
		$config['last_link'] = 'Última';
		$config['attributes'] = array('class' => 'pagination');
		$quantidade = $config['per_page'];
		($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;

		$this->pagination->initialize($config);

		$data_template = array(
							'query' => $this->Sala->get_all()->result(),
							'paginacao' => $this->pagination->create_links(),
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'retrieve',
						);

		$this -> load -> view('template', $data_template);
	}


	public function update(){
		$this->form_validation->set_rules('descricaosala','DESCRIÇÃO','trim|required|max_length[15]|ucwords');
		$this->form_validation->set_rules('bloco','BLOCO','trim|max_length[15]|ucwords');

		if($this->form_validation->run()==TRUE):
			$dados = elements(array('descricaosala','bloco'),$this->input->post());
			$this->Sala->do_update($dados,array('idsala'=>$this->input->post('idsala')));
		endif;

		$data_template = array(
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'update',
						);

		$this -> load -> view('template', $data_template);
	}

	public function delete(){
		if($this->input->post('idsala') > 0):
			$this->Sala->do_delete(array('idsala'=>$this->input->post('idsala')));
		endif;
		$data_template = array(
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'delete',
						);

		$this -> load -> view('template', $data_template);
	}

}
