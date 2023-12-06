@extends('layouts.app')

@section('title'){{$test->myTest->test->name}}@endsection

@section('container')
<header class="header test-layout-header bg-white">
    <div class="container-fluid">
        <div class="header-top">
            <h3 class="h3 header-title">
                {{$test->myTest->test->name}}
            </h3>
            <div class="header-actions">
                    @if ($withTimer)
                    <div class="timer">
                        <img src="{{asset('images/timer-icon.svg')}}" alt="Timer icon">
                        <h5 class="h5 text-black-color" id="timer">
                            14:23
                        </h5>
                    </div>
                    @endif
                <button
                    class="complete-button btn btn-danger btn-md"
                    id="completeTest"
                    data-toggle="modal"
                    data-target="#infoDialog-complete"
                >
                    Завершить тест
                </button>
            </div>
        </div>
        <div class="header-bottom">
            
<ul class="pagination-tabs pagination d-flex">
                    <li class="page-item">
            <a
                class="page-link running active"
                href="#"
            >
                1                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                2                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                3                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                4                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                5                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                6                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                7                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                8                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                9                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                10                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                11                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                12                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                13                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                14                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                15                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                16                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                17                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                18                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                19                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link running"
                href="#"
            >
                20                </a>
        </li>
        </ul>

        </div>
    </div>
</header>
<div class="test-layout-content bg-blue-100">
    
<div class="container-fluid">
<div class="content d-flex align-items-start justify-content-between">
    <!-- Блок с контентом вопроса (Диаграмма || Текстовый) -->
    
<!-- Если тип контента диаграмма или текст -->
<div class="test-block-content col-lg-7 col-md-5 d-flex align-items-center flex-column bg-white py-8 px-6">
        <h6 class="text-center">
        Кандидаты на поступление        </h6>
    <div class="diagrams d-flex">
                        <div class="diagram d-flex flex-column">
                <div class="diagram-container">
                    <canvas id="pieDiagram"></canvas>
                </div>
                <ul class="diagram-label list-group">
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-blue-500 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-red-300 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-green-400 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-yellow-500 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-turquoise-500 base-text"></span>
                            Количество учеников                            </li>
                                        </ul>
            </div>
                        <div class="diagram d-flex flex-column">
                <div class="diagram-container">
                    <canvas id="pieDiagram"></canvas>
                </div>
                <ul class="diagram-label list-group">
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-blue-500 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-red-300 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-green-400 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-yellow-500 base-text"></span>
                            Количество учеников                            </li>
                                                <li class="list-group-item p-0 border-0 d-flex align-items-center mb-1">
                            <span class="bg-turquoise-500 base-text"></span>
                            Количество учеников                            </li>
                                        </ul>
            </div>
                </div>

</div>

<script type="module">
/** Диаграммы 2, поэтому цикл */
let ctxArr = Array.from(document.querySelectorAll("#pieDiagram"));
if(ctxArr) {
    ctxArr.forEach(ctx => {
        new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [
                    {
                        label: "Количество учеников",
                        data: [10, 11, 36, 18, 15],
                        backgroundColor: ["#0E6FB6", "#E31243", "#0EB61F", "#E0E400", "#00D3C7"],
                        hoverOffset: 4
                    },
                ]
            },
            options: {
                responsive: true,
                rotation: -20,
                labels: false,
                plugins: {
                    datalabels: {
                        color: "#fff",
                        formatter: function (value) {
                            return Math.round(value) + "%";
                        },
                        font: {
                            weight: 'bold',
                            size: 12,
                        },
                        padding: {
                            top: 10,
                            bottom: 100,
                        }
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            },
            plugins: [ChartDataLabels],
        });
    })
}
</script>

    <!-- Блок с вариантами ответов (Чекбокс || Радиокнопка), (Правильный && Выбранный ответ) -->
    
<div class="test-block-question question active-test bg-white">
<h4 class="h4">
    Вопрос 1
</h4>
<div class="question-text large-text text-slate-500 mt-6 my-6">
    Какое соотношение студентов будет, если каждый Вуз будет принимать по 120 студентов каждый год    </div>
