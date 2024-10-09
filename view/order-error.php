<?php require_once 'parts/header.php';?>
	
	<main>
		<p>Il y a eu une erreur : <?php echo $e->getMessage(); ?></p>

        <?php var_dump($_SESSION['order']) ?>

	</main>

<?php require_once 'parts/footer.php'; ?>