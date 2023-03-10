<?php

require(APPROOT . '/views/includes/header.php');

$data = $data ?? [];

?>

<body>
	<h1><?= $data['title']; ?></h1>
	<hr>
	<h2>[<?= $data['type']; ?>][<?= $data['kenteken']; ?>]</h2>
	<form action="<?= URLROOT; ?>/wagenpark/add/<?= $data["id"] ?>" method="post">
		<div class="error"><?= $data['error']; ?></div>
		<div class="row">
			<div class="column">
				<label for="kilometerstand">Kilometerstand</label>
			</div>
			<div class="column">
				<input type="number" name="kilometerstand" id="kilometerstand" placeholder="[max (<?= $data["max"]; ?>)]">
				<input type="submit" name="submit" id="submit" value="Voer In">
			</div>
		</div>
	</form>
</body>

<?php

require(APPROOT . '/views/includes/footer.php');

?>