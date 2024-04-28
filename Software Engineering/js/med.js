let searchForm = document.querySelector('.search-form');
let shoppingCart = document.querySelector('.shopping-cart');
let uploadForm = document.querySelector('.upload-form');
const defaultBtn = document.querySelector('.default-btn');
const customBtn = document.querySelector('.custom-btn');
const fileName = document.querySelector('.file-name');
const cartIcon = document.getElementById('cart-btn');

let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_]+$/;

function active() {
    defaultBtn.click();
}

defaultBtn.addEventListener("change", function () {
    if (this.value) {
        let nameValue = this.value.match(regExp);
        fileName.textContent = nameValue;
    }
});

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    uploadForm.classList.remove('active');
}

document.querySelector('#cart-btn').onclick = () => {
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    uploadForm.classList.remove('active');
}

document.querySelector('#up-btn').onclick = () => {
    uploadForm.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
}

window.onscroll = () => {
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    uploadForm.classList.remove('active');
}

document.querySelectorAll('.my-button[title="b-title"]').forEach((button, index) => {
    button.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent the default behavior of the anchor tag
        addToCart(index);
    });
});

function addToCart(index) {
    const itemName = document.querySelectorAll('.type a')[index].innerText;
    const itemPrice = document.querySelectorAll('.price')[index].innerText;

    // Check if the item is already in the cart before adding it
    if (!isItemInCart(itemName)) {
        // Add the cart item to the cart container
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <p>${itemName}</p>
            <p>${itemPrice}</p>
            <button class="remove-item" onclick="removeFromCart(${index})">Remove</button>
        `;

        const cartContainer = document.getElementById('cart-container');
        cartContainer.appendChild(cartItem);

        // Add the cart item to the shopping cart section
        const shoppingCartContent = document.querySelector('.shopping-cart');
        const cartBox = document.createElement('div');
        cartBox.classList.add('box');
        cartBox.innerHTML = `
            <div class="content">
                <p>${itemName}</p>
                <p>${itemPrice}</p>
                <button class="remove-item" onclick="removeFromCart(${index})">Remove</button>
            </div>
        `;
        shoppingCartContent.appendChild(cartBox);
    }

    updateCartIcon();
}

function removeFromCart(index) {
    const cartItems = document.querySelectorAll('.cart-item');
    cartItems[index].remove();

    // Remove the corresponding item from the shopping cart section
    const shoppingCartContent = document.querySelector('.shopping-cart');
    const cartBoxes = document.querySelectorAll('.box');
    cartBoxes[index].remove();

    updateCartIcon();
}

function updateCartIcon() {
    const cartItemCount = document.querySelectorAll('.cart-item').length;
    document.getElementById('cart-btn').innerHTML = `<span class="badge">${cartItemCount}</span>`;
}

function isItemInCart(itemName) {
    // Check if the item is already in the cart
    const cartItems = document.querySelectorAll('.cart-item p:first-child');
    for (const item of cartItems) {
        if (item.innerText === itemName) {
            return true;
        }
    }
    return false;
}
