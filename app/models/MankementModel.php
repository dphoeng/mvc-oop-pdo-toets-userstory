<?php


class MankementModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAutoByInstructeurId($id)
	{
		$this->db->query('SELECT aut.Id as AutoId, aut.Kenteken as Kenteken, aut.Type as Type, ins.Naam as Naam, ins.Email as Email FROM `Auto` aut RIGHT JOIN `Instructeur` ins ON aut.InstructeurId = ins.Id WHERE ins.Id = :id LIMIT 1');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	public function getMankementenByAutoId($id)
	{
		$this->db->query('SELECT man.Datum, man.Mankement FROM `Mankement` man INNER JOIN `Auto` aut ON man.AutoId = aut.Id WHERE aut.Id = :id ORDER BY man.Datum DESC');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->resultSet();
	}
}
