<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/FAV.png" type="image/png">
    <title>Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .success {
            height: 1em;
            animation: slide 0.8s ease-out;
            width: fit-content;
            top: 0;
            left: 45%;
        }

        @keyframes slide {
            0% {
                transform: translateY(0%);
            }

            50% {
                transform: translateY(50%);
            }

            75% {
                transform: translateY(50%);
            }

            100% {
                transform: translateY(25%);
            }
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible position-absolute show fade d-flex justify-content-center align-items-center success"
            role="alert" id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Automatically hide the alert after 2 seconds
            var successAlert = document.getElementById('successAlert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                }, 1000); // 2000 milliseconds = 2 seconds
            }
        });
    </script>

    <div class="dashboard">

        @php
            $accordionItems = [
                [
                    'bi' => 'bi-house-fill',
                    'title' => 'Home',
                    'target' => 'flush-collapseOne',
                    'items' => [
                        ['name' => 'notices', 'route' => 'GslsaNotices.index'],
                        ['name' => 'youtube videos', 'route' => 'GslsaYoutubeVideos.index'],
                    ],
                ],
                [
                    'bi' => 'bi-info-circle-fill',
                    'title' => 'About',
                    'target' => 'flush-collapseTwo',
                    'items' => [
                        ['name' => 'members', 'route' => 'GslsaMembers.index'],
                        ['name' => 'hclsc members', 'route' => 'GslsaHclscMembers.index'],
                        ['name' => 'north members', 'route' => 'GslsaNorthMembers.index'],
                        ['name' => 'south members', 'route' => 'GslsaSouthMembers.index'],
                        ['name' => 'bardez members', 'route' => 'GslsaBardezMembers.index'],
                        ['name' => 'bicholim members', 'route' => 'GslsaBicholimMembers.index'],
                        ['name' => 'canacona members', 'route' => 'GslsaCanaconaMembers.index'],
                        ['name' => 'mormugao members', 'route' => 'GslsaMormugaoMembers.index'],
                        ['name' => 'pernem members', 'route' => 'GslsaPernemMembers.index'],
                        ['name' => 'ponda members', 'route' => 'GslsaPondaMembers.index'],
                        ['name' => 'quepem members', 'route' => 'GslsaQuepemMembers.index'],
                        ['name' => 'salcete members', 'route' => 'GslsaSalceteMembers.index'],
                        ['name' => 'sanguem members', 'route' => 'GslsaSanguemMembers.index'],
                        ['name' => 'sattari members', 'route' => 'GslsaSattariMembers.index'],
                        ['name' => 'tiswadi members', 'route' => 'GslsaTiswadiMembers.index'],
                    ],
                ],
                [
                    'bi' => 'bi-grid-fill',
                    'title' => 'Services',
                    'target' => 'flush-collapseThree',
                    'items' => [['name' => 'legal heir', 'route' => 'GslsaLegalheirs.index']],
                ],
                [
                    'bi' => 'bi-images',
                    'title' => 'Gallery',
                    'target' => 'flush-collapseFour',
                    'items' => [['name' => 'events', 'route' => 'GslsaEvents.index']],
                ],
                [
                    'bi' => 'bi-collection-fill',
                    'title' => 'Miscellaneous',
                    'target' => 'flush-collapseFive',
                    'items' => [
                        ['name' => 'newsletter', 'route' => 'GslsaNewsletters.index'],
                        ['name' => 'recruitments', 'route' => 'GslsaRecruitments.index'],
                    ],
                ],

                // Add more items as needed
            ];
        @endphp


        {{-- for deskops and laptops start --}}
        <div class="dashboard-div">
            @component('components.dashboard-accordian', ['accordionItems' => $accordionItems])
            @endcomponent
        </div>
        {{-- for deskops and laptops end --}}


        {{-- for smaller screen sizes start --}}
        {{-- <button class="btn btn-primary offcanvas-button" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                class="bi bi-menu-button"></i></button> --}}

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-body">
                @component('components.dashboard-accordian', ['accordionItems' => $accordionItems])
                @endcomponent
            </div>
        </div>
        {{-- for smaller screen sizes end --}}

        <div class="content-div">
            <div class="btn-div">
                <button class="btn offcanvas-button" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <i class="bi bi-list"></i>
                </button>
                <button class="dashboard-button" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <span class="gslsa">Goa State Legal Services Authority</span>
                <span class="GSLSA">GSLSA</span>
                <div class="lang">
                    <i class="bi bi-database-fill"></i>
                    <a href="{{ route('change-language', ['locale' => 'en']) }}"
                        class="{{ session('search_path') == 'english_schema' || !session('search_path') ? 'active' : '' }}"><span>English</span></a>
                    <a href="{{ route('change-language', ['locale' => 'kn']) }}"
                        class="{{ session('search_path') == 'konkani_schema' ? 'active' : '' }}"><span>कोंकणी</span></a>
                </div>
            </div>
            <div class="cont">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

</body>

</html>
