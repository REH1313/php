<?php
function priceCalc($format, $quantity) {
    $basePrices = [
        'CD' => 12.00,
        'Vinyl' => 20.00,
        'Digital' => 8.00
    ];
    $price = $basePrices[$format] ?? 0;
    $subtotal = $price * $quantity;

    if ($quantity >= 10) {
        $subtotal *= 0.75; // 25% off
    } elseif ($quantity >= 5) {
        $subtotal *= 0.90; // 10% off
    }
    return $subtotal;
}

function getAlbumList() {
    return [
        'Aurora Vale'      => 'Ethereal Bloom',
        'Solstice Drift'   => 'Mystic Echoes',
        'Lunar Thread'     => 'Botanica Beats',
        'Velvet Horizon'   => 'Velvet Horizon',
        'Thistle & Thorn'  => 'Petal Pulse',
        'Echo Fern'        => 'Verdant Reverb',
        'Sable Root'       => 'Shadow Bloom',
        'Iris Veil'        => 'Twilight Petals',
        'Cedar Loom'       => 'Forest Frequencies',
        'Opal Drift'       => 'Crystal Chimes',
        'Marrow Bloom'     => 'Botanica Requiem'
    ];
?>
