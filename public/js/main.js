function updateImages() {
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    document.querySelectorAll(".swiper-slide img").forEach((img) => {
        if (img.dataset.mobile && img.dataset.desktop) {
            img.src = isMobile ? img.dataset.mobile : img.dataset.desktop;
        }
    });
}

document.addEventListener("DOMContentLoaded", updateImages);
let resizeTimer;
window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(updateImages, 200);
});
window.matchMedia("(max-width: 768px)").addEventListener("change", updateImages);

document.addEventListener("DOMContentLoaded", function () {
    new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
    new Swiper(".working-machines-swiper", {
        slidesPerView: 5,
        spaceBetween: 20,
        slidesPerGroup: 1,
        breakpoints: {
            320: { slidesPerView: 2, spaceBetween: 10 },
            1024: { slidesPerView: 5, spaceBetween: 20 },
        },
    });
    new Swiper(".banner-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            }
        }
    });
    new Swiper(".review-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 5,
            }
        }
    });


    new Swiper(".swiper-container", {
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        breakpoints: {
            768: {
                slidesPerView: 4,
            }
        }
    });

});
document.querySelectorAll('.product-thumbnail').forEach(thumbnail => {
    thumbnail.addEventListener('click', function () {
        const index = this.getAttribute('data-index');
        const mainImage = document.getElementById('main-image');
        mainImage.src = `/product/images/${this.src.split('/').pop()}`;

        document.querySelectorAll('.product-thumbnail').forEach(thumbnail => {
            thumbnail.classList.remove('active');
        });

        this.classList.add('active');
    });
});

// CART

let cartCount = 0;

function updateCartCount() {
    let cart = getCart();
    cartCount = cart.reduce((sum, item) => sum + item.quantity, 0);

    let cartCounterElement = document.getElementById("cart-counter");
    if (cartCounterElement) {
        cartCounterElement.textContent = cartCount;
        cartCounterElement.style.display = cartCount > 0 ? "block" : "none";
    }

    let cartNumBackElement = document.querySelector(".cart-num-back");
    if (cartNumBackElement) {
        cartNumBackElement.style.display = cartCount > 0 ? "block" : "none";
    }
}

function showAutoAlert(message) {
    const alertDiv = document.getElementById('custom-alert');
    alertDiv.textContent = message;
    alertDiv.style.display = 'block';
    alertDiv.style.opacity = '0.9';

    setTimeout(() => {
        alertDiv.style.opacity = '0';
        setTimeout(() => {
            alertDiv.style.display = 'none';
        }, 500);
    }, 2000);
}

document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();
    document.querySelectorAll(".cart-btn").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            let productId = parseInt(this.dataset.id);
            let productName = this.dataset.name;
            let productPrice = parseFloat(this.dataset.price);
            let productImage = this.dataset.image;
            showAutoAlert("Товар добавлен в корзину");
            addToCart(productId, productName, productPrice, productImage);
        });
    });

    renderCart();
});

function getCart() {
    return JSON.parse(localStorage.getItem("cart")) || [];
}

function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(id, name, price, image) {
    let cart = getCart();
    let existingItem = cart.find(item => item.id === id);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ id, name, price, image, quantity: 1 });
    }

    saveCart(cart);
    updateCartCount();

    renderCart();
}

function renderCart() {
    let cart = getCart();
    let cartTable = document.getElementById("cart-items");
    let totalContainer = document.getElementById("cart-total");

    if (!cartTable || !totalContainer) return;

    cartTable.innerHTML = "";
    let totalAmount = 0;
    if (cart.length === 0) {
        cartTable.innerHTML = `<tr><td colspan="4">Корзина пуста</td></tr>`;
        totalContainer.innerHTML = "Итого: 0 ₸";
        return;
    }

    cart.forEach(item => {
        let itemPrice = parseFloat(item.price) || 0;
        let itemTotalPrice = itemPrice * (parseInt(item.quantity) || 1);
        totalAmount += itemTotalPrice;

        let row = document.createElement("tr");
        row.innerHTML = `
            <td>
                <img class="cart-item__img" src="/product/${item.image}" alt="${item.name}">
                <div class="title-cart-name">${item.name}</div>
            </td>
            <td>${itemTotalPrice.toLocaleString()} ₸</td> 
            <td>
                <div class="quantity-wrapper">
                    <button class="btn-decrease" data-id="${item.id}">
                        <i class="fas fa-minus"></i>
                    </button>
                    <span class="quantity">${item.quantity}</span>
                    <button class="btn-increase" data-id="${item.id}">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="btn-remove" data-id="${item.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        `;
        cartTable.appendChild(row);
    });
    let discount = totalAmount >= 20000 ? totalAmount * 0.2 : 0;
    let finalAmount = totalAmount - discount;
    totalContainer.innerHTML = `
        <p>Сумма: <span>${totalAmount.toLocaleString()} ₸</span></p>
        ${discount > 0 ? `<p class="discount-text">Скидка 20%: <span>-${discount.toLocaleString()} ₸</span></p>` : ""}
        <p class="final-total">Итого: <span>${finalAmount.toLocaleString()} ₸</span></p>
    `;
    attachEventListeners();
}



