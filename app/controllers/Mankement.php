<?php

class Mankement extends Controller
{
	private $mankementModel;

	public function __construct()
	{
		$this->mankementModel = $this->model('MankementModel');
	}

	public function index()
	{
		// haalt de gegevens uit de database via the model
		$record = $this->mankementModel->getMankementen();

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
			"rows" => $rows
		];
		$this->view("mankement/index", $data);
	}
}