<div class="question-content large-text">
    <div class="question-title">
        Варианты ответа:
    </div>
    <div class="form-check flex-column mr-0">
        <ul class="question-variants list-group d-flex flex-column justify-content-start align-items-start mb-6">
            <!-- Проверка на тип вопроса (Множественный или одиночный выбор) -->
                                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            value="0,91 : 1"
            id="0,91 : 1__0"
            class="custom-control-input input-variant"
        >
        <label class="custom-control-label"  for="0,91 : 1__0">
            0,91 : 1
        </label>
    </div>
</li>
<!-- Проверка на статус теста (Завершенный тест) -->

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            value="0,93 : 1"
            id="0,93 : 1__1"
            class="custom-control-input input-variant"
        >
        <label class="custom-control-label"  for="0,93 : 1__1">
            0,93 : 1
        </label>
    </div>
</li>
<!-- Проверка на статус теста (Завершенный тест) -->

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            value="0,9 : 1"
            id="0,9 : 1__2"
            class="custom-control-input input-variant"
        >
        <label class="custom-control-label"  for="0,9 : 1__2">
            0,9 : 1
        </label>
    </div>
</li>
<!-- Проверка на статус теста (Завершенный тест) -->

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            value="0,95 : 1"
            id="0,95 : 1__3"
            class="custom-control-input input-variant"
        >
        <label class="custom-control-label"  for="0,95 : 1__3">
            0,95 : 1
        </label>
    </div>
</li>
<!-- Проверка на статус теста (Завершенный тест) -->

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                            </ul>
        <!-- Проверка на тип теста (Пройденный или активный) -->
                        <div class="question-button-group d-flex justify-content-between">
                <button class="btn btn-md disabled" id="submitAnswer" disabled>
                    Ответить
                </button>
                <button class="btn btn-md" data-toggle="modal" data-target="#answerDialog">
                    Решение
                </button>
            </div>
                </div>
</div>
</div>
    <!-- Ответ на вопрос в виде Модального (С картинкой || текстовый) -->
    
<div
class="modal fade"
id="answerDialog"
tabindex="-1"
role="dialog"
aria-labelledby="answerDialogLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content px-6 py-8" style="max-width: 348px;">
        <div class="modal-header d-flex flex-column justify-content-between border-0 p-0 mb-6">
            <button type="button" class="close ml-auto p-0" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="h4 modal-title text-black-color" id="staticBackdropLabel">
                Решение вопроса
            </h4>
        </div>
        <!-- Если в ответе есть картинка -->
                        <div class="answer-image mb-6">
                <img src="{{asset('images/answer-picture.jpg')}}" alt="answer illustration">
            </div>
                    <div class="modal-body large-text text-slate-500 p-0 mb-6">
            Какое соотношение студентов будет, если каждый Вуз будет принимать по 120 студентов каждый год            </div>
        <div class="modal-footer align-items-end justify-content-start border-0 p-0">
            <h5 class="h5 text-black-color mr-8">
                Ответ:
            </h5>
            <div class="answer large-text text-slate-300 m-0 px-6">
                0,93 : 1                </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
    <!-- Модалка на кнопку завершения теста -->
    
<div
id="infoDialog-complete"
class="modal fade"
tabindex="-1"
role="dialog"
aria-labelledby="answerDialogLabel"
aria-hidden="true"
>
<!-- Вариант модалки на начала тестирования -->
        <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
        <!-- Модалка по окончанию теста -->
        <div class="modal-content complete-test py-8 px-6">
            <div class="modal-header d-flex flex-column align-items-end justify-content-between border-0 p-0 mb-6">
                <button type="button" class="close ml-auto p-0 mr-6" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="h4 modal-title w-100 text-black-color m-0">
                    Вы ответили не на все вопросы                    </h4>
            </div>
            <div class="modal-body large-text text-slate-500 p-0 mb-8">
                Если вы завершите тест сейчас, то ответы на оставшиеся вопросы будут помечены как неправильные!  <br/>
                 Завершить тест?                </div>
            <div class="modal-footer d-flex align-items-end justify-content-start border-0 p-0">
                    <button type="submit" class="btn btn-danger" onclick="location.href='{{route('completeTest', ['id' => $test->id])}}';">
                        Завершить тест
                    </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                    Отмена
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/helpers.min.js"></script>
@endsection