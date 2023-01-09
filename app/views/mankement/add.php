<?php

require(APPROOT . '/views/includes/header.php');

$data = $data ?? [];

?>

<body>
	<h1><?= $data['title']; ?></h1>
	<hr>
	<h2>[<?= $data['type']; ?>][<?= $data['kenteken']; ?>]</h2>
	<form action="<?= URLROOT; ?>/mankement/add/<?= $data["id"] ?>" method="post">
		<div class="error"><?= $data['error']; ?></div>
		<div class="row">
			<div class="column">
				<label for="mankement">Mankement</label>
			</div>
			<div class="column">
				<input type="text" name="mankement" id="mankement" placeholder="">
				<input type="submit" name="submit" id="submit" value="Voer In">
			</div>
		</div>
	</form>
</body>

<?php

require(APPROOT . '/views/includes/footer.php');

?>