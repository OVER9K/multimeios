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

class Reservas extends CI_Controller {

  public function __construct() {
    parent::__construct();
		$this->load->helper('form');
    $this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->model('Reserva');
  }

	public function index(){
		$data_template = array(
							'controller' => strtolower($this->router->fetch_class()),
							'page' => $this->router->fetch_method()
						);
		$this->load->view('template', $data_template);
  }

	public function create(){
		$this->form_validation->set_rules('categoria','CATEGORIA','required');
		$this->form_validation->set_message('required','Escolha um tipo de equipamento!');
		//VERIFICA SE O USUÁRIO ESCOLHEU UMA CATEGORIA, ÚNICO CAMPO QUE NÃO VEM VALOR PADRÃO.
		if($this->form_validation->run() == TRUE){
			$dados = elements(array('iddisciplina','idsala','datareserva','horainicio','periodo','categoria'),$this->input->post());
			//PRA CADA CATEGORIA SELECIONADA
			foreach ($categoria as $linha){
				//SELECIONO TODOS OS EQUIPAMENTOS DELA
				$listaEquipamentos = $this->Reserva->getEquipamento_byCategoria($linha)->result();
				foreach ($listaEquipamentos as $equipamento) {
					//VERIFICO UM POR UM SE POSSUI RESERVA
					if($this->Reserva->verificaReservado($equipamento->idequipamento, $dados) == NULL){
						//SE NÃO POSSUIR SALVO EM UM ARRAY. INDICE = IDCATEGORIA, CONTEUDO = IDEQUIPAMENTO
						$disponivel[$linha] = $equipamento->idequipamento;
					}else {
						//SE POSSUIR RESERVA ENVIO IDCATEGORIA NA MENSAGEM
						$this->session->set_flashdata('indisponivel','Equipamento tipo '.$linha.' indisponível!');
						redirect('equipamentos/create');
					}
				}
			}
			//SE PRA CADA CATEGORIA SELECIONA POSSUIR UM EQUIPAMENTO LIVRE VAI SAIR DOS DOIS FOREACH
			//ENVIANDO O ARRAY DADOS PARA TABELA 'RESERVA' E O DISPONIVEL PARA 'RESERVAEQUIPAMENTO'
			$this->Reserva->do_insert($dados, $disponivel);
		}else{
			$data_template = array(
								'dateMin' => date('Y-m-d', strtotime('+2 day')),
								'dateMax' => date('Y-m-d', strtotime('+2 week')),
								'selectDisciplina' => $this->Reserva->getDisciplina($this->session->idprofessor)->result(),
								'selectSala' => $this->Reserva->getSala()->result(),
								'checkboxCategoria' => $this->Reserva->getCategoria()->result(),
								'controller' => strtolower($this->router->fetch_class()),
								'page' => $this->router->fetch_method()
							);
			$this->load->view('template', $data_template);
		}
	}

	public function equipamentos(){
		//input type="date" retorna YYYY-MM-DD (padrão ISO)
		if (!empty($this->input->post('equipamento')) and !empty($this->input->post('datadareserva'))) {
		$data_template = array(
							'equipamentos' => $this->input->post('equipamento'),
							'datareserva' => $this->input->post('datadareserva'),
							'controller' => strtolower($this->router->fetch_class()),
							'page' => $this->router->fetch_method()
						);
		$this->load->view('template', $data_template);
		}else{
			$data_template = array(
								'equipamentos' => array('nenhum','equipamento','selecionado'),
								'datareserva' => '<br/>nenhuma data selecionada',
								'controller' => strtolower($this->router->fetch_class()),
								'page' => $this->router->fetch_method()
							);
			$this->load->view('template', $data_template);
		}
	}




}
