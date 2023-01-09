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
			"rows" => $rows,
			"id" => $autoId
		];
		$this->view("mankement/index", $data);
	}

	public function add($id = null)
	{
		$wagen = $this->mankementModel->getAutoById($id);

		$data = [
			"id" => $id,
			"title" => "Invoeren Mankement",
			"error" => "",
			"type" => $wagen->Type,
			"kenteken" => $wagen->Kenteken,
		];


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			try {

				$data = [
					"id" => $id,
					"title" => "Invoeren Kilometerstand",
					"error" => "",
					"kilometerstand" => $_POST['kilometerstand'],
					"type" => $wagen->Type,
					"kenteken" => $wagen->Kenteken,
					"max" => $wagen->KmStand
				];

				$data = $this->validateAdd($data);

				if (empty($data['error'])) {
					$result = $this->wagenParkModel->createKilometerstand($_POST, $id);
					if ($result)
						$data['error'] = "De nieuwe kilometerstand is succesvol toegevoegd";
					else
						$data['error'] = "De nieuwe kilometerstand is niet succesvol toegevoegd";
					header("Refresh:3; url=" . URLROOT . "/wagenpark/index");
				} else {
					header("Refresh:3; url=" . URLROOT . "/wagenpark/index/");
				}
			} catch (PDOException $e) {
				// echo $e;
				$data['error'] = "De nieuwe kilometerstand is niet toegevoegd, probeer het opnieuw";
				header("Refresh:3; url=" . URLROOT . "/wagenpark/index/");
			}
		}

		$this->view("mankement/add", $data);
	}

	private function validateAdd($data)
	{
		$result = $this->wagenParkModel->getLatestKilometerstandById($data['id']);

		if ($result->KmStand > $data['kilometerstand']) {
			$data['error'] = "De nieuwe kilometerstand is niet toegevoegd, probeer het opnieuw";
		}
		return $data;
	}
}
