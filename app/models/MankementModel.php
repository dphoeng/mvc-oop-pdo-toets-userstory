<?php


class MankementModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getMankementen()
	{
		$this->db->query('SELECT * FROM `Auto`');
		return $this->db->resultSet();
	}

	public function getLatestKilometerstandById($id)
	{
		$this->db->query('SELECT * FROM `Kilometerstand` WHERE Id = :id ORDER BY KmStand DESC LIMIT 1');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	public function getWagenById($id)
	{
		$this->db->query('SELECT aut.Type as Type, aut.Kenteken as Kenteken, kms.KmStand as KmStand FROM `Auto` aut INNER JOIN `Kilometerstand` kms ON aut.Id = kms.AutoId WHERE aut.Id = :id ORDER BY kms.KmStand DESC LIMIT 1');
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		return $this->db->single();
	}

	public function createKilometerStand($post, $id)
	{
		$this->db->query("INSERT INTO `Kilometerstand` (Id, AutoId, Datum, KmStand) VALUES (:Id, :AutoId, :Datum, :KmStand)");
		$this->db->bind(":Id", NULL, PDO::PARAM_INT);
		$this->db->bind(":AutoId", $id, PDO::PARAM_INT);
		$this->db->bind(":Datum", date("Y-m-d"), PDO::PARAM_STR);
		$this->db->bind(":KmStand", $post["kilometerstand"], PDO::PARAM_INT);
		return $this->db->execute();
	}
}
