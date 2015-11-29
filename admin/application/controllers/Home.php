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
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> library('session');
		$this -> load -> helper('array');
		$this -> load -> model('Login');
	}

	public function index() {
	//verifica se está logado e já redireciona para inicio.
	if($this->session->userdata('logado')==TRUE)
		redirect('Home/inicio');

		$data_template = array(
							'controller' => $this->router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'index',
						);

		$this -> load -> view('template', $data_template);
	}

	public function login() {
		$this->form_validation->set_rules('admin', 'LOGIN', 'trim|required|max_length[45]|strtolower', 'required', array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|max_length[45]|strtolower', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = array(
						'admin' => $this->input->post('admin'),
						'senha' => $this->input->post('senha'),
			);

			$admin = $this->Login->efetuarlogin($dados);

			if (count($admin) == 1) {
				$dados = array(
							'admin'  => $admin[0]->admin,
							'logado' => TRUE
				);
				$this->session->set_userdata($dados);

				redirect('/Home/inicio');
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
							'controller' => $this-> router->fetch_class(),
							'action' => $this->router->fetch_method(),
							'page' => 'inicio',
						);
		$this -> load -> view('template', $data_template);
	}

		public function backup(){
			// Load the DB utility class
			$this->load->dbutil();

			// Backup your entire database and assign it to a variable
			$backup = $this->dbutil->backup();

			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('~/MEGAsync/mybackup.gz', $backup);
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('mybackup.gz', $backup);
		}
}
