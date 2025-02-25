@extends('layouts.main')
@section('content')
    <section class="products-container">
        <div class="container">
            <h1 class="catalog-title">Каталог товаров</h1>
            <div class="catalog">
                @forelse ($results as $product)
                    @php
                        $imagesArray = explode(',', $product->images);
                        $imageSrc = !empty($imagesArray[0]) ? trim($imagesArray[0]) : '';
                    @endphp
                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}"
                       class="product-card  {{ $product->quantity == 0 ? 'product-item__not-available' : '' }}">

                        <img class="product-item__img" src="/product/{{ $imageSrc}}" alt="Товар">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <p class="product-price"> {{ number_format($product->sale_price, 0, '.') }}<span>₸</span></p>
                        @if ($product->quantity == 0)
                            <div class="overlay product-item__notify-link ">Нет в наличии</div>
                        @endif
                        <div class="product-cart-bottom">
                            <p class="product-card-price">5500 ₸</p>
                            <button class="add-to-cart cart-btn"  data-id="3322"
                                    data-name="Кондиционер «Увлажнение и питание» 500 мл"
                                    data-price="5500"
                                    data-image="images/MTY-02-2_1.jpeg">Добавить в корзину</button>
                            <button class="icon-button favorite-button">
                                <img src="{{ asset('images/favorite.svg') }}" alt="Избранное">
                            </button>
                            <button class="icon-button cart-button cart-btn"  data-id="3322"
                                    data-name="Кондиционер «Увлажнение и питание» 500 мл"
                                    data-price="5500"
                                    data-image="images/MTY-02-2_1.jpeg">
                                <img src="{{ asset('images/cart.svg') }}" alt="Корзина">
                            </button>
                        </div>                       </a>
                @empty
                    <p>Товары в данной категории отсутствуют.</p>
                @endforelse
            </div>
            <div class="pagination" style="margin-bottom: 40px">
                <ul class="pagination-list">
                    @if ($results->onFirstPage())
                        <li class="pagination-list__item disabled"><span>«</span></li>
                    @else
                        <li class="pagination-list__item"><a href="{{ $results->previousPageUrl() }}">«</a></li>
                    @endif
                    @foreach ($results->getUrlRange(1, $results->lastPage()) as $page => $url)
                        <li class="pagination-list__item {{ $page == $results->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($results->hasMorePages())
                        <li class="pagination-list__item"><a href="{{ $results->nextPageUrl() }}">»</a></li>
                    @else
                        <li class="pagination-list__item disabled"><span>»</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
@endsection
