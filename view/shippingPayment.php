<?php require_once 'parts/header.php'; ?> 

<main>
    <h1>paiement</h1>
    <form action="controller/add-payment-method.php" method="post">
        <label for="paymentMethod">Choisissez un mode de paiement</label>
        <select name="paymentMethod" id="paymentMethod" required size="3" onchange="validateSelection()">
            <option value="Carte bancaire">Carte bancaire</option>
            <option value="Paypal">Paypal</option>
        </select>

        <br>
        <div id="paypalField" style="display: none;">
            <label for="paypalAccount">Compte PayPal</label>
            <input type="text" id="paypalAccount" name="paypalAccount" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Veuillez entrer une adresse email valide pour PayPal.">
        </div>

        <div id="cardField" style="display: none;">
            <label for="cardNumber">Numéro de carte bancaire</label>
            <input type="text" id="cardNumber" name="cardNumber" pattern="^\d{16}$" title="Veuillez entrer un numéro de carte bancaire valide (16 chiffres).">
        </div>

        <button type="submit">Valider</button>
    </form>
</main>

<script>
function validateSelection() {
    const select = document.getElementById('paymentMethod');
    const selectedOptions = Array.from(select.selectedOptions);
    const paypalField = document.getElementById('paypalField');
    const cardField = document.getElementById('cardField');

    if (selectedOptions.length !== 1) {
        select.setCustomValidity('Vous devez sélectionner un mode de paiement.');
    } else {
        select.setCustomValidity('');
    }

    if (selectedOptions[0].value === 'Paypal') {
        paypalField.style.display = 'block';
        cardField.style.display = 'none';
    } else if (selectedOptions[0].value === 'Carte bancaire') {
        paypalField.style.display = 'none';
        cardField.style.display = 'block';
    } else {
        paypalField.style.display = 'none';
        cardField.style.display = 'none';
    }
}

document.querySelector('form').addEventListener('submit', function(event) {
    validateSelection();
    if (!this.checkValidity()) {
        event.preventDefault();
    }
});
</script>