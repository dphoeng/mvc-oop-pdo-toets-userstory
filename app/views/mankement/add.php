<?php

require(APPROOT . '/views/includes/header.php');

$data = $data ?? [];

?>

<body>
	<u>
		<h1><?= $data['title']; ?></h1>
	</u>
	<h2>[<?= $data['type']; ?>][<?= $data['kenteken']; ?>]</h2>
	<form action="<?= URLROOT; ?>/mankement/add/<?= $data["id"] ?>" method="post">
		<div class="error"><?= $data['error']; ?></div>
		<div class="row">
			<div class="column">
				<label for="mankement">Mankement</label>
			</div>
			<div class="column">
				<textarea name="mankement" id="mankement" placeholder="" rows="7" cols="40"></textarea>
				<input type="submit" name="submit" id="submit" value="Voer In">
			</div>
		</div>
	</form>
</body>

<?php

require(APPROOT . '/views/includes/footer.php');

?>