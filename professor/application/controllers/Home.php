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



class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('array');
		$this->load->model('Login');
	}

	public function index() {
	//verifica se está logado e já redireciona para inicio.
	if($this->session->userdata('logado')==TRUE)
		redirect('Home/inicio');

		$data_template = array(
							'controller' => strtolower($this->router->fetch_class()),
							'page' => $this->router->fetch_method(),
						);

		$this->load->view('template', $data_template);
	}

	public function login() {
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[45]', 'required');
		$this->form_validation->set_rules('senha', 'SENHA', 'required|max_length[45]', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = array(
						'email' => $this->input->post('email'),
						'senha' => md5($this->input->post('senha'))
			);

			$prof = $this->Login->efetuarlogin($dados);

			if (count($prof) == 1) {
				$data_session_set = array(
					'logado' => TRUE,
					'idprofessor' => $prof->idprofessor,
					'username' => $prof->nome
				);
				$this->session->set_userdata($data_session_set);

				redirect('Home/inicio');
			} else {
				$this->session->set_flashdata('loginerro','Erro ao efetuar login. Login/senha não encontrados!');
				redirect(base_url());
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function inicio(){
		$data_template = array(
							'controller' => strtolower($this->router->fetch_class()),
							'page' => $this->router->fetch_method()
						);
		$this -> load -> view('template', $data_template);

	}
}
