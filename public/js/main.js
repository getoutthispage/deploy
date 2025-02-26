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
            320: {slidesPerView: 2, spaceBetween: 10},
            1024: {slidesPerView: 5, spaceBetween: 20},
        },
    });
    new Swiper(".banner-swiper", {
        slidesPerView: 1, // По умолчанию 1 баннер
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
        slidesPerView: 1, // По умолчанию 1 баннер
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
        slidesPerView: 4, // По умолчанию 1 баннер
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
// product cart image-swiper logic
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

// cart

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
        // После завершения анимации скрываем блок полностью
        setTimeout(() => {
            alertDiv.style.display = 'none';
        }, 500);
    }, 2000);
}

document.addEventListener("DOMContentLoaded", function () {
    const deliveryOptions = document.getElementsByName('delivery_option');
    const addressInput = document.getElementById('customer-address');

    function updateAddressField() {
        const selected = document.querySelector('input[name="delivery_option"]:checked').value;
        if (selected === 'delivery') {
            addressInput.value = "";
            addressInput.disabled = false; // разрешаем ввод адреса
            addressInput.placeholder = "Введите адрес доставки";
        } else {
            addressInput.value = "самовывоз";
            addressInput.disabled = true; // запрещаем редактирование
        }
    }

    deliveryOptions.forEach(option => {
        option.addEventListener('change', updateAddressField);
    });

    // Инициализация при загрузке страницы
    updateAddressField();
});
document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();
    document.querySelectorAll(".cart-btn").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Останавливаем переход по ссылке

            // Получаем данные из атрибутов data
            let productId = parseInt(this.dataset.id);
            let productName = this.dataset.name;
            let productPrice = parseFloat(this.dataset.price);
            let productImage = this.dataset.image;
            showAutoAlert("Товар добавлен в корзину");
            // Вызываем функцию добавления товара в корзину
            addToCart(productId, productName, productPrice, productImage);
        });
    });

    renderCart(); // Отображаем корзину при загрузке страницы
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
        cart.push({id, name, price, image, quantity: 1});
    }

    saveCart(cart);
    updateCartCount();

    renderCart();
}

function renderCart() {
    let cart = getCart();
    let cartTable = document.getElementById("cart-items");

    if (!cartTable) return;

    cartTable.innerHTML = "";

    if (cart.length === 0) {
        cartTable.innerHTML = `<tr><td colspan="4">Корзина пуста</td></tr>`;
        return;
    }

    cart.forEach(item => {
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>
                <img class="cart-item__img" src="/product/${item.image}" alt="${item.name}"> <div class="title-cart-name">${item.name}</div>
            </td>
            <td>${item.totalPrice || item.price} ₸</td> <!-- Выводим актуальную цену -->
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
        `;
        cartTable.appendChild(row);
    });

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
            item.quantity = newQuantity > 0 ? newQuantity : 1; // Не даем уйти в 0
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
        let address = document.getElementById("customer-address").value.trim();
        let email = document.getElementById("customer-email").value.trim();
        // let payment_option = document.querySelector('input[name="payment_option"]:checked')?.value || "";
        let cart = getCart();php -vpp

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
            address: address,
            email: email,
            // payment_option: payment_option,
            items: cart.map(item => ({
                id: item.id,
                quantity: item.quantity
            }))
        };

        fetch("/checkout", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
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

    // Закрытие поиска при клике вне блока
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
