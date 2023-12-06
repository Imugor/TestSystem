<header class="header-mobile fixed-top bg-white border-0">
    <div class="container-fluid">
        <div class="header-mobile-content p-0 d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center">
                <div class="logo-img">
                    <img src="{{asset('images/logo-icon.svg')}}" alt="logo">
                </div>
                <h2 class="logo-label">
                    Test System
                </h2>
            </div>
            <button class="menu-button" id="mobileMenuButton">
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
            </button>
        </div>
        <div class="menu" id="mobileMenuList">
            <nav class="navigation">
                <h4 class="navigation-title h4">
                    Меню
                </h4>
                <div class="navigation-list">
                                            <a
                            id="nav-link-1"
                            href="{{route('account_profile')}}"
                            class="btn p-0 text-reset nav-link mb-6"
                        >
                            <img
                                src="{{asset('./images/nav-icon-profile.svg')}}"
                                alt="profile navigation icon"
                            >
                            <span>
                                Мой профиль                            </span>
                        </a>
                                            <a
                            id="nav-link-2"
                            href="{{route('account_tests')}}"
                            class="btn p-0 text-reset nav-link mb-6"
                        >
                            <img
                                src="{{asset('./images/nav-icon-tests.svg')}}"
                                alt="test navigation icon"
                            >
                            <span>
                                Мои тесты                            </span>
                        </a>
                                            <a
                            id="nav-link-3"
                            href="{{route('account_archive')}}"
                            class="btn p-0 text-reset nav-link mb-6"
                        >
                            <img
                                src="{{asset('./images/nav-icon-archive.svg')}}"
                                alt="archive navigation icon"
                            >
                            <span>
                                Архив теста                            </span>
                        </a>
                                    </div>
                <div class="navigation-footer">
                    <div class="support d-flex align-items-center justify-content-start w-100">
                        <div class="support-icon">
                            <img src="{{asset('images/support-icon.svg')}}" alt="support">
                        </div>
                        <div class="support-text small-text w-100">
                            Если у вас возникли вопросы, обратитесь в
                            <a href="#">
                                техподдержку
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="container-fluid d-flex">
                
    <div class="navigation-panel" id="navigationPanel">
        <div class="top">
            <div class="logo d-flex align-items-center">
                <div class="logo-img mr-2">
                    <img src="{{asset('images/logo-icon.svg')}}" alt="logo">
                </div>
                <h2 class="logo-label">
                    Test System
                </h2>
            </div>
            <nav class="nav d-flex flex-column justify-content-center align-items-start">
                            <a
                    id="nav-link-1"
                    href="{{route('account_profile')}}"
                    class="btn p-0 text-reset nav-link"
                >
                    <img
                        src="{{asset('./images/nav-icon-profile.svg')}}"
                        alt="profile navigation icon"
                    >
                    <span>
                        Мой профиль                </span>
                </a>
                            <a
                    id="nav-link-2"
                    href="{{route('account_tests')}}"
                    class="btn p-0 text-reset nav-link"
                >
                    <img
                        src="{{asset('./images/nav-icon-tests.svg')}}"
                        alt="test navigation icon"
                    >
                    <span>
                        Мои тесты                </span>
                </a>
                            <a
                    id="nav-link-3"
                    href="{{route('account_archive')}}"
                    class="btn p-0 text-reset nav-link"
                >
                    <img
                        src="{{asset('./images/nav-icon-archive.svg')}}"
                        alt="archive navigation icon"
                    >
                    <span>
                        Архив теста                </span>
                </a>
                        </nav>
        </div>
        <div class="bottom">
            <div class="logout">
                <a href="{{route('logout')}}">
                    <button class="btn logout-btn outlined-primary outlined-btn large-btn">
                        Выйти
                    </button>
                </a>
            </div>
            <div class="support d-flex align-items-center justify-content-start w-100">
                <div class="support-icon">
                    <img src="{{asset('images/support-icon.svg')}}" alt="support">
                </div>
                <div class="support-text small-text w-100 letter-spacing-0.2">
                    Если у вас возникли вопросы, обратитесь в
                    <a href="#">
                        техподдержку
                    </a>
                </div>
            </div>
        </div>
    </div>