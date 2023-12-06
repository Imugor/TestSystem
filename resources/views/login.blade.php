@extends('layouts.app')

@section('title')Test System | Главная@endsection

@section('container')<div class="main-page background">
    <div class="container-fluid">
        <div class="main-page-content">
            <!-- Форма входа && Логотип -->
            <form action="{{route('login')}}" method="POST" class="form login col-lg-4 col-md-6 bg-white" novalidate>
                @csrf
                <h3 class="h3 mb-6">
                    Авторизация
                </h3>
                <div class="form-group login">
                    <label for="loginInput" class="small-text text-primary-color letter-spacing-0.2">
                        Логин
                    </label>
                    <input type="email" class="form-control" id="loginInput" name="email" placeholder="Логин" required>
                    <div class="error-message error-empty text-slate-600">
                        <img src="images/error-input-icon.svg" alt="Error input icon" class="mr-1">
                        <span>
                            Укажите логин
                        </span>
                    </div>
                </div>
                <div class="form-group password">
                    <label for="passwordInput"
                        class="position-relative small-text text-primary-color letter-spacing-0.2">
                        Пароль
                        <span class="show-password" id="showPassword">
                            <img class="show-password-icon" src="images/show-pass-icon.svg" alt="show password">
                        </span>
                    </label>
                    <input type="password" class="form-control" id="passwordInput" placeholder="Пароль"
                        autocomplete="on" name="password" required>
                    <div class="error-message error-empty text-slate-600">
                        <img src="images/error-input-icon.svg" alt="Error input icon" class="mr-1">
                        <span>
                            Укажите пароль
                        </span>
                    </div>
                </div>
                @error('auth')
                <div>
                    <p>{{$errors->first('auth')}}</p>
                </div>
                @enderror
                <div class="form-check d-flex justify-content-between mb-6">
                    <div class="custom-control custom-checkbox d-flex align-items-center">
                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                        <label class="custom-control-label" for="rememberMe">
                            Запомнить меня
                        </label>
                    </div>
                    <a role="button" data-toggle="modal" data-target="#infoDialog-forgotPassword" class="link">
                        Забыли пароль?
                    </a>
                </div>
                <div class="form-group-buttons">
                    <button id="loginSubmit" type="submit"
                        class="login-submit btn btn-primary btn-block d-flex align-items-center justify-content-center text-white">
                        <span class="mr-2" id="iconSubmitButton">
                            <img src="images/login-button-icon.svg" alt="Login icon">
                        </span>
                        <span id="loaderSubmit" role="status" aria-hidden="true"
                            class="spinner-border spinner-border-sm mr-2 d-none">
                        </span>
                        <span class="submit-text">
                            Войти
                        </span>
                    </button>
                    <button type="button" data-toggle="modal" data-target="#infoDialog-registrationInfo"
                        class="registration btn btn-outline-primary btn-block">
                        Регистрация
                    </button>
                </div>
                <div class="support">
                    <div class="support-icon">
                        <img src="images/support-icon.svg" alt="support">
                    </div>
                    <div class="support-text small-text">
                        Если у вас возникли вопросы,
                        обратитесь в
                        <a href="#" class="link">
                            техподдержку
                        </a>
                    </div>
                </div>
            </form>
            <div class="company d-flex">
                <div class="company-label">
                    <div class="logo">
                        <img src="images/logo-icon.svg" alt="logo">
                    </div>
                    <h5 class="h5 company-title-hidden">
                        Test System
                    </h5>
                    <div class="company-title-icon">
                        <img src="images/main-title.svg" alt="logo">
                    </div>
                </div>
                <div class="company-description">
                    <h5 class="h5 text-slate-200">
                        Портал электронного обучения сотрудников
                    </h5>
                </div>
            </div>
            <!-- Моадлки для формы (Забыли пароль && Регистрация) -->

            <div id="infoDialog-forgotPassword" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="answerDialogLabel" aria-hidden="true">
                <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-sm modal-dialog-centered justify-content-center">
                    <!-- Модалка для главной (Регистрация || Забыли пароль) -->
                    <div class="modal-content px-6 py-8">
                        <div
                            class="modal-header d-flex flex-column align-items-end justify-content-between border-0 p-0 mb-6">
                            <button type="button" class="close ml-auto p-0 mr-6" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true mr-6">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 mr-auto text-black-color m-0">
                                Забыли пароль? </h4>
                        </div>
                        <div class="modal-body p-0 mb-6">
                            В случае возникновения проблем с авторизацией, обратитесь к администратору системы
                        </div>
                        <div
                            class="modal-footer align-items-end justify-content-center rounded-sm bg-blue-100 border-0 p-2">
                            <h6 class="h6">
                                admin@testsystem.ru </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div id="infoDialog-registrationInfo" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="answerDialogLabel" aria-hidden="true">
                <!-- Вариант модалки на начала тестирования -->
                <div class="modal-dialog modal-sm modal-dialog-centered justify-content-center">
                    <!-- Модалка для главной (Регистрация || Забыли пароль) -->
                    <div class="modal-content px-6 py-8">
                        <div
                            class="modal-header d-flex flex-column align-items-end justify-content-between border-0 p-0 mb-6">
                            <button type="button" class="close ml-auto p-0 mr-6" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true mr-6">&times;</span>
                            </button>
                            <h4 class="h4 modal-title w-100 mr-auto text-black-color m-0">
                                Регистрация </h4>
                        </div>
                        <div class="modal-body p-0 mb-6">
                            Для регистрации, обратитесь к администратору системы </div>
                        <div
                            class="modal-footer align-items-end justify-content-center rounded-sm bg-blue-100 border-0 p-2">
                            <h6 class="h6">
                                admin@testsystem.ru </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection