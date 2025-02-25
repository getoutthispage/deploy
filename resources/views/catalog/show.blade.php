@extends('layouts.main')
@section('content')
    <section class="products-container">
        <div class="container">
            <h1 class="catalog-title">Каталог товаров INDIGOSHOP</h1>
            <div class="catalog">
                @forelse ($products as $product)
                    @php
                        $imagesArray = explode(',', $product->images);
                        $imageSrc = !empty($imagesArray[0]) ? trim($imagesArray[0]) : '';
                    @endphp
                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}"
                       class="product-card  {{ $product->quantity == 0 ? 'product-item__not-available' : '' }}">

                        <img style="width: 100%;" class="product-item__img" src="/product/{{ $imageSrc}}" alt="Товар">
                        <h3 style="width: 100%;" class="product-title">{{ $product->name }}</h3>
                        @if ($product->quantity == 0)
                            <div class="overlay product-item__notify-link ">Нет в наличии</div>
                        @endif
                        <div style="width: 100%;" class="product-cart-bottom">
                            <p style="width: 100%;"
                               class="product-price"> {{ number_format($product->sale_price, 0, '.') }}<span>₸</span>
                            </p>
                            <div class="buttons-wrapper">
                                <button style="width: 100%;" class="add-to-cart cart-btn"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-price="{{ $product->sale_price }}"
                                        data-image="{{explode(',', $product->images)[0]}}">Добавить в корзину
                                </button>
                                <button style="width: 100%;" class="icon-button cart-button cart-btn"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-price="{{ $product->sale_price }}"
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
            <div class="pagination" style="margin-bottom: 40px">
                <ul class="pagination-list">
                    @if ($products->onFirstPage())
                        <li class="pagination-list__item disabled"><span>«</span></li>
                    @else
                        <li class="pagination-list__item"><a href="{{ $products->previousPageUrl() }}">«</a></li>
                    @endif
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="pagination-list__item {{ $page == $products->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($products->hasMorePages())
                        <li class="pagination-list__item"><a href="{{ $products->nextPageUrl() }}">»</a></li>
                    @else
                        <li class="pagination-list__item disabled"><span>»</span></li>
                    @endif
                </ul>
            </div>
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
