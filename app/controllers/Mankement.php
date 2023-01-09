<?php

class Mankement extends Controller
{
	private $mankementModel;

	public function __construct()
	{
		$this->mankementModel = $this->model('MankementModel');
	}

	public function index($id = null)
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

		if (!$wagen) {
			header("Location: " . URLROOT . "/mankement/index/");
		}

		$data = [
			"id" => $id,
			"title" => "Invoeren Mankement",
			"error" => "",
			"type" => $wagen->Type,
			"kenteken" => $wagen->Kenteken,
		];


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			try {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

				$data = [
					"id" => $id,
					"title" => "Invoeren Mankement",
					"error" => "",
					"mankement" => $_POST['mankement'],
					"type" => $wagen->Type,
					"kenteken" => $wagen->Kenteken,
				];

				$data = $this->validateAdd($data);

				if (empty($data['error'])) {
					$result = $this->mankementModel->createKilometerstand($_POST, $id);
					if ($result)
						$data['error'] = "Het nieuwe mankement is succesvol toegevoegd";
					else
						$data['error'] = "Het nieuwe mankement is niet succesvol toegevoegd";
					header("Refresh:3; url=" . URLROOT . "/mankement/index");
				} else {
					header("Refresh:3; url=" . URLROOT . "/mankement/index/");
				}
			} catch (PDOException $e) {
				// echo $e;
				$data['error'] = "Het nieuwe mankement is niet succesvol toegevoegd";
				header("Refresh:3; url=" . URLROOT . "/mankement/index/");
			}
		}

		$this->view("mankement/add", $data);
	}

	private function validateAdd($data)
	{
		if (strlen($data['mankement']) > 50) {
			$data['error'] = "Het nieuwe mankement is meer dan 50 tekens lang en is niet toegoevoegd, probeer het opnieuw";
		}
		return $data;
	}
}
