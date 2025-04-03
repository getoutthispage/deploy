<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__top">
            <a href="{{ route('home') }}" class="logo-footer">
                <img src="{{ asset('images/logo-indigoshop.webp') }}" alt="logo">
            </a>
            <div class="footer__top-inner">
                <div class="footer__top-item">
                    <h6 class="footer__top-title">{{ __('messages.footer.shop_title') }}</h6>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a href="{{ route('category.show', 'accessories') }}">{{ __('messages.footer.accessories') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'everything-for-colorists') }}">{{ __('messages.footer.everything_for_colorists') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'everything-for-hairdressers') }}">{{ __('messages.footer.everything_for_hairdressers') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'hair-care') }}">{{ __('messages.footer.hair_care') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'сonsumables') }}">{{ __('messages.footer.consumables') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'tweezers') }}">{{ __('messages.footer.manicure_tools') }}</a></li>
                    </ul>
                </div>
                <div class="footer__top-item">
                    <h6 class="footer__top-title">{{ __('messages.footer.info_title') }}</h6>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a href="{{ route('delivery') }}">{{ __('messages.footer.delivery_and_payment') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('about') }}">{{ __('messages.footer.about') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('feedback') }}">{{ __('messages.footer.contacts') }}</a></li>
                        <li class="footer-list__item"><a href="{{ route('warranty') }}">{{ __('messages.footer.warranty') }}</a></li>
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
            <div class="">
                <p style="color:#fff; margin: 0; font-size: 14px;">{{ __('messages.footer.change_language') }}</p>
                <select onchange="location = this.value;">
                    <option style="color:black" value="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('ru') }}" {{ App::getLocale() == 'ru' ? 'selected' : '' }}>Русский</option>
                    <option style="color:black" value="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('kk') }}" {{ App::getLocale() == 'kk' ? 'selected' : '' }}>Қазақша</option>
                </select>
            </div>
            <p style="color:#fff; margin: 0; font-size: 14px;">© 2025 INDIGOSHOP - {{ __('messages.footer.rights_reserved') }}</p>
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

<script src="{{ asset('js/swiper-bundle.min.js') }}" defer></script>
<script src="{{asset('js/main.js')}}" defer></script>
</body>

</html>