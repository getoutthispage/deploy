@extends('layouts.main')
@section('title', 'Условия гарантии в интернет-магазине indigoshop.kz')
@section('description', 'Купить профессиональные инструменты и аксессуары для парикмахеров, барберов и колористов в Алматы. Доставка, низкие цены, широкий ассортимент.')

@section('content')
    <section class="py-12 bg-gray-100 flex justify-center">
        <div class="container mx-auto px-4 flex justify-center">
            <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Гарантия и Сервис</h1>
                <div class="mb-6 text-left">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center">Гарантийный срок</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Гарантийный срок, в течение которого Покупатель может предъявить Продавцу претензии по качеству Товара, определяется в Гарантийном талоне.
                        Утрата оригинала гарантийного талона является основанием для отказа в гарантийном обслуживании.
                    </p>
                    <ul class="text-gray-600 leading-relaxed list-disc list-inside mb-4">
                        <li>Уведомление о неисправности получено в срок;</li>
                        <li>Соблюдены правила эксплуатации;</li>
                        <li>Сохранены оригинальные надписи серийного номера и заводская упаковка;</li>
                        <li>Отсутствует вмешательство третьих лиц в ремонт.</li>
                    </ul>
                    <h3 class="text-xl font-semibold text-gray-800 mt-6">Гарантийное обслуживание включает:</h3>
                    <ul class="text-gray-600 leading-relaxed list-disc list-inside mb-4">
                        <li>Ремонт товара;</li>
                        <li>Замену товара в случае неремонтопригодности;</li>
                        <li>Возврат средств при невозможности замены.</li>
                    </ul>
                    <h3 class="text-xl font-semibold text-gray-800 mt-6">Гарантия не распространяется на:</h3>
                    <ul class="text-gray-600 leading-relaxed list-disc list-inside mb-4">
                        <li>Быстро изнашивающиеся детали (ножи, сетки, аккумуляторы);</li>
                        <li>Товары с механическими повреждениями;</li>
                        <li>Товары, использованные с нарушением условий эксплуатации.</li>
                    </ul>
                    <h2 class="text-2xl font-semibold text-gray-700 mt-6 text-center">Условия возврата и обмена</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Возврат возможен при сохранении товарного вида, упаковки и полной комплектации.
                        Перед возвратом проводится экспертиза в сервисном центре.
                    </p>
                    <h3 class="text-xl font-semibold text-gray-800 mt-6">Не подлежат возврату:</h3>
                    <ul class="text-gray-600 leading-relaxed list-disc list-inside mb-4">
                        <li>Лекарственные средства и медицинские изделия;</li>
                        <li>Нательное белье, чулочно-носочные изделия;</li>
                        <li>Растения и животные;</li>
                        <li>Электронные устройства с SIM-картами;</li>
                        <li>Личные гигиенические товары;</li>
                        <li>Товары с нарушенной упаковкой.</li>
                    </ul>
                    <h3 class="text-xl font-semibold text-gray-800 mt-6">Документы для возврата:</h3>
                    <ul class="text-gray-600 leading-relaxed list-disc list-inside mb-4">
                        <li>Кассовый чек или иной документ, подтверждающий покупку;</li>
                        <li>Гарантийный талон (при наличии);</li>
                        <li>Документ сервисного центра о наличии заводского брака.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
