<?php

class Mankement extends Controller
{
	private $mankementModel;

	public function __construct()
	{
		$this->mankementModel = $this->model('MankementModel');
	}

	public function index($id = 1)
	{
		// haalt de gegevens uit de database via the model
		$record = $this->mankementModel->getAutoByInstructeurId($id);

		$naam = $record->Naam;
		$email = $record->Email;
		$autoId = $record->AutoId;
		$kenteken = $record->Kenteken;

		var_dump($record);
		exit;

		$rows = '';
		foreach ($record as $value) {
			$rows .= "<tr>
							<td>$value->Type</td>
							<td>$value->Kenteken</td>
							<td class='add'><a href='" . URLROOT . "/mankement/add/$value->Id'><img src='" . URLROOT . "/img/cross.png' alt='+'></a></td>
					</tr>";
		}

		// data die wordt doorgestuurd naar de view
		$data = [
			"title" => "Overzicht Mankementen",
			// "naam" = > $record,
			"rows" => $rows
		];
		$this->view("mankement/index", $data);
	}
}
