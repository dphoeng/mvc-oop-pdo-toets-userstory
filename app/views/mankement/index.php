<?php

require(APPROOT . '/views/includes/header.php');
$data = $data ?? [];

?>

<body>
	<h1><?= $data['title']; ?></h1>
	<br>
	<h2>Auto van de instructeur: <?= $data['naam']; ?></h2>
	<h2>E-mailadres: <?= $data['email']; ?></h2>
	<h2>Kenteken Auto: <?php if ($data['kenteken']) {
							echo $data['kenteken'] . "-" . $data['type'];
						}  ?></h2>

	<table>
		<thead>
			<th>Datum</th>
			<th>Mankement</th>
		</thead>
		<tbody>
			<?= $data["rows"]; ?>
		</tbody>
	</table>
</body>

<?php

require(APPROOT . '/views/includes/footer.php');

?>