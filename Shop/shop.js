let products = [];

fetch('get_products.php')
    .then(response => response.json())
    .then(data => {
        products = data;
        renderProducts();
    })
    .catch(error => console.error("Gabim në ngarkimin e produkteve:", error));

let cart = [];

function renderProducts(category = 'all') {
    const productGrid = document.getElementById('product-grid');
    productGrid.innerHTML = '';
    const filteredProducts = category === 'all' ? products : products.filter(p => p.category === category);    

    filteredProducts.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}" class="product-image">
            <div class="product-info">
                <h3 class="product-name">${product.name}</h3>
                <p class="product-price">$${parseFloat(product.price).toFixed(2)}</p>
                <button class="add-to-cart-btn" data-id="${product.id}">Add to Cart</button>
            </div>
        `;
        productGrid.appendChild(productCard);
    });
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', addToCart);
    });
}

function renderCart() {
    const cartItems = document.getElementById('cart-items');
    cartItems.innerHTML = '';

    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <div class="cart-item-info">
                <span>${item.name} x${item.quantity}</span>
                <span>$${(item.price * item.quantity).toFixed(2)}</span>
            </div>
            <button class="remove-from-cart-btn" data-id="${item.id}" aria-label="Remove one ${item.name}">X</button>
        `;
        cartItems.appendChild(cartItem);
    });

    document.querySelectorAll('.remove-from-cart-btn').forEach(button => {
        button.addEventListener('click', removeFromCart);
    });
 
    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    document.getElementById('cart-total').textContent = `Total: $${total.toFixed(2)}`;
}

function openCart() {
    document.getElementById('cart').classList.add('open');
    document.body.classList.add('cart-open');
}

function closeCart() {
    document.getElementById('cart').classList.remove('open');
    document.body.classList.remove('cart-open');
}

document.querySelectorAll('.category-btn').forEach(button => {
    button.addEventListener('click', (event) => {
        document.querySelector('.category-btn.active').classList.remove('active');
        event.target.classList.add('active');
        renderProducts(event.target.getAttribute('data-category'));
    });
});

function addToCart(event) {
    const productId = parseInt(event.target.getAttribute('data-id'));
    const product = products.find(p => p.id === productId);
    
    const existingItem = cart.find(item => item.id === productId);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    renderCart();
    openCart();
}

function removeFromCart(event) {
    const productId = parseInt(event.target.getAttribute('data-id'));
    const itemIndex = cart.findIndex(item => item.id === productId);
    if (itemIndex !== -1) {
        if (cart[itemIndex].quantity > 1) {
            cart[itemIndex].quantity -= 1;
        } else {
            cart.splice(itemIndex, 1);
        }
    }
    renderCart();
}

document.getElementById('cart-btn').addEventListener('click', openCart);
document.getElementById('close-cart').addEventListener('click', closeCart);
