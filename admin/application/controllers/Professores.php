<?php
/*
 *
 Copyright 2015 João Rodolfo da Silva Paiva

 This file is part of e-reservas.

 e-reservas is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 e-reservas is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with e-reservas.  If not, see <http://www.gnu.org/licenses/>.

 */

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Professores extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> helper('array');
		$this->load->model('Professor');
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
		//validação do form. 'nome do campo','nome para aparecer na mensagem','regras'

		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema');
		$this->form_validation->set_rules('email','EMAIL','trim|required|max_length[50]|strtolower|valid_email');
		$this->form_validation->set_rules('senha','SENHA','required|strtolower');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
		$this->form_validation->set_rules('senha2','REPITA A SENHA','required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE){
			//$dados = elements(array('nome','email','senha'),$this->input->post());
			$dados['nome'] = $this->input->post('nome');
			$dados['email'] = $this->input->post('email');
			$dados['senha'] = md5($this->input->post('senha'));

			$this->Professor->do_insert($dados);
		}else{
			$data_template = array(
								'controller' => $this->router->fetch_class(),
								'action' => $this->router->fetch_method(),
								'page' => 'create',
							);
			$this->load->view('template', $data_template);
		}
	}

	public function retrieve()	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('professores/retrieve');
		$config['total_rows'] = $this->Professor->get_all()->num_rows();
		$config['per_page'] = 15;
		$config['first_link'] = 'Primeira';
		$config['last_link'] = 'Última';
		$config['attributes'] = array('class' => 'pagination');
		$quantidade = $config['per_page'];
		($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;

		$this->pagination->initialize($config);

		$data_template = array(
							'query' => $this->Professor->get_all()->result(),
							'paginacao' => $this->pagination->create_links(),
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'retrieve',
						);

		$this -> load -> view('template', $data_template);
	}

	public function update()	{
			//validação do form. 'nome do campo','nome para aparecer na mensagem','regras'
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('senha','SENHA','required|strtolower');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
		$this->form_validation->set_rules('senha2','REPITA A SENHA','required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
			$dados = elements(array('nome','senha'),$this->input->post());
			$dados['senha'] = md5($dados['senha']);
			$this->Professor->do_update($dados,array('idprofessor'=>$this->input->post('idprofessor')));
		endif;

		$data_template = array(
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'update',
						);

		$this -> load -> view('template', $data_template);
	}

	public function delete(){
		if($this->input->post('idprofessor') > 0):
			$this->Professor->do_delete(array('idprofessor'=>$this->input->post('idprofessor')));
		endif;
		$data_template = array(
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'delete',
						);

		$this -> load -> view('template', $data_template);
	}
}
