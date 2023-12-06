@extends('layouts.app')

@section('title')Мои тесты@endsection

@section('container')
<div class="account-layout">
        
    @include('inc.aside')
            
                <div class="account-layout-content w-100 bg-white" id="contentSide">
                    <button class="toggle-nav-btn bg-white" id="toggleMenuButton">
                        <img src="{{asset('./images/nav-toggle-icon.svg')}}" alt="toggle navigation button">
                    </button>
                    
    <div class="my-tests-page">
        <h4 class="h4">
           Мои тесты
        </h4>
        <div class="my-tests-list">
            <div class="test-tabs-wrapper">
        <ul class="nav nav-tabs test-tabs">
            @if (!isset($choose_category))
                Тестов нет
            @else
            <li class="nav-item">
                <a class="active nav-link" href="">
                    {{$choose_category->name}}                    
                </a>
            </li>
                    
            @foreach ($categories as $item)
            <li class="nav-item">
                <a class="nav-link" href="{{route('account_tests', ['category' => $item->id])}}">
                    {{$item->name}}                    
                </a>
            </li>
            @endforeach
            @if ($categories_hidden->count() > 0)               
            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    href="#"
                    role="button" aria-expanded="false"
                >Ещё</a>
                <div class="dropdown-menu">
                    @foreach ($categories_hidden as $item)
                    <a class="dropdown-item " href="{{route('account_tests', ['category' => $item->id])}}">
                            {{$item->name}}                            
                    </a>
                    @endforeach
                </div>
            </li>
            @foreach ($categories_hidden as $item)
            <li class="hidden-items nav-item">
                <a class="nav-link" href="{{route('account_tests', ['category' => $item->id])}}">
                    {{$item->name}}                        
                </a>
            </li>
            @endforeach
            @endif
            @endif                              
        </ul>
    </div>
    
            <!-- Рендер карточки с информацией о тесте, внутри рендерится модальное с информацией о тесте -->
    @foreach ($tests as $test)
        @foreach ($test->myTest as $myTest)
            @if ($myTest->myTestAnswer->count() == 0)
            <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
                <div class="card-body d-flex justify-content-between">
                    <div class="card-left d-flex flex-column justify-between">
                        <div class="card-left__top d-flex align-items-top">
                            <div class="text-orange-500 test-status">
                                <img src="{{asset('./images/test-status-warning.svg')}}" alt="Test status">
                                <span>
                                    Тест еще не решался
                                </span>
                            </div>
                            {{-- <div class="test-score text-slate-500">
                                3 балла.
                            </div> --}}
                        </div>
                        <div class="card-left__middle d-flex">
                            <h5 class="h5 card-title">
                                {{$test->name}}                
                            </h5>
                            <span class="test-type card-text text-slate-500">
                                {{$test->type}}                </span>
                        </div>
                        <div class="card-left__bottom  d-flex">
                            <div class="test-period card-text text-slate-500 d-flex align-items-center">
                                <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                                <span class="card-text">
                                 с {{(new Datetime($myTest->date_start))->format('d.m.y')}}  до {{(new Datetime($myTest->date_end))->format('d.m.y')}}
                            </span>
                            </div>
                            <div class="test-timer card-text d-flex align-items-center text-slate-500">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                                <span class="card-text">
                                    {{$test->time}} мин.                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-right d-flex">
                        <h6 class="h6">
                            0/{{$test->attempt_count}} попыток
                        </h6>
                        <button
                            class="btn btn-primary btn-standart"
                            data-toggle="modal"
                            data-target="#infoDialog-3"
                        >
                            Начать
                        </button>
                    </div>
                </div>
            </div>
            
            
            <div
                id="infoDialog-3"
                class="modal fade"
                tabindex="-1"
                role="dialog"
                aria-labelledby="answerDialogLabel"
                aria-hidden="true"
            >
                <!-- Вариант модалки на начала тестирования -->
                        <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                        <div class="modal-content start-test p-6">
                            <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                                <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                        {{$test->name}}                        </h4>
                                </div>
                                <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                                    <div class="info-timer d-flex align-items-center">
                                        <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                        <span class="text-center">15 мин.</span>
                                    </div>
                                    <div class="info-question">
                                        20 вопросов
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body large-text text-slate-500 p-0 mb-8">
                                {{$test->description}}
                            </div>
                            <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                                <a href="{{route('newTestWithTimer', ['id' => $myTest->id])}}" type="button" class="btn btn-primary btn-md">
                                    Пройти с таймером
                                </a>
                                <a href="{{route('newTestWithoutTimer', ['id' => $myTest->id])}}" type="button" class="btn btn-primary btn-md">
                                    Пройти без таймера
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            @endif
            @foreach ($myTest->myTestAnswer as $myTestAnswer)
            <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
                <div class="card-body d-flex justify-content-between">
                    <div class="card-left d-flex flex-column justify-between">
                        <div class="card-left__top d-flex align-items-top">
                            @if ($myTestAnswer->status == 'new')
                            <div class="text-orange-500 test-status">
                                <img src="{{asset('./images/test-status-warning.svg')}}" alt="Test status">
                                <span>
                                    Тест не завершен
                                </span>
                            </div>
                            @endif
                            @if ($myTestAnswer->status == 'passed')
                            <div class="text-green-500 test-status">
                                <img src="{{asset('./images/test-status-success.svg')}}" alt="Test status">
                                <span>
                                    Тест пройден
                                </span>
                            </div>
                            @endif
                            @if ($myTestAnswer->status == 'failed')
                            <div class="text-red-500 test-status">
                                <img src="{{asset('./images/test-status-error.svg')}}" alt="Test status">
                                <span>
                                    Тест не пройден
                                </span>
                            </div>
                            @endif
                            </div>
                            @if ($myTestAnswer->status != 'new')
                            <div class="test-score text-slate-500">
                                10 баллов.
                            </div>
                            @endif
                        <div class="card-left__middle d-flex">
                            <h5 class="h5 card-title">
                                @if ($myTestAnswer->status != 'new')
                                    <a href="{{route('result', ['id' => $myTestAnswer->id])}}">{{$test->name}}</a> 
                                @else 
                                    {{$test->name}}
                                @endif             
                            </h5>
                            <span class="test-type card-text text-slate-500">
                                {{$test->type}}                </span>
                        </div>
                        <div class="card-left__bottom  d-flex">
                            <div class="test-period card-text text-slate-500 d-flex align-items-center">
                                <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                                <span class="card-text">
                                 с {{(new Datetime($myTest->date_start))->format('d.m.y')}}  до {{(new Datetime($myTest->date_end))->format('d.m.y')}}
                            </span>
                            </div>
                            <div class="test-timer card-text d-flex align-items-center text-slate-500">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                                <span class="card-text">
                                    {{$test->time}} мин.                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-right d-flex">
                        <h6 class="h6">
                            {{$myTest->myTestAnswer->count()}}/{{$test->attempt_count}} попыток
                        </h6>
                        <button
                            class="btn btn-primary btn-standart"
                            data-toggle="modal"
                            data-target="#infoDialog-{{$myTest->id}}-{{$myTestAnswer->id}}"
                            @if ($myTestAnswer->status != 'new' && $myTest->myTestAnswer->count() >= $test->attempt_count)
                            disabled
                            @endif
                        >
                            @if ($myTestAnswer->status == 'new')
                                Продолжить
                            @else
                                @if ($myTest->myTestAnswer->count() >= $test->attempt_count)
                                    Нет попыток
                                @else 
                                    Пройти заново
                                @endif
                            @endif
                        </button>
                    </div>
                </div>
            </div>
            
            
            <div
                id="infoDialog-{{$myTest->id}}-{{$myTestAnswer->id}}"
                class="modal fade"
                tabindex="-1"
                role="dialog"
                aria-labelledby="answerDialogLabel"
                aria-hidden="true"
            >
                <!-- Вариант модалки на начала тестирования -->
                        <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                        <div class="modal-content start-test p-6">
                            <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                                <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                         {{$test->name}}                        </h4>
                                </div>
                                <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                                    <div class="info-timer d-flex align-items-center">
                                        <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                        <span class="text-center">{{$test->time}} мин.</span>
                                    </div>
                                    <div class="info-question">
                                        20 вопросов
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body large-text text-slate-500 p-0 mb-8">
                                {{$test->description}}
                            </div>
                            <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                                @if ($myTestAnswer->status == 'new')
                                <a href="{{route('testWithTimer', ['id' => $myTestAnswer->id])}}" type="button" class="btn btn-primary btn-md">
                                    Пройти с таймером
                                </a>
                                <a href="{{route('testWithoutTimer', ['id' => $myTestAnswer->id])}}" type="button" class="btn btn-primary btn-md">
                                    Пройти без таймера
                                </a>
                                @else
                                <a href="{{route('newTestWithTimer', ['id' => $myTest->id])}}" type="button" class="btn btn-primary btn-md">
                                    Пройти с таймером
                                </a>
                                <a href="{{route('newTestWithoutTimer', ['id' => $myTest->id])}}" type="button" class="btn btn-primary btn-md">
                                    Пройти без таймера
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endforeach  
    {{-- <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-green-500 test-status">
                        <img src="{{asset('./images/test-status-success.svg')}}" alt="Test status">
                        <span>
                            Тест пройден
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        10 баллов.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-1"
                >
                    Пройти повторно
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-1"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 1                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        1 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-1" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-1" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div> 

    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-light-red-500 test-status">
                        <img src="{{asset('./images/test-status-error.svg')}}" alt="Test status">
                        <span>
                            Тест не пройден
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-2"
                >
                    Пройти повторно
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-2"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
            <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 2                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        2 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-2" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-2" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>                    
    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-orange-500 test-status">
                        <img src="{{asset('./images/test-status-warning.svg')}}" alt="Test status">
                        <span>
                            Тест не завершен
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста 3                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-3"
                >
                    Продолжить
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-3"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 3                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        3 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-3" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-3" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>                    
    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-orange-500 test-status">
                        <img src="{{asset('./images/test-status-warning.svg')}}" alt="Test status">
                        <span>
                            Тест не завершен
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста 4                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-4"
                >
                    Продолжить
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-4"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 4                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        4 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-4" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-4" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>                    
    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-orange-500 test-status">
                        <img src="{{asset('./images/test-status-warning.svg')}}" alt="Test status">
                        <span>
                            Тест не завершен
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста 5                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-5"
                >
                    Продолжить
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-5"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 5                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        5 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-5" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-5" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>                    
    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-green-500 test-status">
                        <img src="{{asset('./images/test-status-success.svg')}}" alt="Test status">
                        <span>
                            Тест пройден
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста 6                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-6"
                >
                    Пройти повторно
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-6"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 6                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        6 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-6" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-6" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>                    
    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-green-500 test-status">
                        <img src="{{asset('./images/test-status-success.svg')}}" alt="Test status">
                        <span>
                            Тест пройден
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста 7                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-7"
                >
                    Пройти повторно
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-7"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 7                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        7 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-7" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-7" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>                    
    <div class="test card d-flex flex-row align-items-center bg-blue-100 mr-auto">
        <div class="card-body d-flex justify-content-between">
            <div class="card-left d-flex flex-column justify-between">
                <div class="card-left__top d-flex align-items-top">
                    <div class="text-light-red-500 test-status">
                        <img src="{{asset('./images/test-status-error.svg')}}" alt="Test status">
                        <span>
                            Тест не пройден
                        </span>
                    </div>
                    <div class="test-score text-slate-500">
                        3 балла.
                    </div>
                </div>
                <div class="card-left__middle d-flex">
                    <h5 class="h5 card-title">
                        Наименование теста 8                </h5>
                    <span class="test-type card-text text-slate-500">
                        Тип теста                </span>
                </div>
                <div class="card-left__bottom  d-flex">
                    <div class="test-period card-text text-slate-500 d-flex align-items-center">
                        <img src="{{asset('images/test-period-date.svg')}}"  alt="Period test">
                        <span class="card-text">
                         с 10.11.22  до 10.01.23
                    </span>
                    </div>
                    <div class="test-timer card-text d-flex align-items-center text-slate-500">
                        <img src="{{asset('images/test-time.svg')}}" alt="Timer">
                        <span class="card-text">
                            15 мин.                    </span>
                    </div>
                </div>
            </div>
            <div class="card-right d-flex">
                <h6 class="h6">
                    1/3 попыток
                </h6>
                <button
                    class="btn btn-primary btn-standart"
                    data-toggle="modal"
                    data-target="#infoDialog-8"
                >
                    Пройти повторно
                </button>
            </div>
        </div>
    </div>
    
    
    <div
        id="infoDialog-8"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="answerDialogLabel"
        aria-hidden="true"
    >
        <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                <div class="modal-content start-test p-6">
                    <div class="modal-header info d-flex flex-column border-0 p-0 mb-6">
                        <div class="info-top w-100 d-flex flex-column align-items-end justify-content-between">
                            <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 text-black-color mb-2" id="staticBackdropLabel">
                                 Наименование теста 8                        </h4>
                        </div>
                        <div class="info-bottom d-flex align-items-center justify-content-between text-slate-500">
                            <div class="info-timer d-flex align-items-center">
                                <img src="{{asset('images/test-time.svg')}}" alt="Timer icon" class="mr-2">
                                <span class="text-center">15 мин.</span>
                            </div>
                            <div class="info-question">
                                20 вопросов
                            </div>
                        </div>
                    </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-8">
                        8 Тест Холланда - крайне популярный тест на профориентацию от известного профессора из США. Широко известен и часто используется как в России, так и других странах. Определяет 6 профессионально-ориентированных типов личности. Подходит для школьников, выпускников и взрослых людей.                </div>
                    <div class="modal-footer align-items-end justify-content-start border-0 p-0">
                        <a href="test-page.html?with-timer-test-8" type="button" class="btn btn-primary btn-md">
                            Пройти с таймером
                        </a>
                        <a href="test-page.html?without-timer-test-8" type="button" class="btn btn-primary btn-md">
                            Пройти без таймера
                        </a>
                    </div>
                </div>
            </div>
        </div>            </div>
    </div> --}}
    
                </div>
            </div>
        </div>
@endsection