@extends('layouts.app')

@section('title')Результаты теста@endsection

@section('container')
<header class="header result-layout-header bg-white">
    <div class="container-fluid">
        <div class="top d-flex justify-content-between align-items-center justify-content-start">
            <h3 class="h3 top-l">
                {{$test->myTest->test->name}}
            </h3>
            <!-- Check state test-->
            <div class="top-r">
                <div class="account-link">
                    <a href="{{route('account_profile')}}" class="btn btn-primary base-text-medium btn-md text-white">
                        В личный кабинет
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="result-layout-content bg-blue-100">
    
<div class="result-page">
<div class="container-fluid">
    <div class="result d-flex align-items-start justify-content-between">
        <!-- Результат прохождения теста с левой стороны -->
        <div class="card result-left bg-white">
            
<div class="result-info">
<h4 class="h4 card-title">
    Результат теста
</h4>
<div class="card-body">
    <div class="h6 card-text text-slate-500 mb-8 mr-2">
        Вы ответили на
        <span>
            18
        </span>
        вопросов из
        <span>
            20
        </span> <br/>
        Ответили верно на
        <span>
            90%            </span>
        вопросов<br/>
        Среднее время ответа на вопрос: <span>01:15</span><br/>
        Лучше вас ответило
        <span>
            15%            </span> пользователей<br/>
    </div>
    <div>
        <h4 class="card-subtitle h4">
            Ваш результат:
        </h4>
        <div class="result-diagram position-relative d-flex justify-content-center">
            <h2 class="h2 position-absolute top-50">
                90%                </h2>
            <canvas id="myResult"></canvas>
        </div>
        <button class="improve-result btn btn-danger btn-md">
            Улучшить результат
        </button>
        <a href="my-profile.html" class="account-link btn btn-primary">
            В личный кабинет
        </a>
    </div>
</div>
</div>

<script type="text/javascript">
// инстэнс пончик
const ctx = document.getElementById("myResult");
new Chart(ctx, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: " Результат - ",
                data: [90, 10],
                backgroundColor: ["#06C270", "transparent"],
                hoverOffset: 4,
                borderRadius: 8,
                borderWidth: 2,
            }
        ]
    },
    options: {
        cutout: "80%",
        tooltips : {
            position: "nearest"
        },
    }
});
</script>
        </div>
        <!-- Прогресс бар с правой стороны (Включает: Прогресс и статистику && Сравнительную линейную диаграмму) -->
        <div class="result-right w-75">
            
<div class="progress mb-6 bg-white">
<div class="progress-wrapper">
    <div class="progress-line mb-2">
        <div
            class="progress-bar progress-bar-striped bg-green-500"
            style="width: 90%"
            role="progressbar"
            aria-valuenow="90"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <h3 class="h3">
                90%
            </h3>
        </div>
    </div>
    <div class="progress-line">
        <div
            class="progress-bar progress-bar-striped bg-blue-200"
            role="progressbar"
            style="width: 65%"
            aria-valuenow="65"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <h3 class="h3">
                65%
            </h3>
        </div>
    </div>
</div>
<div class="progress-label">
    <div class="progress-label-mark">
        <span></span>
        Ваш результат
    </div>
    <div class="progress-label-mark">
        <span></span>
        Средний результат всех пользователей
    </div>
</div>
</div>
            <div class="comparison-chart bg-white p-8">
<h6 class="h6 text-center">
    Результаты по видам задач теста
</h6>
<div class="wrapper">
    <canvas style="max-width: 635px; max-height: 134px;" id="myResultBar" class="my-result-bar"></canvas>
    <ul class="values list">
        <li>
            Пропорции
        </li>
        <li>
            Задачи на проценты
        </li>
        <li>
            Интерпретация графиков
        </li>
        <li>
            Операции с акциями
        </li>
    </ul>
    <div class="progress-label">
        <div class="progress-label-mark mr-6">
            <span></span>
            Ваш результат
        </div>
        <div class="progress-label-mark">
            <span></span>
            Максимально возможный результат
        </div>
    </div>
</div>
</div>

<script>
/** Инициализация вертикального прогресс бара (сгруппированная сравнительная диаграмма */
const data = {
    labels: [ "Пропорции", "Задачи на проценты", "Интерпретация графиков", "Операции с акциями" ],
    datasets: [
        {
            label: "Ваш результат",
            type: 'bar',
            data: [110, 70, 110, 40, 35],
            backgroundColor: [ "#06C270" ],
            categoryPercentage: 0.5,
            barPercentage: 0.7
        },
        {
            label: "Максимально возможный результат",
            type: 'bar',
            data: [70, 110, 110, 50, 70],
            backgroundColor: [ "#8FCBF5" ],
            categoryPercentage: 0.5,
            barPercentage: 0.7
        }
    ]
};
const bar = document.getElementById("myResultBar");
new Chart(bar, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    lineWidth: 0
                },
                title: {
                    display: false,
                },
                ticks: {
                    display: false
                }
            },
            x: {
                grid: {
                    lineWidth: 0
                },
                title: {
                    display: false
                },
                ticks: {
                    display: false
                }
            }
        },
        CoreScaleOptions: {
            CartesianScaleOptions: {
                display: false,
            }
        },
        plugins: {
            legend: {
                display: false
            },
            labels: {
                display: false
            },
            tooltips: {
                mode: false,
            },
            categoryPercentage: 1,
            ticks: {
                display: false
            }
        }
    }
});
</script>
        </div>
    </div>
    <!-- Постраничная пагинация теста с результатами ответов -->
    <div class="pagination-wrapper mb-10">
        
