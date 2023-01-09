<?php

require(APPROOT . '/views/includes/header.php');
$data = $data ?? [];

?>

<body>
	<u>
		<h1><?= $data['title']; ?></h1>
	</u>
	<h3>Auto van de instructeur: <?= $data['naam']; ?></h3>
	<h3>E-mailadres: <?= $data['email']; ?></h3>
	<h3>Kenteken Auto: <?php if ($data['kenteken']) {
							echo $data['kenteken'] . "-" . $data['type'];
						} else {
							echo "Geen autos";
						} ?></h3>

	<table>
		<thead>
			<th>Datum</th>
			<th>Mankement</th>
		</thead>
		<tbody>
			<?= $data["rows"]; ?>
		</tbody>
	</table>
	<a href="<?= URLROOT; ?>/mankement/add/<?= $data["id"] ?>"><button>Mankement Toevoegen</button></a>
</body>

<?php

require(APPROOT . '/views/includes/footer.php');

?>