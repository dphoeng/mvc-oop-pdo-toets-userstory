<?php

require(APPROOT . '/views/includes/header.php');
$data = $data ?? [];

?>

<body>
	<h1><?= $data['title']; ?></h1>
	<table>
		<thead>
			<th>Type</th>
			<th>Kenteken</th>
			<th>KmStand Toevoegen</th>
		</thead>
		<tbody>
			<?= $data["rows"]; ?>
		</tbody>
	</table>
</body>

<?php

require(APPROOT . '/views/includes/footer.php');

?>