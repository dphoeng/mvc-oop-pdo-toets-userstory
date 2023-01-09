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
		$instructeur = $this->mankementModel->getAutoByInstructeurId($id);

		$autoId = $instructeur->AutoId;

		$rows = '';
		if ($autoId) {
			$mankementen = $this->mankementModel->getMankementenByAutoId($autoId);

			foreach ($mankementen as $value) {
				$rows .= "<tr>
								<td>$value->Datum</td>
								<td>$value->Mankement</td>
						</tr>";
			}
		}


		// data die wordt doorgestuurd naar de view
		$data = [
			"title" => "Overzicht Mankementen",
			"naam" => $instructeur->Naam,
			"email" => $instructeur->Email,
			"kenteken" => $instructeur->Kenteken,
			"type" => $instructeur->Type,
			"rows" => $rows
		];
		$this->view("mankement/index", $data);
	}
}
