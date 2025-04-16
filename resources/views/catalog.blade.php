@extends('layouts.main')
@section('content')
    <section class="products-container">
        <div class="catalog-breadcrumbs">
            <nav class="breadcrumb">
                <a class="breadcrumb__item breadcrumb__link" href="{{route('home')}}">Главная</a>
                <span class="breadcrumb__separator">/</span>
                <span class="breadcrumb__item">{{  $category->name  }}</span>
            </nav>
        </div>
        <h1 class="catalog-title">{{ $category->name }}</h1>
        <div class="catalog-info">
            <div class="product-count">
                <p>Показано товаров: {{ count($products) }}</p>
            </div>
            <div class="product-filter">
                <form method="GET" id="filterForm">
                    <select class="filter-select" name="sort" id="sortSelect" onchange="this.form.submit()">
                        <option value="">Релевантность</option>
                        <option value="cheap" {{ request('sort') == 'cheap' ? 'selected' : '' }}>Сначала дешевые</option>
                        <option value="expensive" {{ request('sort') == 'expensive' ? 'selected' : '' }}>Сначала дорогие
                        </option>
                        <option value="alphabet" {{ request('sort') == 'alphabet' ? 'selected' : '' }}>По алфавиту</option>
                    </select>
                </form>
            </div>

        </div>

        <div class="catalog">
            @forelse ($products as $product)
                    @php
                        $imagesArray = explode(',', $product->images);
                        $imageSrc = !empty($imagesArray[0]) ? trim($imagesArray[0]) : '';
                    @endphp
                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}"
                        class="catalog-card  {{ $product->quantity == 0 ? 'product-item__not-available' : '' }}">

                        <img class="product-item__img" src="/product/{{ $imageSrc}}" alt="Товар">
                        <h4 class="product-title">{{ $product->name }}</h4>
                        @if ($product->quantity == 0)
                            <div class="overlay product-item__notify-link ">Нет в наличии</div>
                        @endif
                        <div class="catalog-card-bottom">
                            <p class="product-price"> {{ number_format($product->sale_price, 0, '.') }}<span>₸</span>
                            </p>
                            <div class="buttons-wrapper">
                                <button class="add-to-cart cart-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                    data-price="{{ $product->sale_price }}"
                                    data-image="{{explode(',', $product->images)[0]}}">Добавить в корзину
                                </button>
                                <button class="icon-button cart-button cart-btn" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-price="{{ $product->sale_price }}"
                                    data-image="{{explode(',', $product->images)[0]}}">
                                    <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                                </button>
                            </div>
                        </div>
                    </a>
            @empty
                <p>Товары в данной категории отсутствуют.</p>
            @endforelse
        </div>

        <div class="pagination">
            <ul class="pagination-list">
                {{-- Кнопка "назад" --}}
                <li class="pagination-list__item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $products->previousPageUrl() . (request()->except('page') ? '&' . http_build_query(request()->except('page')) : '') }}"
                        aria-label="Previous">«</a>
                </li>

                {{-- Первая страница --}}
                <li class="pagination-list__item {{ $products->currentPage() == 1 ? 'active' : '' }}">
                    <a
                        href="{{ $products->url(1) . (request()->except('page') ? '&' . http_build_query(request()->except('page')) : '') }}">1</a>
                </li>

                {{-- Текущая страница (если это не 1 и не последняя) --}}
                @if ($products->currentPage() > 1 && $products->currentPage() < $products->lastPage())
                    <li class="pagination-list__item active">
                        <a
                            href="{{ $products->url($products->currentPage()) . (request()->except('page') ? '&' . http_build_query(request()->except('page')) : '') }}">
                            {{ $products->currentPage() }}
                        </a>
                    </li>
                @endif

                {{-- Последняя страница --}}
                @if ($products->lastPage() > 1)
                    <li class="pagination-list__item {{ $products->currentPage() == $products->lastPage() ? 'active' : '' }}">
                        <a
                            href="{{ $products->url($products->lastPage()) . (request()->except('page') ? '&' . http_build_query(request()->except('page')) : '') }}">
                            {{ $products->lastPage() }}
                        </a>
                    </li>
                @endif

                {{-- Кнопка "вперед" --}}
                <li class="pagination-list__item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <a href="{{ $products->nextPageUrl() . (request()->except('page') ? '&' . http_build_query(request()->except('page')) : '') }}"
                        aria-label="Next">»</a>
                </li>
            </ul>
        </div>


    </section>

    <script type="application/ld+json">
                                                                {
                                                                  "@context": "https://schema.org",
                                                                  "@type": "BreadcrumbList",
                                                                  "@type": "ItemList",
                                                                  "name": "{{ $category->name }}",
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