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

if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class disciplina extends CI_Model{
	
	public function do_insert($dados=NULL){
		if($dados!=NULL):
			$this->db->insert('disciplina',$dados);
			$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
			redirect('disciplinas/create');
		endif;
	}
	
	public function do_update($dados=NULL, $condicao=NULL){
		if($dados!=NULL && $condicao!=NULL):
			$this->db->update('disciplina',$dados,$condicao);
			$this->session->set_flashdata('edicaook','Cadastro alterado com sucesso');
			redirect(current_url());
		endif;
	}
	
	public function do_delete($condicao=NULL){
		if($condicao!=NULL):
			$this->db->delete('disciplina',$condicao);
			$this->session->set_flashdata('excluirok','Registro deletado com sucesso');
			redirect('disciplinas');
		endif;
	}
	
	public function get_all($quantidade=0, $inicio=0){
		if($quantidade > 0) $this->db->limit($quantidade, $inicio);
		
		$this->db->select('disciplina.iddisciplina, disciplina.descricaodisciplina, disciplina.cargahoraria, professor.nome, curso.descricaocurso');
		$this->db->from('disciplina');
		$this->db->join('professor', 'disciplina.fk_idprofessor = professor.idprofessor','left');
		$this->db->join('curso', 'disciplina.fk_idcurso = curso.idcurso','left');
		return $this->db->get();
	}
	
	public function get_byid($id=NULL){
		if ($id!=NULL) :
			$this->db->where('iddisciplina',$id);
			$this->db->limit(1);
			return $this->db->get('disciplina');
		else :
			return FALSE;
		endif;
	}
}