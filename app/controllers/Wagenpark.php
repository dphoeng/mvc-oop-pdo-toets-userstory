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
		$this->view("wagenpark/add", $data);
	}
}
