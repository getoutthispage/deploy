@extends('layouts.main')
@section('title', 'Доставка бесплатно от 20 000 тнг в indigoshop.kz')
@section('description', 'Купить профессиональные инструменты и аксессуары для парикмахеров, барберов и колористов в Алматы. Доставка, низкие цены, широкий ассортимент.')

@section('content')
<section class="delivery-page-section">
    <div class="container">
        <div class="delivery-page__wrapper">
            <div class="delivery-page__item">
                <h1>Доставляем счастье. Бесплатно.</h1>
                <p>При заказе от 20 000 тенге, доставка бесплатная</p>
            </div>

            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Варианты доставки</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Доставка по г. Алматы</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">🚕 Доставка по г. Алматы по тарифу Яндекс курьер, доставку оплачивает покупатель.<br>
                        При заказе от 20 000 тенге, доставка в черте квадрата Аль-Фараби-Восточная объездная-Момыш улы-Рыскулова <span class="text-green-600 font-semibold">БЕСПЛАТНАЯ</span> на следующий день после оформления заказа.<br>
                        За пределами квадрата в черте города доставка 1000 тенге, при заказе от 20 000 тенге.<br>
                        📦 По всему Казахстану доставка осуществляется Казпочтой до отделения:
                    <ul class="list-disc pl-5 mt-2 text-gray-600">
                        <li>⚫ Упаковка товара</li>
                        <li>🗓 Срок до 10 рабочих дней (без учета выходных)</li>
                        <li>💵 Цена доставки 2500 тенге по всему РК (до 9 кг)</li>
                    </ul>
                    Также есть авиа-доставка по крупным городам — рассчитывается индивидуально! 🟢 Доставка другими курьерскими службами по запросу.
                    Доставка по РК при заказе от 20 000 тенге <span class="text-green-600 font-semibold">БЕСПЛАТНАЯ</span>.
                    </p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Способы оплаты в Indigoshop.kz</h3>
                    <ul class="list-disc pl-5 text-gray-600 text-sm leading-relaxed">
                        <li>💰 Наличный расчет в точке самовывоза</li>
                        <li>🏦 Безналичный расчет</li>
                        <li>📄 Оплата по счету</li>
                        <li>💳 Удаленная оплата через Каспи банк, Халык банк</li>
                        <li>📆 Рассрочка от Каспи банка и Халык банка</li>
                        <li>🛍 Kaspi Red</li>
                    </ul>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Рассрочка</h3>
                    <ul class="list-disc pl-5 text-gray-600 text-sm leading-relaxed">
                        <li>☑Kaspi 0•0•12</li>
                        <li>☑Kaspi Red</li>
                        <li>☑Halyk 0•0•6</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
