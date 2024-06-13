let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productId) {
    cart.push(productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    document.getElementById('cart-count').innerText = cart.length;
    alert('Товар додано до кошика!');
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('cart-count').innerText = cart.length;
});
