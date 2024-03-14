<?


function updateCartTotal()
{
    global $cart;

    // Calcular el total del carrito
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Mostrar el total del carrito en el DOM
    echo '<div class="total-pagar">' . number_format($total, 2) . '</div>';
}
