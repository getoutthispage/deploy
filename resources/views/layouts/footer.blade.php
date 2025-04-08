<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__top">
            <a href="{{ route('home') }}" class="logo-footer">
                <img src="{{ asset('images/logo-indigoshop.webp') }}" alt="logo">
            </a>
            <div class="footer__top-inner">
                <div class="footer__top-item">
                    <h6 class="footer__top-title">Интернет-магазин</h6>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a href="{{ route('category.show', 'accessories') }}">Аксессуары</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'everything-for-colorists') }}">Все для колористов</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'everything-for-hairdressers') }}">Все для парикмахеров</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'hair-care') }}">Уход за волосами</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'сonsumables') }}">Расходные материалы</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'tweezers') }}">Маникюрный инструмент</a></li>
                    </ul>
                </div>
                <div class="footer__top-item">
                    <h6 class="footer__top-title">Информация</h6>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a href="{{ route('delivery') }}">Доставка и оплата</a></li>
                        <li class="footer-list__item"><a href="{{ route('about') }}">О нас</a></li>
                        <li class="footer-list__item"><a href="{{ route('feedback') }}">Контакты</a></li>
                        <li class="footer-list__item"><a href="{{ route('warranty') }}">Обмен и гарантия</a></li>
                        <li class="footer-list__item"><a style="color: #B1192E;" href="{{ route('social-program') }}">Наша Социальная программа</a></li>

                    </ul>
                </div>
                <div class="footer__top-item footer__top-item-social">
                    <ul class="social-list">
                        <!-- Здесь можно добавить ссылки на социальные сети -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <p style="color:#fff; margin: 0; font-size: 14px;">© 2025 INDIGOSHOP - Все права защищены</p>
            <a class="footer__bottom-link" href="tel:+77089739330">8 708 973 93 30</a>
            <a class="footer__bottom-link" href="https://go.2gis.com/OSkNz">Алматы, Гагарина 186/1</a>
            <div class="payment-methods">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-cc-apple-pay"></i>
                <i class="fa-brands fa-google-pay"></i>
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>
    </div>
</footer>

<div id="custom-alert" class="custom-alert" style="display: none;"></div>
@stack('scripts')

<script src="{{asset('js/main.js')}}" defer></script> 
</body>

</html>