<ul class="pagination-tabs pagination d-flex">
                    <li class="page-item">
            <a
                class="page-link completed"
                href="#1"
            >
                1                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed-mistake"
                href="#2"
            >
                2                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#3"
            >
                3                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#4"
            >
                4                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed-mistake"
                href="#5"
            >
                5                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#6"
            >
                6                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#7"
            >
                7                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#8"
            >
                8                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#9"
            >
                9                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed-mistake"
                href="#10"
            >
                10                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#11"
            >
                11                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed-mistake"
                href="#12"
            >
                12                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#13"
            >
                13                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#14"
            >
                14                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#15"
            >
                15                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed-mistake"
                href="#16"
            >
                16                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#17"
            >
                17                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#18"
            >
                18                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed"
                href="#19"
            >
                19                </a>
        </li>
                <li class="page-item">
            <a
                class="page-link completed-mistake"
                href="#20"
            >
                20                </a>
        </li>
        </ul>

    </div>
    <!-- Контент вопроса и варианты -->
    <div class="test-layout-content  results-question-info d-flex align-items-start justify-content-between">
        <!-- Блок с контентом вопроса (Диаграмма || Текстовый) -->
        
<!-- Если тип контента диаграмма или текст -->
<div class="test-block-content col-lg-7 col-md-5 d-flex align-items-center flex-column bg-white py-8 px-6">
        <h6 class="h6">
        Вы смотрите видео об уникальном аппарате, который позволяет предсказывать выпадение красного или черного при игре в рулетку. Для демонстрации, вам показали, как игрок с этим аппаратом заходит в пять разных казино, и пять раз выигрывает. Допустим, у вас нет сомнений в том, что видео подлинные. Какую проблему можно усмотреть в этом видео?        </h6>

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

        <!-- Блок с вариантами ответов (Чекбокс || Радиокнопка), (Правильный && Выбранный ответ)-->
        
<div class="test-block-question question completed-test bg-white">
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
            disabled
            checked
            id="0,91 : 1__0"
            value="0,91 : 1"
            class="custom-control-input error-variant"
        >
        <label class="custom-control-label"  for="0,91 : 1__0">
            0,91 : 1
        </label>
    </div>
</li>

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            disabled
            checked
            id="0,93 : 1__1"
            value="0,93 : 1"
            class="custom-control-input success-variant"
        >
        <label class="custom-control-label"  for="0,93 : 1__1">
            0,93 : 1
        </label>
    </div>
</li>

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            disabled
            
            id="0,9 : 1__2"
            value="0,9 : 1"
            class="custom-control-input "
        >
        <label class="custom-control-label"  for="0,9 : 1__2">
            0,9 : 1
        </label>
    </div>
</li>

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                        <!-- Проверка на статус теста (Активный тест) -->
<li class="list-group-item mr-auto p-0 border-0">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            disabled
            
            id="0,95 : 1__3"
            value="0,95 : 1"
            class="custom-control-input "
        >
        <label class="custom-control-label"  for="0,95 : 1__3">
            0,95 : 1
        </label>
    </div>
</li>

<script>
document.querySelector(".error-variant").indeterminate = true;
</script>
                                            </ul>
        <!-- Проверка на тип теста (Пройденный или активный) -->
                        <div class="question-button-group navigation d-flex justify-content-between">
                <button class="btn btn-primary btn-md">
                    Предыдущий
                </button>
                <button class="btn btn-primary btn-md">
                    Следующий
                </button>
            </div>
                </div>
</div>
</div>
    </div>
    <!-- Ответ на вопрос -->
    <div class="results-answer">
        
<div class="card answer rounded-8px border-0">
<h4 class="h4 card-header bg-white text-black-color border-0" id="staticBackdropLabel">
    Решение вопроса
</h4>
<div class="card-body bg-white large-text text-slate-500 border-0 p-0 my-6">
    Какое соотношение студентов будет, если каждый Вуз будет принимать по 120 студентов каждый год    </div>
<div class="card-footer bg-white d-flex align-items-end justify-content-start border-0 p-0">
    <h5 class="h5 text-black-color mr-8">
        Ответ:
    </h5>
    <div class="answer-text large-text text-slate-300 px-6">
        0,93 : 1        </div>
</div>
</div>
        <button class="improve-result btn btn-danger btn-md">
            Улучшить результат
        </button>
    </div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/helpers.min.js"></script>
@endsection