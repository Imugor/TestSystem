@extends('layouts.app')

@section('title')Личный кабинет@endsection

@section('container')
<div class="account-layout">
        
    @include('inc.aside')

                <div class="account-layout-content w-100 bg-white" id="contentSide">
                    <button class="toggle-nav-btn bg-white" id="toggleMenuButton">
                        <img src="{{asset('./images/nav-toggle-icon.svg')}}" alt="toggle navigation button">
                    </button>
                    
    <div class="my-profile-page">
        <h4 class="h4">
            Мой профиль
        </h4>
        <div class="profile-wrapper d-flex">
            <div class="profile-info">
                <div class="profile-info-item">
                    <div class="small-text text-slate-400">
                        ФИО
                    </div>
                    <h5 class="h5">
                        {{$user->name}}                </h5>
                </div>
                <div class="profile-info-item">
                    <div class="small-text text-slate-400 mb-1">
                        Должность
                    </div>
                    <p>
                        {{$user->position}}                </p>
                </div>
                <div class="profile-info-item">
                    <div class="small-text text-slate-400 mb-1">E-mail</div>
                    <p>
                        {{$user->email}}                </p>
                </div>
            </div>
            <div class="profile-settings flex-column">
                <h5 class="h5">
                    Сменить пароль
                </h5>
                <!-- Форма смены пароля -->
                <form class="form change-password-form" action="{{route('reset_password')}}" method="POST" novalidate>
                    @csrf
        <div class="form-group mb-2-5">
            <label for="changePassword small-text text-primary-color letter-spacing-0.2">
                Новый пароль
            </label>
            <input
                type="password"
                class="form-control"
                id="changePassword"
                placeholder="Новый пароль"
                autocomplete="on"
                name="password"
                required
            >
        </div>
        <div class="form-group">
            <label for="changePasswordConfirm" class="position-relative small-text text-primary-color letter-spacing-0.2">
                Повторите новый пароль
                <span class="show-password" id="showPasswordConfirm">
                    <img class="show-password-icon" src="{{asset('images/show-pass-icon.svg')}}" alt="show password">
                </span>
            </label>
            <input
                type="password"
                class="form-control"
                id="changePasswordConfirm"
                placeholder="Новый пароль"
                autocomplete="on"
                name="password_repeat"
                required
            >
            <div class="error-message error-empty text-slate-600">
                <img src="{{asset('./images/error-input-icon.svg')}}" alt="Error input icon" class="mr-1">
                <span class="validation-text">
                    Укажите пароль
                </span>
            </div>
        </div>
        @error('password')
        <div>
            <p>{{$errors->first('password')}}</p>
        </div>
        @enderror
        @if (\Session::has('password_success_reset'))
        <div>
            <p>{{\Session::get('password_success_reset')}}</p>
        </div>
        @endif
        <button
            type="submit"
            class="btn btn-outline-primary btn-sm"
        >
            Сохранить
        </button>
    </form>
            </div>
            <div class="change-password-group flex-column">
                <button
                    class="btn btn-outline-primary"
                    data-toggle="modal"
                    data-target="#dialogForm"
                    id="changePasswordBtn"
                >
                    <img class="mr-1" src="{{asset('images/lock-icon.svg')}}" alt="Change password">
                    Сменить пароль
                </button>
                <a href="{{route('logout')}}">
                    <button class="btn btn-outline-dark">
                        Выйти
                    </button>
                </a>
                <div
        class="modal fade"
        id="dialogForm"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
            <!--  Модалка формы из личного кабинета для смены пароля -->
            <div class="modal-content p-6" style="max-width: 320px;">
                <div class="modal-header d-flex flex-column border-0 p-0 mb-6">
                    <button
                        type="button"
                        class="close p-0"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="h5 mb-6">
                        Сменить пароль
                    </h5>
                </div>
                <form class="form" id="dialogChangePasswordForm" novalidate>
                    <div class="form-group mb-2-5">
                        <label for="changePasswordField small-text text-primary-color mb-2">
                            Новый пароль
                        </label>
                        <input
                            type="password"
                            class="form-control"
                            id="changePasswordField"
                            placeholder="Новый пароль"
                            autocomplete="on"
                            required
                        >
                    </div>
                    <div class="form-group mb-6">
                        <label for="confirmPasswordField" class="position-relative small-text text-primary-color mb-2">
                            Повторите новый пароль
                            <span class="show-password" id="showPasswordConfirm">
                                <img class="show-password-icon" src="{{asset('./images/show-pass-icon.svg')}}" alt="show password">
                            </span>
                        </label>
                        <input
                            type="password"
                            class="form-control"
                            id="confirmPasswordField"
                            placeholder="Новый пароль"
                            autocomplete="on"
                            required
                        >
                        <div class="error-message error-empty text-slate-600">
                            <img src="{{asset('images/error-input-icon.svg')}}" alt="Error input icon" class="mr-1">
                            <span class="validation-text">
                                Укажите пароль
                            </span>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn outlined-btn outlined-blue normal-btn w-100"
                    >
                        Сохранить
                    </button>
                </form>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
@endsection