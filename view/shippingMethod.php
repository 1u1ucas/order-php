<?php require_once 'parts/header.php'; ?>

<main>
    <h1>Choix du mode de livraison</h1>
    <form action="../controller/add-shipping-method.php" method="post">
        <label for="shippingMethod">Choisissez un mode de livraison</label>
        <select name="shippingMethod" id="shippingMethod" required size="3" onchange="validateSelection()">
            <option value="Chronopost Express">Chronopost Express</option>
            <option value="Point relais">Point relais</option>
            <option value="Domicile">Domicile</option>
        </select>
        <button type="submit">Valider</button>
    </form>
</main>

<script>
function validateSelection() {
    const select = document.getElementById('shippingMethod');
    const selectedOptions = Array.from(select.selectedOptions);
    if (selectedOptions.length !== 1) {
        select.setCustomValidity('Vous devez sélectionner un mode de livraison.');
    } else {
        select.setCustomValidity('');
    }
}

document.querySelector('form').addEventListener('submit', function(event) {
    validateSelection();
    if (!this.checkValidity()) {
        event.preventDefault();
    }
});
</script>

<?php require_once 'parts/footer.php'; ?>