<?php 
defined('CONTROL') or die('Acesso inválido');

$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if (!$country) {
    header('Location: ?route=home');
    die();
}

// Get country data
$country_data = $api->get_country($country);
?>

<div class="container">
    <img src="<?= $country_data[0]['flags']['png'] ?>" class="img-fluid" alt="Flag of <?= $country_data[0]['name']['common'] ?>" />
    
    <div class="card-body">
        <h2 class="card-title"><strong><?= $country_data[0]['name']['common'] ?></strong></h2>
        <p class="card-text"><strong>Capital:</strong> <?= $country_data[0]['capital'][0] ?></p>
        <p class="card-text"><strong>Região:</strong> <?= $country_data[0]['region'] ?></p>
        <p class="card-text"><strong>Sub-região:</strong> <?= $country_data[0]['subregion'] ?></p>
        <p class="card-text"><strong>População:</strong> <?= number_format($country_data[0]['population']) ?> habitantes</p>
        <p class="card-text"><strong>Área:</strong> <?= number_format($country_data[0]['area']) ?> km<sup>2</sup></p>
            <a href="?route=home" class="btn">Voltar</a>
    </div>
</div>
