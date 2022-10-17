<?php


class RichestPerson
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getRichestPeople()
	{
		$this->db->query('SELECT * FROM RichestPeople');
		return $this->db->resultSet();
	}

	public function getSingleCountry($id)
	{
		$this->db->query("SELECT * FROM RichestPeople WHERE Id = :id");
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	public function deleteCountry($id)
	{
		$this->db->query("DELETE FROM `RichestPeople` WHERE Id = :id");
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->execute();
	}
}
