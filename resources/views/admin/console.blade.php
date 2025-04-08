@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="console-board">
            <i class="fas fa-file-alt" style="color:white"> Страницы</i>
            <i class="fas fa-box" style="color:white">Товары</i>
        </div>
        <div class="console">
        </div>
    </div>
@endsection
<style>
    .console-board {
        width: 120px;
        height: 100%;
        background-color: #212121;
        flex-wrap: wrap;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .console-board i {
        padding: 10px;
    }
</style>