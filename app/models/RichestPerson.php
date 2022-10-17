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
		$this->db->query('SELECT * FROM RichestPeople ORDER BY Networth DESC');
		return $this->db->resultSet();
	}

	public function getSinglePerson($id)
	{
		$this->db->query("SELECT * FROM RichestPeople WHERE Id = :id");
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	public function deleteRichestPerson($id)
	{
		$this->db->query("DELETE FROM `RichestPeople` WHERE Id = :id");
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->execute();
	}
}
