@extends('layouts.main')
@section('title', 'Преимущества сделать заказать в indigoshop.kz')
@section('description', 'Купить профессиональные инструменты и аксессуары для парикмахеров, барберов и колористов в Алматы. Доставка, низкие цены, широкий ассортимент.')

@section('content')
    <style>
        .program-container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
            font-family: 'Arial', sans-serif;
        }

        .program-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .program-header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .program-section {
            margin-bottom: 40px;
        }

        .program-section h2 {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: #7b1fa2;
        }

        .program-section ul {
            list-style: none;
            padding: 0;
        }

        .program-section li {
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .program-section li i {
            margin-right: 10px;
            color: #7b1fa2;
        }

        .highlight {
            background: #f3e5f5;
            padding: 20px;
            border-left: 6px solid #7b1fa2;
            margin-bottom: 30px;
        }

        .price-section {
            text-align: center;
            padding: 30px;
            background-color: #B1192E;
            color: white;
            border-radius: 8px;
        }

        .price-section h3 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .price-section p {
            font-size: 1.2em;
            margin: 0;
            color: #212121;
        }

        @media (max-width: 768px) {
            .program-header h1 {
                font-size: 2em;
            }

            .program-section h2 {
                font-size: 1.4em;
            }

            .price-section h3 {
                font-size: 1.6em;
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <div class="program-container">
        <div class="program-header">
            <h1><i class="fas fa-heart"></i> Любимое дело</h1>
            <p>Социальный проект для мам особенных детей</p>
        </div>

        <div class="highlight">
            <p>Этот благотворительный курс поможет вам получить востребованную профессию в индустрии красоты и начать
                зарабатывать уже через 1.5 месяца обучения от 300к.</p>
        </div>

        <div class="program-section">
            <h2><i class="fas fa-gift"></i> Что вы получаете</h2>
            <ul>
                <li><i class="fas fa-check-circle"></i> Индивидуальные рекомендации по инструментам и брендам</li>
                <li><i class="fas fa-briefcase"></i> Поддержка в трудоустройстве от Академии</li>
                <li><i class="fas fa-sync-alt"></i> Повторное обучение за счёт Академии (при соблюдении условий)</li>
                <li><i class="fas fa-coins"></i> Средний доход выпускников — от 300 000 ₸</li>
            </ul>
        </div>

        <div class="program-section">
            <h2><i class="fas fa-user-check"></i> Кому подойдёт курс</h2>
            <ul>
                <li><i class="fas fa-globe"></i> Тем, кто хочет работать по всему миру</li>
                <li><i class="fas fa-heart"></i> Женщинам, желающим заниматься любимым делом</li>
                <li><i class="fas fa-child"></i> Мамам в декрете, нуждающимся в гибком графике</li>
                <li><i class="fas fa-question-circle"></i> Тем, у кого остались вопросы после других курсов</li>
                <li><i class="fas fa-store"></i> Тем, кто хочет открыть собственный салон</li>
                <li><i class="fas fa-hands-helping"></i> Женщинам, попадающим под условия благотворительного проекта</li>
            </ul>
        </div>

        <div class="program-section">
            <h2><i class="fas fa-calendar-alt"></i> Формат обучения</h2>
            <ul>
                <li><i class="fas fa-clock"></i> 1,5 месяца — 32 занятия</li>
                <li><i class="fas fa-calendar-week"></i> 5 раз в неделю по 4 часа (при колористике — по 6)</li>
                <li><i class="fas fa-book-open"></i> 80% практики + углублённая теория</li>
                <li><i class="fas fa-certificate"></i> Выдаётся именной сертификат</li>
            </ul>
        </div><!-- Блок: Курс Парикмахер-колорист -->
        <div class="program-section">
            <h2><i class="fas fa-cut"></i> Курс "Парикмахер-колорист"</h2>
            <ul>
                <li><i class="fas fa-scissors"></i> Коммерческие женские и мужские стрижки — 12 моделей</li>
                <li><i class="fas fa-palette"></i> Углублённая колористика: коррекция цвета, нейтрализация пигмента, техники
                    окрашивания</li>
                <li><i class="fas fa-wind"></i> 6 коммерческих укладок: брашинг, щипцы, стайлеры</li>
                <li><i class="fas fa-spa"></i> Перманентная завивка + SPA-уходы и реконструкция волос</li>
            </ul>
            <div class="highlight">
                <p><strong>График:</strong> 1,5 месяца, 32 занятия по 4–6 часов, 80% практики, сертификат</p>
            </div>
            <div class="price-section">
                <a href="https://pokhlebaeva.pro/proekt" target="_blank" style="text-decoration: none; color: inherit;">
                    <h3><del>500 000 ₸</del> <br> Бесплатно</h3>
                    <p>Полная программа курса — по социальной программе</p>
                </a>
            </div>
            <p>по кнопке переходите на сайт программы для оформления заявки.</p>

        </div>

        <!-- Блок: Базовый курс Маникюра и Педикюра -->
        <div class="program-section">
            <h2><i class="fas fa-hand-sparkles"></i> Курс "Маникюр и Педикюр"</h2>
            <ul>
                <li><i class="fas fa-hand-holding-heart"></i> Комбинированный и японский маникюр</li>
                <li><i class="fas fa-brush"></i> Покрытие под кутикулу + идеальный блик</li>
                <li><i class="fas fa-nail-polish"></i> Архитектура ногтей, френч, реставрация, SPA-уход</li>
                <li><i class="fas fa-spa"></i> Эстетический педикюр + работа с аппаратной техникой</li>
                <li><i class="fas fa-camera"></i> Урок фотосъёмки, чек-листы по бренду, Instagram, и ценообразованию</li>
            </ul>
            <div class="highlight">
                <p><strong>График:</strong> 6 занятий по 6–8 часов + 9 практик на моделях</p>
            </div>
            <div class="price-section">
                <a href="https://pokhlebaeva.pro/proekt" target="_blank" style="text-decoration: none; color: inherit;">

                    <h3><del>172 000 ₸</del> <br> Бесплатно</h3>
                    <p>По социальной программе — обучение бесплатно</p>
                </a>
            </div>
            <p>по кнопке переходите на сайт программы для оформления заявки.</p>

        </div>
    </div>

@endsection