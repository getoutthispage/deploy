@extends('layouts.main')
@section('content')
    <section id="categories" class="categories page-section">
        <div class="container">
            <div class="categories__inner">

                @foreach($subcategories as $subcategory)
                    <a class="categories__item"
                       href="{{ route('category.show', [
           'slug1' => $category->parent ? $category->parent->slug : $category->slug,
           'slug2' => $category->parent ? $category->slug : $subcategory->slug,
           'slug3' => $category->parent ? $subcategory->slug : null,
       ]) }}">
                        <div class="categories__item-info">
                            <h4 class="categories__item-title">{{ $subcategory->name }}</h4>
                            <p class="categories__item-text">Подробнее</p>
                        </div>
                        <div class="categories__item-img">
                            <img src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name }}">
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </section>
@endsection
