@extends('layouts.main')
@section('content')
    <section class="products-container">
        <div class="catalog-breadcrumbs">
            <nav class="breadcrumb">
                <a class="breadcrumb__item breadcrumb__link" href="{{route('home')}}">Главная</a>
                <span class="breadcrumb__separator">/</span>
                <span class="breadcrumb__item">{{  $query  }}</span>
            </nav>
        </div>
        <h1 class="catalog-title">Результаты поиска: {{ $query }}</h1>
        <div class="catalog-info">
            <div class="product-count">
                <p>Показано товаров: {{ count($results) }}</p>
            </div>
            <div class="product-filter">
                <form method="GET">
                    <input type="hidden" name="query" value="{{ request('query') }}">
                    <select name="sort" id="sortSelect" onchange="this.form.submit()">
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
            @forelse ($results as $product)
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
                <li class="pagination-list__item {{ $results->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $results->appends(request()->query())->previousPageUrl() }}" aria-label="Previous">«</a>
                </li>

                {{-- Страницы --}}
                @for ($i = 1; $i <= $results->lastPage(); $i++)
                    <li class="pagination-list__item {{ $results->currentPage() == $i ? 'active' : '' }}">
                        <a href="{{ $results->appends(request()->query())->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Кнопка "вперед" --}}
                <li class="pagination-list__item {{ $results->hasMorePages() ? '' : 'disabled' }}">
                    <a href="{{ $results->appends(request()->query())->nextPageUrl() }}" aria-label="Next">»</a>
                </li>
            </ul>
        </div>




    </section>
@endsection