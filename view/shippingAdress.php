<?php require_once 'parts/header.php' ?>

<main>
    <form method="POST" action="add-shipping-adress.php">

    <label for="ShippingCountry">Pays de livraison</label>
			<input type="text" id="ShippingCountry" name="ShippingCountry" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="Le pays doit contenir entre 5 et 50 caractères et des espaces.">

            <br>
    <label for="ShippingCity">Ville de livraison</label>
            <input type="text" id="ShippingCity" name="ShippingCity" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="La Ville doit contenir entre 5 et 50 caractères.">

            <br>
    <label for="ShippingAdress">Adresse de livraison</label>
            <input type="text" id="ShippingAdress" name="ShippingAdress" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="L'adresse doit contenir entre 5 et 50 caractères et des espaces.">
			

			<button type="submit">Ajouter</button>


    </form>
</main>

<?php require_once 'parts/footer.php'; ?>
