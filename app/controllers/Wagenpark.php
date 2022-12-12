<?php

class WagenPark extends Controller
{
	private $wagenParkModel;

	public function __construct()
	{
		$this->wagenParkModel = $this->model('WagenParkModel');
	}

	public function index()
	{
		// haalt de gegevens uit de database via the model
		$record = $this->wagenParkModel->getWagenPark();

		$rows = '';
		foreach ($record as $value) {
			$rows .= "<tr>
							<td>$value->Type</td>
							<td>$value->Kenteken</td>
							<td><a href='" . URLROOT . "/wagenpark/add/$value->Id'>+</a></td>
					</tr>";
		}

		// data die wordt doorgestuurd naar de view
		$data = [
			"title" => "Overzicht Wagenpark",
			"rows" => $rows
		];
		$this->view("wagenpark/index", $data);
	}

	public function add($id = null)
	{
		$data = [
			"id" => $id,
			"title" => "Invoeren Kilometerstand",
			"error" => ""
		];

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			try {

				$data = [
					"id" => $id,
					"title" => "Invoeren Kilometerstand",
					"error" => "",
					"kilometerstand" => $_POST['kilometerstand']
				];

				$data = $this->validateAdd($data);

				if (empty($data['topicError'])) {
					$result = $this->lesModel->createKilometerstand($_POST, $id);
					if ($result)
						echo "De nieuwe kilometerstand is succesvol toegevoegd";
					else
						echo "De nieuwe kilometerstand is niet succesvol toegevoegd";
					header("Refresh:3; url=" . URLROOT . "/wagenpark/index");
				} else {
					header("Refresh:3; url=" . URLROOT . "/wagenpark/index/");
				}
			} catch (PDOException $e) {
				echo "De nieuwe kilometerstand is niet toegevoegd, probeer het opnieuw";
				header("Refresh:3; url=" . URLROOT . "/wagenpark/index/");
			}
		}

		$this->view("wagenpark/add", $data);
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
