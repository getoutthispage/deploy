@extends('layouts.main')
@section('content')
    <div class="product-page-section">
        <div class="container">
            <div class="catalog-breadcrumbs">
                <nav class="breadcrumb">
                    <a class="breadcrumb__item breadcrumb__link" href="{{route('home')}}">Главная</a>
                    <span class="breadcrumb__separator">/</span>
                    <a class="breadcrumb__item breadcrumb__link" href="{{ url()->previous() }}">
                        {{ $last_path[array_key_last($last_path)] }}
                    </a>
                    <span class="breadcrumb__separator">/</span>
                    <a class="breadcrumb__item">{{ $product->name }}</a>
                </nav>
            </div>
            <div class="product-page__wrapper">
                <div class="product-page__image">
                    <img id="main-image" src="/product/{{ explode(',', $product->images)[0] }}" alt="{{$product->name}}">
                    <div class="swiper-container swiper-hidden">
                        <div class="swiper-wrapper">
                            @foreach (explode(',', $product->images) as $index => $image)
                                <div class="swiper-slide">
                                    <img src="/product/{{ $image }}" alt="" class="product-thumbnail
                                        @if ($index === 0) active @endif" data-image="/product/{{ $image }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-page__content">
                    <h1>{{ $product->name }}</h1>
                    <p class="product-page-code">Код продукта: {{ $product->code }}</p>
                    <div class="product-page__buttons">
                        {{-- <button class="favorite-button" id="favorite-button">--}}
                            {{-- <img src="{{ asset('../images/favorite.svg') }}" alt="Добавить в избранное" --}} {{--
                                id="favorite-icon">--}}
                            {{-- </button>--}}
                        {{-- <button class="favorite-button" id="favorite-button">--}}
                            {{-- <img src="{{asset('../images/compare.svg')}}" alt="Добавить в избранное"
                                id="favorite-icon">--}}
                            {{-- </button>--}}
                        <form>
                            <div class="rating">
                                <label for="star5">&#9733;</label>
                                <label for="star4">&#9733;</label>
                                <label for="star3">&#9733;</label>
                                <label for="star2">&#9733;</label>
                                <label for="star1">&#9733;</label>
                            </div>
                        </form>
                        <p class="product-page-price">{{ number_format($product->sale_price, 2, '.', ' ') }}
                            <span>₸</span>
                        </p>
                    </div>
                    <div class="product-page-character">
                        <h2>Характеристики</h2>
                        <ul class="product-page-character__list">
                            @if($product->attributes)
                                                    @php
                                                        $attributes = json_decode($product->attributes, true);
                                                    @endphp
                                                    @foreach($attributes as $key => $value)
                                                        <li class="product-page-character__list-item">
                                                            <div class="product-page-item-left">{{ $key }}</div>
                                                            <div class="product-page-item-right">{{ $value }}</div>
                                                        </li>
                                                    @endforeach
                            @else
                                <li class="product-page-item">
                                    <div class="product-page-item-left">Нет атрибутов</div>
                                    <div class="product-page-item-right">---</div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <h2 style=" border-bottom: 2px solid #B1192E;">Описание</h2>
                    <ul class="product-page-character__list">
                        <li class="product-page-character__list-item">{{ $product->description }}</li>
                    </ul>
                    <div class="product-page__cart">
                        <button class="cart-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                            data-price="{{ $product->sale_price }}"
                            data-image="{{explode(',', $product->images)[0]}}">Добавить в корзину
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/ld+json">
                    {
                      "@context": "https://schema.org/",
                      "@type": "Product",
                      "name": "{{ $product->name }}",
                  "image": "{{ asset('storage/' . explode(',', $product->images)[0]) }}",
                  "description": "{{ Str::limit(strip_tags($product->description), 150) }}",
                  "sku": "{{ $product->code ?? $product->id }}",
                  "brand": {
                    "@type": "Brand",
                    "name": "{{ $product->brand ?? 'Без бренда' }}"
                  },
                  "offers": {
                    "@type": "Offer",
                    "url": "{{ url()->current() }}",
                    "priceCurrency": "KZT",
                    "price": "{{ $product->sale_price }}",
                    "itemCondition": "https://schema.org/NewCondition",
                    "availability": "{{ $product->quantity ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
                    "seller": {
                      "@type": "Organization",
                      "name": "Интернет-магазин инструментов для парикмахеров Indigoshop.kz"
                    }
                  },
                  "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "{{ $product->rating ?? 4.5 }}",
                    "reviewCount": "{{ $product->review_count ?? 10 }}"
                  }
                }
                </script>
@endsection
@push('scripts')
    <script src="{{ asset('js/swiper-bundle.min.js') }}" defer></script>
@endpush
