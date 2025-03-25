<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Rule Engine</title>
</head>
<body>
    <h2>Test du moteur de règles</h2>

    <p><strong>Produit :</strong> Stock = {{ $product['stock'] }}, Prix = {{ $product['prix'] }}€</p>
    <p><strong>Règle appliquée :</strong> {{ $rule }}</p>
    <p><strong>Résultat :</strong> {{ $result ? '✅ Valide' : '❌ Non valide' }}</p>
</body>
</html>