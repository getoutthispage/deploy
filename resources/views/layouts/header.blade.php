<!DOCTYPE html>
<html lang="ru">

<!-- Schema.org разметка для магазина -->
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Store",
      "name": "Интернет-магазин инструментов для парикмахеров  Indigoshop.kz",
      "url": "https://indigoshop.kz",
      "logo": "https://indigoshop.kz/logo.png",
      "description": "Профессиональные инструменты для парикмахеров, барберов и колористов в Алматы с доставкой по РК.",
      "address": {
        "@type": "PostalAddress",
        "email": "indigoshop_kz@mail.ru",
        "addressLocality": "Алматы",
        "addressCountry": "KZ"
      },
      "sameAs": [
        "https://instagram.com/indigoshop.kz",
        "https://facebook.com/indigoshopkz"
      ]
    }
</script>


<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Интернет-магазин парикмахерских инструментов – Алматы' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Большой выбор инструментов для парикмахеров, барберов и колористов в Алматы с доставкой по РК.' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'парикмахерские инструменты, купить машинку для стрижки, фены, ножницы, Алматы с доставкой по РК' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="yandex-verification" content="2b5dc048071c0553" />
    <!-- Canonical для SEO -->
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/brands.min.css">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <header>
        <div class="container">
            <div class="header-inner">
                <div class="header-top">
                    <div class="header-top-box">
                    <a href="https://pokhlebaeva.pro/" class="school-link">Обучение</a>
                    <ul class="header-top-list">
                            <li class="header-top-list__item"><a
                                    href="{{ route('delivery') }}">Доставка и оплата</a></li>
                            <li class="header-top-list__item"><a
                                    href="{{ route('about') }}">О магазине</a></li>
                            <li class="header-top-list__item"><a
                                    href="{{ route('feedback') }}">Контакты</a></li>
                            <li class="header-top-list__item"><a
                                    href="{{ route('warranty') }}">Гарантия</a></li>
                                    <li class="header-top-list__item"><a style="color: #B1192E;"
                                    href="{{ route('social-program') }}">Наша Социальная программа</a></li>
                        </ul>
                        </ul>
                        <a class="header-top-inst" href="https://www.instagram.com/indigoshop.kz/?hl=en">
                        Наш инстаграм <i class="fa-brands fa-instagram"></i>
</a>
                    </div>

                </div>
                <div class="header-middle">
                    <div class="burger-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav class="mobile-menu">
                        <button class="close-menu">&times;</button>
                        <ul class="mobile-menu-list">
                            <li><a style="color: #ff5252;" href="{{ route('home') }}">Главная</a>
                            </li>
                            <li><a style="color: #ff5252;"
                                    href="{{ route('delivery') }}">Доставка и оплата</a></li>
                            <li><a style="color: #ff5252;"
                                    href="{{ route('about') }}">О магазине</a></li>
                            <li><a style="color: #ff5252;"
                                    href="{{ route('feedback') }}">Контакты</a></li>
                            <li><a style="color: #ff5252;"
                                    href="{{ route('warranty') }}">Гарантия</a></li>
                            <li class="mobile-menu-list-line"></li>
                            <li><a style="color: #ff5252;"
                                    href="{{ route('social-program') }}">Наша Социальная программа</a></li>
                            <li class="mobile-menu-list-line"></li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-hairdressers/machines') }}">Машинки</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-hairdressers/scissors') }}">Ножницы</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-hairdressers/curling-irons-straighteners') }}">Плойки</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-hairdressers/combs') }}">Расчески</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-hairdressers/hairdryers') }}">Фены</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/accessories') }}">Аксессуары</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-colorists/tablets-thermal-paper-scales') }}">Планшеты</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/everything-for-colorists/cups') }}">Чашки</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/accessories/rugs-coasters') }}">Коврики</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/consumables') }}">Расходники</a>
                            </li>
                            <li><a style="font-size: 20px;"
                                    href="{{ url('/shop/hair-care') }}">Уход за волосами</a>
                            </li>

                            <li class="mobile-menu-list-line"></li>

                        </ul>
                    </nav>
                    <div class="search-button"></div> <!-- Кнопка поиска -->
                    <div class="search-overlay">
                        <div class="search-container">
                            <button class="search-close">&times;</button>
                            <form action="{{ route('search') }}" method="GET">
                                <input class="search-input" type="text" name="query" placeholder="Поиск..." required>
                                <button class="search-submit" type="submit">Найти</button>
                            </form>

                        </div>
                    </div>

                    <a href="{{ route('home') }}" class="logo">
                        <img style="width:188px;heigh:55px;" src="{{ asset('images/logo-indigoshop.webp')  }}" alt="logo">
                    </a>
                    <div class="middle-icons">

                        <div class="login">
                            @if (Auth::check())
                                <a href="{{ url('/dashboard') }}" class="icon-dashboard"><span
                                        class="login-icon"></span></a>
                            @else
                                <div class="login-register">
                                    <a href="{{ route('login') }}">
                                        <span class="login-icon"></span>
                                    </a>
                                    @if (request()->is('login'))
                                        <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="cart-wrapper">
                            <a href="{{ route('cart.index') }}" class="basket"></a>
                            @livewire('cart-count')
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <ul class="menu-categories">
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-hairdressers/machines') }}">Машинки</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-hairdressers/scissors') }}">Ножницы</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-hairdressers/curling-irons-straighteners') }}">Плойки</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-hairdressers/combs') }}">Расчески</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-hairdressers/hairdryers') }}">Фены</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/accessories') }}">Аксессуары</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-colorists/tablets-thermal-paper-scales') }}">Планшеты</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/everything-for-colorists/cups') }}">Чашки</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/accessories/rugs-coasters') }}">Коврики</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/consumables') }}">Расходники</a>
                        </li>
                        <li class="menu-categories__item">
                            <a class="menu-categories__link"
                                href="{{ url('/shop/hair-care') }}">Уход за волосами</a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </header>