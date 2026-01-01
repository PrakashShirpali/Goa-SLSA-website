<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/FAV.png" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('cssjs')

    <title>GSLSA @yield('firstlayout-title')</title>
    <script>
        (function() {
            const rootElement = document.documentElement;

            // Function to get theme preference
            const getPreferredTheme = () => {
                return localStorage.getItem("theme") ||
                    (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
            };

            // Apply theme on load
            const applyTheme = (theme) => {
                rootElement.setAttribute("data-bs-theme", theme);
                localStorage.setItem("theme", theme);
            };

            const currentTheme = getPreferredTheme();
            applyTheme(currentTheme);

            // Listen for system theme change
            window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", (e) => {
                if (!localStorage.getItem(
                        "theme")) { // Only apply if the user hasn't manually changed the theme
                    applyTheme(e.matches ? "dark" : "light");
                }
            });
        })();
    </script>
</head>

<body>
    <div class="navhead">
        {{-- header section starts here --}}
        <div class="gslsa-header">
            <div class="d-flex gap-1">
                <div id="current-time"></div>
                <img src="{{ asset('images/indian flag.png') }}" alt="indian flag" class="i_flag">
            </div>
            <div class="languages d-flex gap-1">
                <select class="form-select form-select-sm" aria-label="Small select example"
                    onchange="window.location.href=this.value">
                    <option class="option" value="{{ route('change-language', ['locale' => 'en']) }}"
                        {{ app()->getLocale() == 'en' ? 'selected' : '' }}>Eng</option>
                    <option class="option" value="{{ route('change-language', ['locale' => 'kn']) }}"
                        {{ app()->getLocale() == 'kn' ? 'selected' : '' }}>कोंकणी</option>
                </select>

                <div class="theme-div">
                    <label for="theme" class="theme">
                        <span class="theme__toggle-wrap">
                            <input id="theme" class="theme__toggle" type="checkbox" role="switch" name="theme"
                                value="dark">
                            <span class="theme__fill"></span>
                            <span class="theme__icon">
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                            </span>
                        </span>
                    </label>
                </div>
                <div class="d-flex gap-1">
                    <button class="btn btn-outline-light font-buttons" id="defaultFont">A</button>
                    <button class="btn btn-outline-light font-buttons" id="increaseFont">A<sup>+</sup></button>
                    <button class="btn btn-outline-light font-buttons" id="decreaseFont">A<sup>-</sup></button>
                </div>
                <div>
                    <a href="{{ route('sitemap') }}" class="btn btn-outline-light font-buttons">
                        <i class="bi bi-diagram-3"></i>
                    </a>
                </div>
                <div>
                    <a href="https://www.youtube.com/@goastatelegalservicesautho5418" class="btn btn-light font-buttons"
                        target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        {{-- header section ends here --}}

        <!-- navbar starts here -->
        <nav class="navbar navbar-expand-lg gslsa-navbar">
            <div class="container-fluid-in">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/satyamevblack.png') }}" id="gslsa_logo" class="gslsa-logo"
                        alt="GSLSA logo">
                    <script>
                        window.eventUrls = {
                            darkLogo: "{{ asset('images/satyamevwhite.png') }}",
                            lightLogo: "{{ asset('images/satyamevblack.png') }}"
                        };
                    </script>
                </a>
                <div class="container-fluid-in2">
                    <div class="title">{{ __('GOA STATE') }}</div>
                    <div class="title0">{{ __('LEGAL SERVICES AUTHORITY') }}</div>
                </div>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">GSLSA</h5>
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close"><i
                            class="bi bi-x"></i></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item dropdown main_dropdown">
                            <a class="{{ Request::routeIs('about_us') || Request::routeIs('members') || Request::routeIs('hclsc') || Request::routeIs('north') || Request::routeIs('south') || Request::routeIs('bardez') || Request::routeIs('bicholim') || Request::routeIs('canacona') || Request::routeIs('mormugao') || Request::routeIs('pernem') || Request::routeIs('ponda') || Request::routeIs('quepem') || Request::routeIs('salcete') || Request::routeIs('sanguem') || Request::routeIs('sattari') || Request::routeIs('tiswadi') ? 'active' : '' }} nav-link dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('About') }}
                            </a>
                            <ul class="dropdown-menu main_dropdown-menu">
                                <li><a class="{{ Request::routeIs('about_us') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('about_us') }}">{{ __('about us') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="{{ Request::routeIs('members') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('members') }}">{{ __('members') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="{{ Request::routeIs('hclsc') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('hclsc') }}">{{ __('high court legal services committee') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="nav-item dropdown dropdown1">
                                    <a class="{{ Request::routeIs('north') || Request::routeIs('south') ? 'active' : '' }} nav-link dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        {{ __('district legal services authorities') }}
                                    </a>
                                    <ul class="dropdown-menu dropdown1_menu">
                                        <li><a class="{{ Request::routeIs('north') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('north') }}">{{ __('north') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('south') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('south') }}">{{ __('south') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="nav-item dropdown dropdown1"><a
                                        class="{{ Request::routeIs('bardez') || Request::routeIs('bicholim') || Request::routeIs('canacona') || Request::routeIs('mormugao') || Request::routeIs('pernem') || Request::routeIs('ponda') || Request::routeIs('quepem') || Request::routeIs('salcete') || Request::routeIs('sanguem') || Request::routeIs('sattari') || Request::routeIs('tiswadi') ? 'active' : '' }} nav-link dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        {{ __('taluka legal services committee') }}
                                    </a>
                                    <ul class="dropdown-menu dropdown1_menu">
                                        <li class="nav-link">{{ __('north') }}</li>
                                        <li><a class="{{ Request::routeIs('bardez') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('bardez') }}">{{ __('bardez') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('bicholim') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('bicholim') }}">{{ __('bicholim') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('pernem') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('pernem') }}">{{ __('pernem') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('ponda') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('ponda') }}">{{ __('ponda') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('sattari') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('sattari') }}">{{ __('sattari') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('tiswadi') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('tiswadi') }}">{{ __('tiswadi') }}</a></li>

                                        <li class="nav-link">{{ __('south') }}</li>
                                        <li><a class="{{ Request::routeIs('canacona') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('canacona') }}">{{ __('canacona') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('mormugao') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('mormugao') }}">{{ __('mormugao') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('quepem') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('quepem') }}">{{ __('quepem') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('salcete') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('salcete') }}">{{ __('salcete') }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="{{ Request::routeIs('sanguem') ? 'active' : '' }} dropdown-item"
                                                href="{{ route('sanguem') }}">{{ __('sanguem') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown main_dropdown">
                            <a class="{{ Request::routeIs('legalaid') || Request::routeIs('lokadalat') || Request::routeIs('lokadalatschemes') ? 'active' : '' }} nav-link dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Services') }}
                            </a>
                            <ul class="dropdown-menu main_dropdown-menu">
                                <li><a class="{{ Request::routeIs('legalaid') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('legalaid') }}">{{ __('Legal Aid') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="{{ Request::routeIs('lokadalat') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('lokadalat') }}">{{ __('Lok Adalat') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="{{ Request::routeIs('lokadalatschemes') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('lokadalatschemes') }}">{{ __('Lok adalat scheme') }}</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown main_dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::routeIs('act1987') || Request::routeIs('rules') || Request::routeIs('regulations') || Request::routeIs('Schemes') || Request::routeIs('guidelines') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Act & Rules') }}
                            </a>
                            <ul class="dropdown-menu main_dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ Request::routeIs('act1987') ? 'active' : '' }}"
                                        href="{{ route('act1987') }}">{{ __('The Legal Services Authorities Act, 1987') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item {{ Request::routeIs('rules') ? 'active' : '' }}"
                                        href="{{ route('rules') }}">{{ __('Rules') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item {{ Request::routeIs('regulations') ? 'active' : '' }}"
                                        href="{{ route('regulations') }}">{{ __('Regulations') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item {{ Request::routeIs('Schemes') ? 'active' : '' }}"
                                        href="{{ route('Schemes') }}">{{ __('Preventive & Strategic Legal Services Schemes') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item {{ Request::routeIs('guidelines') ? 'active' : '' }}"
                                        href="{{ route('guidelines') }}">{{ __('Guidelines') }}</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('gallery') || Request::routeIs('event.show') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('gallery') }}">{{ __('Gallery') }}</a>
                        </li>

                        <li class="nav-item dropdown main_dropdown">
                            <a class="nav-link {{ Request::routeIs('latest_updates') || Request::routeIs('recruitment') || Request::routeIs('newsletter') ? 'active' : '' }} dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Miscellaneous') }}
                            </a>
                            <ul class="dropdown-menu main_dropdown-menu">
                                <li><a class="{{ Request::routeIs('latest_updates') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('latest_updates') }}">{{ __('Notice Board') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="{{ Request::routeIs('newsletter') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('newsletter') }}">{{ __('Newsletter') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="{{ Request::routeIs('recruitment') ? 'active' : '' }} dropdown-item"
                                        href="{{ route('recruitment') }}">{{ __('Recruitment') }}</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/nalsa.png') }}" class="azad-logo" alt="GSLSA logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </nav>
        <!-- navbar ends here -->
    </div>

    {{-- main-content starts here  --}}
    <div class="gslsa-main-content">

        @yield('first-layout-content')

    </div>
    {{-- main-content ends here  --}}


    {{-- footer starts here --}}
    <div class="gslsa-footer">
        <div class="footer-content">

            <div class="org">
                <div class="container-fluid-in">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/satyamevwhite.png') }}" class="gslsa-logo" alt="GSLSA logo">
                    </a>
                    <div class="container-fluid-in2">
                        <div class="title">{{ __('GOA STATE') }}</div>
                        <div class="title0">{{ __('LEGAL SERVICES AUTHORITY') }}</div>
                    </div>
                </div>
                <div class="desc">{{ __('footer description') }}
                </div>
                {{-- <div class="social">
                    <a href="https://www.youtube.com/@goastatelegalservicesautho5418" target="_blank"><i
                            class="bi bi-youtube"></i></a>
                    <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                </div> --}}
            </div>

            <div class="quick-links">
                <h1 class="title1">{{ __('Related Links') }}</h1>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="https://nalsa.gov.in/" target="_blank"
                            class="nav-link">{{ __('National Legal Services Authority') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://hcbombayatgoa.nic.in/" target="_blank"
                            class="nav-link">{{ __('High Court Of Bombay At Goa') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.sci.gov.in/" target="_blank"
                            class="nav-link">{{ __('Supreme Court of India') }}</a>
                    </li>
                </ul>
            </div>

            <div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7689.2220141387925!2d73.83366165543147!3d15.50534209442495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfc08f65b291b7%3A0xb2aa8111197784b9!2sHigh%20Court%20of%20Bombay%20at%20Goa!5e0!3m2!1sen!2sin!4v1722422781441!5m2!1sen!2sin"
                    width="300" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="reach-us">
                <h1 class="title1">{{ __('Reach Us') }}</h1>
                <div class="contact">
                    <i class="bi bi-telephone-plus-fill">+91 -9832648364</i>
                    <i class="bi bi-envelope">ms[-]gslsa[.]goa[@]nic[.]in</i>
                    <i class="bi bi-geo-alt-fill">{!! __('address') !!}</i>
                </div>
            </div>

        </div>
        <div class="disclaimer">
            <span>{{ __('disclaimer') }}</span>
        </div>
        <span class="host">{{ __('Host') }}</span>
        <a href="https://www.nic.in/" class="nav-link" target="_blank"><img
                src="{{ asset('images/nicLogo.png') }}" alt="niclogo" class="nicLogo"></a>
    </div>
    {{-- foooter ends here --}}
    <button class="scroll-to-top"><i class="bi bi-arrow-up"></i></button>

</body>

</html>
