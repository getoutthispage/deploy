<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer__top-inner">
                <div class="footer__top-item footer__top-news-latter">
                    <h6 class="footer__top-title">
                        Подпишитесь на нашу рассылку <br>
                        и узнавайте об акциях быстрее
                    </h6>
                    <form action="" class="footer-form">
                        <input class="footer-form-input" type="text" placeholder="Введите ваш Email:">
                        <button class="footer-form-btn" type="submit">Отправить</button>
                    </form>
                </div>
                <div class="footer__top-item">
                    <h6 class="footer__top-title">Интернет-магазин</h6>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a href="{{ route('category.show', 'accessories')  }}">Аксессуары</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'everything-for-colorists')  }}">Все для колористов</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'everything-for-hairdressers')  }}">Все для парикмахеров</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'hair-care')  }}">Уход за волосами</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'сonsumables')  }}">Расходные материалы</a></li>
                        <li class="footer-list__item"><a href="{{ route('category.show', 'tweezers')  }}">Маникюрный инструмент</a></li>
                    </ul>
                </div>
                <div class="footer__top-item">
                    <h6 class="footer__top-title">Информация</h6>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a href="{{route('delivery')}}">Доставка и оплата</a></li>
                        <li class="footer-list__item"><a href="{{route('about')}}">О нас</a></li>
                        <li class="footer-list__item"><a href="{{route('feedback')}}">Контакты</a></li>
                        <li class="footer-list__item"><a href="{{route('warranty')}}">Обмен и гарантия</a></li>
                    </ul>
                </div>
                <div class="footer__top-item footer__top-item-social">
                    <ul class="social-list">
                        <li class="social-list__item"><a href="https://www.instagram.com/indigoshop.kz"><img
                                    src="{{asset('images/insta-icon.svg')}}"
                                    alt=""></a>
                        </li>
                        <li class="social-list__item"><a href="https://www.youtube.com/@indigobeauty4298"><img
                                    src="{{asset('images/yt-icon.svg')}}" alt=""></a>
                        </li>
                        <li class="social-list__item"><a
                                href="https://web.facebook.com/people/indigoshopkz/100085899945476"><img
                                    src="{{asset('images/fb-icon.svg')}}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <a class="footer__bottom-link" href="tel:+77089739330">8 708 973 93 30</a>
            <a class="footer__bottom-link" href="https://go.2gis.com/OSkNz">Алматы, Гагарина 186/1</a>
        </div>
    </div>
</footer>
<div id="custom-alert" class="custom-alert" style="display: none;" ></div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{asset('js/main.js')}}" defer></script>
</body>
</html>
