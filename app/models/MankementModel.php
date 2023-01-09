<?php


class MankementModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getMankementenByInstructeurId($id)
	{
		$this->db->query('SELECT * FROM `Auto` aut INNER JOIN `Instructeur` ins ON aut.InstructeurId = ins.Id WHERE ins.Id = :id');
		return $this->db->resultSet();
	}
}
