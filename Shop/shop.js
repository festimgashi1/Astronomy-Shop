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
    if (!window.isLoggedIn) {
        alert("You need to be logged in to add items to the cart.");
        return;
    }

    const productId = parseInt(event.target.getAttribute('data-id'));
    const product = products.find(p => p.id === productId);

    if (!product) {
        console.error("Product not found:", productId);
        return;
    }

    let cartItems = JSON.parse(localStorage.getItem("cartItems") || "[]");
    const existingItem = cartItems.find(item => item.id === productId);

    if (existingItem) {
        existingItem.qty += 1;
    } else {
        cartItems.push({
            id: product.id,
            name: product.name,
            price: parseFloat(product.price),
            qty: 1
        });
    }

    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    renderCart();
    openCart();
}

function renderCart() {
    const cartItems = JSON.parse(localStorage.getItem("cartItems") || "[]");
    const cartContainer = document.getElementById("cart-items");
    cartContainer.innerHTML = "";

    let total = 0;

    cartItems.forEach(item => {
        const itemDiv = document.createElement("div");
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
            <div class="cart-item-info">
                <span>${item.name} x${item.qty}</span>
                <span>$${(item.price * item.qty).toFixed(2)}</span>
            </div>
        `;
        cartContainer.appendChild(itemDiv);
        total += item.price * item.qty;
    });

    document.getElementById("cart-total").textContent = `Total: $${total.toFixed(2)}`;
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


document.addEventListener("DOMContentLoaded", () => {
    renderCart();

    const openButton = document.getElementById("checkout-btn");
    const popup = document.getElementById("popup");
    const closeButton = document.getElementById("closeButton");

    if (openButton) {
    openButton.addEventListener("click", () => {
        if (!window.isLoggedIn) {
            alert("⚠️ You must log in to proceed to checkout.");
            return;
        }
        popup.style.display = "block";
    });
}


    if (closeButton) {
        closeButton.addEventListener("click", () => {
            popup.style.display = "none";
        });
    }

    window.addEventListener("click", (event) => {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
});
