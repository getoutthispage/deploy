@extends('layouts.main')
@section('title', 'Корзина')

@section('content')
    <section class="cart-section">
        <div class="container">
            <div class="cart-page__wrapper">
                <div class="cart-page__item">
                    <table class="cart-table">
                        <tbody id="cart-items">
                        </tbody>
                    </table>
                </div>
                <div class="cart-page__checkout">
                    <div class="cart-page__checkout-item">
                        <div class="cart-form">
                            <label for="customer-name">ФИО:</label>
                            <input type="text" id="customer-name" placeholder="Введите ваше имя">

                            <label for="customer-phone">Телефон:</label>
                            <input type="tel" id="customer-phone" placeholder="Введите номер телефона">

                            <label for="customer-email">Email:</label>
                            <input type="email" id="customer-email" placeholder="Введите Email">

                            <p>Выберите способ получения заказа:</p>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" name="delivery_option" value="pickup">
                                    <span>Самовывоз гагарина 186/1</span>
                                </label>
                                <label>
                                    <input type="radio" name="delivery_option" value="delivery" checked>
                                    <span>Доставка</span>
                                </label>
                            </div>

                            <!-- Поле для адреса доставки/самовывоза -->
                            <div id="delivery-address-container">
                                <label for="customer-address">Адрес доставки:</label>
                                <input type="text" id="customer-address" placeholder="Введите адрес доставки">
                            </div>

{{--                            <p>Способ оплаты:</p>--}}
{{--                            <div class="radio-group">--}}
{{--                                <label>--}}
{{--                                    <input type="radio" name="payment_option" value="cash" checked>--}}
{{--                                    <span>Наличный расчет в точке самовывоза</span>--}}
{{--                                </label>--}}
{{--                                <label>--}}
{{--                                    <input type="radio" name="payment_option" value="card">--}}
{{--                                    <span>Безналичный расчет картой</span>--}}
{{--                                </label>--}}
{{--                                <label>--}}
{{--                                    <input type="radio" name="payment_option" value="kaspi_qr">--}}
{{--                                    <span>Оплата Kaspi QR (kaspi gold, kaspi рассрочка, kaspi red)</span>--}}
{{--                                </label>--}}
{{--                                <label>--}}
{{--                                    <input type="radio" name="payment_option" value="remote">--}}
{{--                                    <span>Удаленная оплата</span>--}}
{{--                                </label>--}}
{{--                            </div>--}}

                            <button id="checkout" class="btn-checkout">Оформить заказ</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{--


                <div class="cart-footer">
                    <div class="div">
                        <button id="clear-cart" class="btn-clear">Очистить корзину</button>
                        <div class="cart-form">

                            <label for="customer-name">ФИО:</label>
                            <input type="text" id="customer-name" placeholder="Введите ваше имя">

                            <label for="customer-phone">Телефон:</label>
                            <input type="tel" id="customer-phone" placeholder="Введите номер телефона">
                            <button id="checkout" class="btn-checkout">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



--}}
