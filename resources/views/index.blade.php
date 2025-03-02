@extends('layouts.main')
@section('title', 'Интернет-магазин инструментов для парикмахеров и барберов – Алматы')
@section('description', 'Купить профессиональные инструменты и аксессуары для парикмахеров, барберов и колористов в Алматы. Доставка, низкие цены, широкий ассортимент.')
@section('content')
    <section class="main-banner">
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{ url('/shop/everything-for-hairdressers/machines')}}">
                            <img src="{{asset('images/main-banners/banner-desctope_3.jpg')}}"
                                 data-mobile="{{asset('images/main-banners/banner-mobile_3.jpg')}}"
                                 data-desktop="{{asset('images/main-banners/banner-desctope_3.jpg')}}"
                                 alt="профессиональный уход за вашими волосами">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{ url('/shop/everything-for-hairdressers/machines')}}">
                            <img src="{{asset('images/main-banners/banner-desctope_2.jpg')}}"
                                 data-mobile="{{asset('images/main-banners/banner-mobile_2.jpg')}}"
                                 data-desktop="{{asset('images/main-banners/banner-desctope_2.jpg')}}"
                                 alt="эксклюзивное предложение при покупке инструментов">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{ url('/shop/everything-for-hairdressers/machines')}}">
                            <img src="{{asset('images/main-banners/banner-desctope_1.jpg')}}"
                                 data-mobile="{{asset('images/main-banners/banner-mobile_1.jpg')}}"
                                 data-desktop="{{asset('images/main-banners/banner-desctope_1.jpg')}}"
                                 alt="секрет здоровых и роскошных волос в каждом флаконе">
                        </a>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="products-container">
        <div class="container">
            <h1>Качественные инструменты для парикмахеров и барберов в Алматы</h1>
            <div class="working-machines-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{route('product.show','kondicioner-uvlaznenie-i-pitanie-500-ml')}}"
                           class="product-card">
                            <img src="{{ asset('images/shampoo/1.png') }}"
                                 alt="Кондиционер «Увлажнение и питание» 500 мл">
                            <h3>Кондиционер «Увлажнение и питание» 500 мл</h3>
                            {{--                            <p class="description">Подходит для сухих и поврежденных волос</p>--}}
                            {{--                            {{--                            <p class="description-brand">Mantianyou</p>--}}
                            <div class="product-cart-bottom">
                                <p class="product-card-price">5500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="3322"
                                        data-name="Кондиционер «Увлажнение и питание» 500 мл"
                                        data-price="5500"
                                        data-image="images/MTY-02-2_1.jpeg">Добавить в корзину
                                </button>
                                {{--                                <button class="icon-button favorite-button">--}}
                                {{--                                    <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                {{--                                </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="3322"
                                        data-name="Кондиционер «Увлажнение и питание» 500 мл"
                                        data-price="5500"
                                        data-image="images/MTY-02-2_1.jpeg">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show','maslo-dlia-volos-gladkost-selka-100-ml')}}"
                           class="product-card">
                            <img src="{{ asset('images/shampoo/2.png') }}"
                                 alt="Масло для волос «Гладкость шелка», 100 мл">
                            <h3>Масло для волос «Гладкость шелка», 100 мл</h3>
                            {{--                            <p class="description">Подходит для всех типов волос</p>--}}
                            {{--                            <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">7000 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="3324"
                                        data-name="Масло для волос «Гладкость шелка», 100 мл"
                                        data-price="7000"
                                        data-image="images/MTY-03-100_1.jpeg">Добавить в корзину
                                </button>
                                {{--                                <button class="icon-button favorite-button">--}}
                                {{--                                    <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                {{--                                </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="3324"
                                        data-name="Масло для волос «Гладкость шелка», 100 мл"
                                        data-price="7000"
                                        data-image="images/MTY-03-100_1.jpeg">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show','sprei-kondicioner-dlia-volos-uvlaznenie-i-pitanie-250-ml')}}"
                           class="product-card">
                            <img src="{{ asset('images/shampoo/3.png') }}"
                                 alt="Спрей-кондиционер для волос «Увлажнение и питание» 250 мл">
                            <h3>Спрей-кондиционер для волос «Увлажнение и питание» 250 мл</h3>
                            {{--                            <p class="description">Подходит для всех типов волос</p>--}}
                            {{--                            <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">4500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="3323"
                                        data-name="Спрей-кондиционер для волос «Увлажнение и питание» 250 мл"
                                        data-price="4500"
                                        data-image="images/MTY-02-3_1.jpeg">Добавить в корзину
                                </button>
                                {{--                                <button class="icon-button favorite-button">--}}
                                {{--                                    <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                {{--                                </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="3323"
                                        data-name="Спрей-кондиционер для волос «Увлажнение и питание» 250 мл"
                                        data-price="4500"
                                        data-image="images/MTY-02-3_1.jpeg">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show','sampun-glubokoe-vosstanovlenie-500-ml')}}"
                           class="product-card">
                            <img src="{{ asset('images/shampoo/4.png') }}"
                                 alt="Шампунь «Глубокое восстановление» 500 мл">
                            <h3>Шампунь Глубокое восстановление 500 мл</h3>
                            {{--                            <p class="description">Подходит для ухода за поврежденными</p>--}}
                            {{--                            <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">5500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="3320"
                                        data-name="Шампунь «Глубокое восстановление» 500 мл"
                                        data-price="5500"
                                        data-image="images/MTY-01-1_1.jpeg">Добавить в корзину
                                </button>
                                {{--                                <button class="icon-button favorite-button">--}}
                                {{--                                    <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                {{--                                </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="3320"
                                        data-name="Шампунь «Глубокое восстановление» 500 мл"
                                        data-price="5500"
                                        data-image="images/MTY-01-1_1.jpeg">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show','sampun-uvlaznenie-i-pitanie-500-ml')}}" class="product-card">
                            <img src="{{ asset('images/shampoo/5.png') }}"
                                 alt="Шампунь «Увлажнение и питание» 500 мл">
                            <h3>Шампунь «Увлажнение и питание» 500 мл</h3>
                            {{--                            <p class="description">Подходит для сухих и поврежденных волос</p>--}}
                            {{--                            <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">5500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="3321"
                                        data-name="Шампунь «Увлажнение и питание» 500 мл"
                                        data-price="5500"
                                        data-image="images/MTY-02-1_1.jpeg">Добавить в корзину
                                </button>
                                {{--                                <button class="icon-button favorite-button">--}}
                                {{--                                    <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                {{--                                </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="3321"
                                        data-name="Шампунь «Увлажнение и питание» 500 мл"
                                        data-price="5500"
                                        data-image="images/MTY-02-1_1.jpeg">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="categories-section">
        <div class="container">
            <h2>Все для парикмахеров и барберов</h2>
            <div class="categories__inner">
                @foreach($categories as $category)
                    <a class="categories__item" href="{{ route('category.show', $category->slug) }}">
                        <div class="categories__item-info">
                            <h4 class="categories__item-title">{{ $category->name }}</h4>
                            <p class="categories__item-text">Подробнее</p>
                        </div>
                        <div class="categories__item-img">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="banner-item">
        <div class="container">
            <h2>Все для парикмахера и барбера</h2>
            <div class="banner-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="{{route('delivery')}}"> <img class="banner-img_item"
                                                   src="{{asset('images/banners/banner_1.jpg')}}" alt="БАНЕР1"></a></div>
                    <div class="swiper-slide"><a href="{{route('delivery')}}"> <img class="banner-img_item"
                                                   src="{{asset('images/banners/banner_2.jpg')}}" alt="БАНЕР2"></a></div>

                </div>
            </div>
        </div>
    </section>
    <section class="products-container">
        <div class="container">
            <h2>Наши популярные фены</h2>
            <div class="working-machines-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)

                        <div class="swiper-slide">
                            <a href="{{ route('product.show', $product->slug) }}" class="product-card">
                                <img src="/product/{{ explode(',', $product->images)[0] }}" alt="{{ $product->name }}">
                                <h3>{{ $product->name }}</h3>
                                <div class="product-cart-bottom">
                                    <p class="product-card-price">{{ number_format($product->sale_price, 0, ',', ' ') }}
                                        ₸</p>
                                    <button class="add-to-cart cart-btn" data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->sale_price }}"
                                            data-image="{{ explode(',', $product->images)[0] }}">Добавить в корзину
                                    </button>
                                    {{--                                    <button class="icon-button favorite-button">--}}
                                    {{--                                        <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                    {{--                                    </button>--}}
                                    <button class="icon-button cart-button cart-btn" data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->sale_price }}"
                                            data-image="{{ $product->image }}">
                                        <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                    </button>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    <section class="banner-item">
        <div class="container">
            <h2 class="otziv">Отзывы наших покупателей</h2>
            <div class="review-swiper  swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA==" class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/1.jpg') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA==" class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/2.jpg') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA==" class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/3.jpg') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA==" class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/4.jpg') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA==" class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/5.jpg') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products-container">
        <div class="container">
            <h2>Бренды с которыми мы сотрудничаем</h2>
            <div class="working-machines-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/mantianyou.jpg') }}"
                                 alt="mantianyou brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"
                           class="product-card">
                            <img src="{{ asset('images/brands/wahl.jpg') }}"
                                 alt="wahl brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"
                           class="product-card">
                            <img src="{{ asset('images/brands/bouticle.jpg') }}"
                                 alt="bouticle brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"
                           class="product-card">
                            <img src="{{ asset('images/brands/del-color.jpg') }}"
                                 alt="del-color brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/j-maki.jpg') }}"
                                 alt="j-maki brand logo">
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/londa.jpg') }}"
                                 alt="  brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/wella.jpg') }}"
                                 alt="wella brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/mac_Styler.jpg') }}"
                                 alt="mac_Styler brand logo">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "ItemList",
          "name": "Популярные товары",
          "itemListElement": [
        @foreach ($products as $index => $product)
            {
              "@type": "ListItem",
              "position": {{ $index + 1 }},
            "url": "{{ route('product.show', $product->slug) }}",
            "name": "{{ $product->name }}",
            "image": "{{ asset('storage/' . explode(',', $product->images)[0]) }}",
            "offers": {
              "@type": "Offer",
              "priceCurrency": "KZT",
              "price": "{{ $product->sale_price ?? $product->price }}",
              "availability": "{{ $product->quantity ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}"
            }
          }@if(!$loop->last)
                ,
            @endif
        @endforeach
        ]
      }
    </script>
@endsection

