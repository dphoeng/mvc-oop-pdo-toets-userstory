<?php


class WagenparkModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getWagenPark()
	{
		$this->db->query('SELECT * FROM `Auto`');
		return $this->db->resultSet();
	}

	public function getWagenById($id)
	{
		$this->db->query('SELECT * FROM `Kilometerstand` WHERE Id = :id');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}
}
