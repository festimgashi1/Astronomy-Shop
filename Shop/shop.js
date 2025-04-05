const products = [
    { id: 1, name: "Saturn V Rocket Model", price: 49.99, category: "models", image: "https://m.media-amazon.com/images/I/51oFsllG9PL._AC_UF894,1000_QL80_.jpg" },
    { id: 2, name: "An Earthling's Guide to Outer Space", price: 29.99, category: "books", image: "https://m.media-amazon.com/images/I/61A0SFW0HML._AC_UF1000,1000_QL80_.jpg" },
    { id: 3, name: "This New Ocean", price: 33.99, category: "books", image: "https://images.squarespace-cdn.com/content/v1/53713324e4b0ca92e9273ccf/1495378865832-ELRNYVSE6FB8LA30W2AG/image-asset.jpeg?format=1500w"},
    { id: 4, name: "Small & Mighty Book Of Space", price: 27.99, category: "books", image: "https://sites.create-cdn.net/siteimages/23/4/3/234344/20/5/3/20532069/815x1000.jpg?1684499069" },
    { id: 5, name: "Space Atlas: Mapping the Universe and Beyond (Second Edition)", price: 22.99, category: "books", image: "https://bookoutlet.ca/_next/image?url=https%3A%2F%2Fimages.bookoutlet.com%2Fcovers%2Flarge%2Fisbn978142%2F9781426219696-l.jpg&w=640&q=75" },
    { id: 6, name: "A City On Mars", price: 32.99, category: "books", image: "https://m.media-amazon.com/images/I/51HxRfk5DqL._SL500_.jpg" },
    { id: 7, name: "SpaceX IVA Suit Figure", price: 299.99, category: "models", image: "https://shop.spacex.com/cdn/shop/files/SPACEX_STARFIGURE_FRONT_QUARTER_RIGHT_800x.png?v=1724454097" },
    { id: 8, name: "Starship Chrome Model", price: 174.99, category: "models", image: "https://shop.spacex.com/cdn/shop/products/Unknown-1_800x.png?v=1681580111" },
    { id: 9, name: "Omegon Telescope AC 70/700 az-2", price: 99.99, category: "models", image: "https://eu.levenhuk.com/upload/iblock/af3/zu8v9mg40fj5cx7rgi6zcnf23uzissqf/73079_omegon-telescope-ac-70-700-az-2_00.jpg" },
    { id: 10, name: "Telescope N 114/900 EQ-1", price: 239.99, category: "models", image: "https://www.astroshop.eu/Produktbilder/zoom/11266_1/Omegon-Telescope-N-114-900-EQ-1.jpg" },
    { id: 11, name: "Telescope N 150/750 EQ-3", price: 279.99, category: "models", image: "https://www.astroshop.eu/Produktbilder/zoom/13764_1/Omegon-Telescope-N-150-750-EQ-3.jpg" },
    { id: 12, name: "Omegon 2.1x42 Wide-Field Binoculars", price: 179.50, category: "models", image: "https://www.astroart-store.com/tuotekuvat/800x800/Omegon_OM2x42.jpg" },
    { id: 13, name: "Phone Holder for Telescopes", price: 79.99, category: "models", image: "https://www.astroart-store.com/tuotekuvat/800x800/BTC_puhelin.jpg"},
    { id: 14, name: "Skywatcher StarQuest 90MC Telescope", price: 374.99, category: "models", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRf6o5-O6inEwD01Jyi8xWT__snOukkKKn5uA&s" },
    { id: 15, name: "Unisex Starship Flight 6 T-Shirt", price: 49.99, category: "clothing", image: "https://shop.spacex.com/cdn/shop/files/SpaceX_Starship_Flight_6_Tshirt_Back_Black_900x.png?v=1731359541" },
    { id: 16, name: "Starship Flight 5 Mission Patch", price: 19.99, category: "clothing", image: "https://shop.spacex.com/cdn/shop/files/SpaceX_Starship_Flight_5_Patch_800x.png?v=1728506804" },
    { id: 17, name: "Polaris Dawn Mission Patch", price: 19.99, category: "clothing", image: "https://shop.spacex.com/cdn/shop/files/Polaris_Dawn_Mission_Patch_a3182692-c1de-4064-859a-e6da83fc56c5_800x.png?v=1724350551" },
    { id: 18, name: "Exploring the World of Astronomy", price: 14.99, category: "books", image: "https://cdn.masterbooks.com/media/opti_image/webp/catalog/product/cache/2a8afc18da75136c892e5175679a2ab5/e/x/exploring-astronomy-cover-lr_1.webp" },
    { id: 19, name: "Fundamentals of Astronomy", price: 64.99, category: "books", image: "https://images.routledge.com/common/jackets/amazon/978036725/9780367253202.jpg" },
    { id: 20, name: "The Story of Astronomy", price: 29.99, category: "books", image: "https://www.quercusbooks.co.uk/wp-content/uploads/2019/01/hbg-title-9781849169455-12.jpg?resize=471,720" },
    { id: 21, name: "Solar System Planetarium", price: 59.99, category: "models", image: "https://m.media-amazon.com/images/I/81OXH1JBQpS._AC_SX679_.jpg"},
    { id: 22, name: "3D Crystal Ball Solar System Model", price: 89.99, category: "models", image: "https://m.media-amazon.com/images/I/81qEOpulRFL._AC_SX679_.jpg" },
    { id: 23, name: "Nasa Cap", price: 34.99, category: "clothing", image: "https://www.shopnasa.com/cdn/shop/products/7c313713-4cb8-4b63-8463-b2c17f1a7d64_800x.png?v=1643756246" },
    { id: 24, name: "Flight Suit", price: 88.99, category: "clothing", image: "https://www.shopnasa.com/cdn/shop/products/flight_suit_white_1000psi_800x.jpg?v=1582660811" },
    { id: 25, name: "Moonshot", price: 49.99, category: "books", image: "https://www.shopnasa.com/cdn/shop/files/MoonshotBook_800x.png?v=1701808983" },
    { id: 26, name: "Observer's Handbook", price: 29.99, category: "books", image: "https://thespacestore.com/cdn/shop/files/89168.jpg?v=1724342987" },
    { id: 27, name: "Mercury Globe", price: 99.99, category: "models", image: "https://thespacestore.com/cdn/shop/files/mercuryglobe.png?v=1719340528" },
    { id: 28, name: "Venus Globe", price: 99.99, category: "models", image: "https://s.turbifycdn.com/aah/yhst-18011380714966/astronomy-magazine-io-globe-by-replogle-globes-33.gif" },
    { id: 29, name: "Neptun Globe", price: 99.99, category: "models", image: "https://columbus-globus-shop.de/media/image/bd/4a/d3/8N4081-WebOmeQ9JcmOELGo_600x600.jpg" },
    { id: 30, name: "Earth Globe", price: 49.99, category: "models", image: "https://m.media-amazon.com/images/I/91lGuDQMu7L._AC_UF1000,1000_QL80_.jpg" },
    { id: 31, name: "Moon Globe", price: 49.99, category: "models", image: "https://thespacestore.com/cdn/shop/files/moon6inch.png?v=1719341559" },
    { id: 32, name: "Mars Globe", price: 99.99, category: "models", image: "https://thespacestore.com/cdn/shop/files/mars6inch.png?v=1719346711" },
    { id: 33, name: "Saturn Globe", price: 119.99, category: "models", image: "https://img.freepik.com/premium-photo/immersive-3d-model-stunningly-realistic-oval-earth-globe-with-saturn-rings-white-background_983420-9630.jpg" },
    { id: 34, name: "Uranus Globe", price: 99.99, category: "models", image: "https://columbus-globus-shop.de/media/image/81/96/91/8U4081-alternativ-WebQjiaZoMFREChg_600x600@2x.jpg" },
    { id: 35, name: "Jupiter Globe", price: 99.99, category: "models", image: "https://thespacestore.com/cdn/shop/files/jupiter6inch.png?v=1719341727" },
];
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
                <p class="product-price">$${product.price.toFixed(2)}</p>
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

renderProducts();