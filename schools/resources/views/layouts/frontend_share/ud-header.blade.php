    <!-- start navbar -->
    <header>
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('frontend/images/nav logo.png') }}" alt="img" width="120px" height="60px" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active translatable reverse-text" aria-current="page" href="#hero"
                                data-ar="الصفحة الرئيسية" data-en="Home">الصفحة الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link translatable reverse-text" href="#about" data-ar="من نحن"
                                data-en="About Us">نعرفك علينا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link translatable reverse-text" href="#Slider" data-ar="الخدمات"
                                data-en="Services">الخدمات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link translatable reverse-text" href="#product" data-ar="المنتجات"
                                data-en="Products">المنتجات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link translatable reverse-text" href="#card-pounter" data-ar="الخدمات"
                                data-en="Services">لماذا مصنع مسير؟</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link translatable reverse-text" href="#infinite-bar" data-ar="شركاء النجاح"
                                data-en="Partners">شركاءالنجاح</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link translatable reverse-text" href="#form" data-ar="أتصل بنا"
                                data-en="Contact Us">أتصل بنا</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-center align-items-center">




                        <div class="dropdown">
                            <button class="btn lang dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span id="langText" style="text-transform: uppercase;">{{ LaravelLocalization::getCurrentLocale() }}
                                </span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                {{-- <li><a class="dropdown-item lang-option" href="#" data-lang="EN">EN</a></li>
                                <li><a class="dropdown-item lang-option" href="#" data-lang="AR">AR</a></li> --}}
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if ($localeCode === 'en')
                                        <li>
                                            <a class="dropdown-item lang-option" rel="alternate"
                                                hreflang="{{ $localeCode }}" data-lang="{{ $localeCode }}"
                                                onclick="changeLanguage(this)">
                                                <span class="align-middle">{{ $properties['native'] }}</span>
                                            </a>
                                        </li>
                                    @elseif ($localeCode === 'ar')
                                        <li>
                                            <a class="dropdown-item lang-option" rel="alternate"
                                                hreflang="{{ $localeCode }}" data-lang="{{ $localeCode }}"
                                                onclick="changeLanguage(this)">
                                                <span class="align-middle">{{ $properties['native'] }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <!-- end navbar -->