function removeFromCart(id) {
    let cart = getCart().filter(item => item.id !== id);
    saveCart(cart);
    updateCartCount();

    renderCart();
}

function updateQuantity(id, change) {
    let cart = getCart().map(item => {
        if (item.id === id) {
            let newQuantity = item.quantity + change;
            item.quantity = newQuantity > 0 ? newQuantity : 1;
            item.totalPrice = (item.price * item.quantity).toFixed(2);
        }
        return item;
    });

    saveCart(cart);
    renderCart();
}

updateCartCount();

function attachEventListeners() {
    document.querySelectorAll(".btn-remove").forEach(button => {
        button.addEventListener("click", function () {
            let id = parseInt(this.dataset.id);
            removeFromCart(id);
        });
    });

    document.querySelectorAll(".btn-increase").forEach(button => {
        button.addEventListener("click", function () {
            let id = parseInt(this.dataset.id);
            updateQuantity(id, 1);
        });
    });

    document.querySelectorAll(".btn-decrease").forEach(button => {
        button.addEventListener("click", function () {
            let id = parseInt(this.dataset.id);
            updateQuantity(id, -1);
        });
    });

    document.getElementById("clear-cart")?.addEventListener("click", function () {
        localStorage.removeItem("cart");
        updateCartCount();
        renderCart();
    });

    document.getElementById("checkout")?.addEventListener("click", function (event) {
        event.preventDefault();
        let name = document.getElementById("customer-name").value.trim();
        let phone = document.getElementById("customer-phone").value.trim();
        let email = document.getElementById("customer-email").value.trim();
        let address = document.getElementById("customer-address").value.trim();
        let cart = getCart();
        let selectedPayment = document.querySelector('input[name="payment_option"]:checked');
        let paymentOptionText = selectedPayment ? selectedPayment.nextElementSibling.textContent.trim() : "";

        if (!name || !phone) {
            alert("Пожалуйста, введите ФИО и номер телефона!");
            return;
        }

        if (cart.length === 0) {
            alert("Корзина пуста! Добавьте товары перед оформлением заказа.");
            return;
        }

        let orderData = {
            name: name,
            phone: phone,
            email: email,
            address: address,
            payment_option: paymentOptionText,
            items: cart.map(item => ({
                id: item.id,
                quantity: item.quantity
            }))
        };

        fetch("/api/checkout", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content,
                "Accept": "application/json"
            },
            body: JSON.stringify(orderData)
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("✅ Заказ успешно оформлен!");
                    localStorage.removeItem("cart");
                    renderCart();
                } else {
                    alert("⚠ Ошибка при оформлении заказа!");
                }
            })
            .catch(error => {
                console.error("Ошибка:", error);
                alert("⚠ Не удалось оформить заказ!");
            });

    });

}

//  SEARCH SECTION
document.addEventListener("DOMContentLoaded", function () {
    const searchButton = document.querySelector(".search-button");
    const searchOverlay = document.querySelector(".search-overlay");
    const searchClose = document.querySelector(".search-close");

    searchButton.addEventListener("click", function () {
        searchOverlay.classList.add("active");
    });

    searchClose.addEventListener("click", function () {
        searchOverlay.classList.remove("active");
    });

    document.addEventListener("click", function (event) {
        if (!searchOverlay.contains(event.target) && !searchButton.contains(event.target)) {
            searchOverlay.classList.remove("active");
        }
    });
});
// BURGER MENU
document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelector(".burger-menu");
    const mobileMenu = document.querySelector(".mobile-menu");
    const closeBtn = document.querySelector(".close-menu");
    burger.addEventListener("click", function () {
        mobileMenu.classList.add("active");
    });
    closeBtn.addEventListener("click", function () {
        mobileMenu.classList.remove("active");
    });
});
