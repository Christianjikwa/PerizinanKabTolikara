<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	public function get_data($tbl)
	{
			$this->db->from($tbl);
			$query = $this->db->get();

			return $query;
	}

	public function get_data_by_pk($tbl, $where, $id)
	{
				$this->db->from($tbl);
				$this->db->where($where,$id);
				$query = $this->db->get();

				return $query;
	}

	public function save_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}

	public function update_data($tbl, $where, $data)
	{
		$this->db->update($tbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_data_by_pk($tbl, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($tbl);
	}

}
