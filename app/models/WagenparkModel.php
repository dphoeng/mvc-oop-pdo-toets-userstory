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

	public function getLatestKilometerstandById($id)
	{
		$this->db->query('SELECT * FROM `Kilometerstand` WHERE Id = :id LIMIT 1 ORDER BY KmStand DESC');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	public function getWagenById($id)
	{
		$this->db->query('SELECT * FROM `Auto` WHERE Id = :id');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}
}
