@extends('layouts.main')
@section('title', 'Интернет-магазин инструментов для парикмахеров и барберов – Алматы')
@section('description', 'Купить профессиональные инструменты и аксессуары для парикмахеров, барберов и колористов в Алматы. Доставка, низкие цены, широкий ассортимент.')
@section('content')
    <section class="main-banner">
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{ url('/shop/hair-care')}}">
                            <img src="{{asset('images/main-banners/banner-desctope_3.webp')}}"
                                data-mobile="{{asset('images/main-banners/banner-mobile_3.webp')}}"
                                data-desktop="{{asset('images/main-banners/banner-desctope_3.webp')}}"
                                alt="профессиональный уход за вашими волосами">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{ url('/shop/everything-for-hairdressers/machines')}}">
                            <img src="{{asset('images/main-banners/banner-desctope_2.webp')}}"
                                data-mobile="{{asset('images/main-banners/banner-mobile_2.webp')}}"
                                data-desktop="{{asset('images/main-banners/banner-desctope_2.webp')}}"
                                alt="эксклюзивное предложение при покупке инструментов">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{ url('/shop/hair-care/mantianyou')}}">
                            <img src="{{asset('images/main-banners/banner-desctope_1.webp')}}"
                                data-mobile="{{asset('images/main-banners/banner-mobile_1.webp')}}"
                                data-desktop="{{asset('images/main-banners/banner-desctope_1.webp')}}"
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
            <h1>{{ __('messages.welcome') }}</h1>
            <div class="working-machines-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{route('product.show', 'kondicioner-uvlaznenie-i-pitanie-500-ml')}}" class="product-card">
                            <img src="{{ asset('images/shampoo/1.webp') }}" alt="Кондиционер «Увлажнение и питание» 500 мл">
                            <h3>Кондиционер «Увлажнение и питание» 500 мл</h3>
                            {{-- <p class="description">Подходит для сухих и поврежденных волос</p>--}}
                            {{-- {{-- <p class="description-brand">Mantianyou</p>--}}
                            <div class="product-cart-bottom">
                                <p class="product-card-price">5500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="1572"
                                    data-name="Кондиционер «Увлажнение и питание» 500 мл" data-price="5500"
                                    data-image="images/MTY-02-2_1.webp">Добавить в корзину
                                </button>
                                {{-- <button class="icon-button favorite-button">--}}
                                    {{-- <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                    {{-- </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="1572"
                                    data-name="Кондиционер «Увлажнение и питание» 500 мл" data-price="5500"
                                    data-image="images/MTY-02-2_1.webp">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show', 'maslo-dlia-volos-gladkost-selka-100-ml')}}" class="product-card">
                            <img src="{{ asset('images/shampoo/2.webp') }}" alt="Масло для волос «Гладкость шелка», 100 мл">
                            <h3>Масло для волос «Гладкость шелка», 100 мл</h3>
                            {{-- <p class="description">Подходит для всех типов волос</p>--}}
                            {{-- <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">7000 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="1574"
                                    data-name="Масло для волос «Гладкость шелка», 100 мл" data-price="7000"
                                    data-image="images/MTY-03-100_1.webp">Добавить в корзину
                                </button>
                                {{-- <button class="icon-button favorite-button">--}}
                                    {{-- <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                    {{-- </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="1574"
                                    data-name="Масло для волос «Гладкость шелка», 100 мл" data-price="7000"
                                    data-image="images/MTY-03-100_1.webp">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show', 'sprei-kondicioner-dlia-volos-uvlaznenie-i-pitanie-250-ml')}}"
                            class="product-card">
                            <img src="{{ asset('images/shampoo/3.webp') }}"
                                alt="Спрей-кондиционер для волос «Увлажнение и питание» 250 мл">
                            <h3>Спрей-кондиционер для волос «Увлажнение и питание» 250 мл</h3>
                            {{-- <p class="description">Подходит для всех типов волос</p>--}}
                            {{-- <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">4500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="1573"
                                    data-name="Спрей-кондиционер для волос «Увлажнение и питание» 250 мл" data-price="4500"
                                    data-image="images/MTY-02-3_1.webp">Добавить в корзину
                                </button>
                                {{-- <button class="icon-button favorite-button">--}}
                                    {{-- <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                    {{-- </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="1573"
                                    data-name="Спрей-кондиционер для волос «Увлажнение и питание» 250 мл" data-price="4500"
                                    data-image="images/MTY-02-3_1.webp">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show', 'sampun-glubokoe-vosstanovlenie-500-ml')}}" class="product-card">
                            <img src="{{ asset('images/shampoo/4.webp') }}" alt="Шампунь «Глубокое восстановление» 500 мл">
                            <h3>Шампунь Глубокое восстановление 500 мл</h3>
                            {{-- <p class="description">Подходит для ухода за поврежденными</p>--}}
                            {{-- <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">5500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="1570"
                                    data-name="Шампунь «Глубокое восстановление» 500 мл" data-price="5500"
                                    data-image="images/MTY-01-1_1.webp">Добавить в корзину
                                </button>
                                {{-- <button class="icon-button favorite-button">--}}
                                    {{-- <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                    {{-- </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="1570"
                                    data-name="Шампунь «Глубокое восстановление» 500 мл" data-price="5500"
                                    data-image="images/MTY-01-1_1.webp">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('product.show', 'sampun-uvlaznenie-i-pitanie-500-ml')}}" class="product-card">
                            <img src="{{ asset('images/shampoo/5.webp') }}" alt="Шампунь «Увлажнение и питание» 500 мл">
                            <h3>Шампунь «Увлажнение и питание» 500 мл</h3>
                            {{-- <p class="description">Подходит для сухих и поврежденных волос</p>--}}
                            {{-- <p class="description-brand">Mantianyou</p>--}}

                            <div class="product-cart-bottom">
                                <p class="product-card-price">5500 ₸</p>
                                <button class="add-to-cart cart-btn" data-id="1571"
                                    data-name="Шампунь «Увлажнение и питание» 500 мл" data-price="5500"
                                    data-image="images/MTY-02-1_1.webp">Добавить в корзину
                                </button>
                                {{-- <button class="icon-button favorite-button">--}}
                                    {{-- <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                    {{-- </button>--}}
                                <button class="icon-button cart-button cart-btn" data-id="1571"
                                    data-name="Шампунь «Увлажнение и питание» 500 мл" data-price="5500"
                                    data-image="images/MTY-02-1_1.webp">
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
            <h2>{{ __('messages.Vse_dlya_p_b') }}</h2>
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
            <h2>{{ __('messages.Vse_dlya_p_b') }}</h2>
            <div class="banner-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="{{route('delivery')}}"> <img class="banner-img_item"
                                src="{{asset('images/banners/banner_1.webp')}}" alt="БАНЕР1"></a></div>
                    <div class="swiper-slide"><a href="{{route('delivery')}}"> <img class="banner-img_item"
                                src="{{asset('images/banners/banner_2.webp')}}" alt="БАНЕР2"></a></div>

                </div>
            </div>
        </div>
    </section>
    <section class="products-container">
        <div class="container">
            <h2>{{ __('messages.popular_hair_dries') }}</h2>
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
                                        data-name="{{ $product->name }}" data-price="{{ $product->sale_price }}"
                                        data-image="{{ explode(',', $product->images)[0] }}">Добавить в корзину
                                    </button>
                                    {{-- <button class="icon-button favorite-button">--}}
                                        {{-- <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">--}}
                                        {{-- </button>--}}
                                    <button class="icon-button cart-button cart-btn" data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}" data-price="{{ $product->sale_price }}"
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
            <h2 class="otziv">{{ __('messages.customer_reviews') }}</h2>
            <div class="review-swiper  swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA=="
                            class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/1.webp') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA=="
                            class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/2.webp') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA=="
                            class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/3.webp') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA=="
                            class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/4.webp') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODkwNTc0MDE3NjM3NDUw?story_media_id=2550152702795770538_6861206655&igsh=MTBuZjBtdGgwdmlxZA=="
                            class="product-card prod-bnr">
                            <div class="product-review">
                                <img class="review-icon" src="{{ asset('images/quote.svg') }}" alt="Отзыв">
                            </div>
                            <img src="{{ asset('images/review/5.webp') }}" alt="отзыв о магазине indigoshop">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products-container">
        <div class="container">
            <h2>{{ __('messages.partner_brands') }}</h2>
            <div class="working-machines-swiper swiper-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/mantianyou.webp') }}" alt="mantianyou brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/wahl.webp') }}" alt="wahl brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/bouticle.webp') }}" alt="bouticle brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/del-color.webp') }}" alt="del-color brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/j-maki.webp') }}" alt="j-maki brand logo">
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/londa.webp') }}" alt="  brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/wella.webp') }}" alt="wella brand logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="product-card">
                            <img src="{{ asset('images/brands/mac_Styler.webp') }}" alt="mac_Styler brand logo">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="container" style="  display: flex;justify-content: center;">
        <div class="video-section">
            <h2>{{ __('messages.youtube_channel') }}л</h2>
            <a href="https://www.youtube.com/@indigobeauty4298" target="_blank" class="video-banner">
                <video muted loop playsinline controls>
                    <source src="{{ asset('images/video/youtube-insigoshop.mp4') }}" type="video/mp4">
                    Ваш браузер не поддерживает видео.
                </video>
            </a>
        </div>
    </div>

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