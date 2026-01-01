@extends('gslsa.layout')

@section('firstlayout-title')
    Preventive & Strategic Legal Services Schemes
@endsection

@section('first-layout-content')
    @php
        $items = [
            [
                'src' => 'https://drive.google.com/file/d/1wp0IRN8XT7Zz_ieTR5vfvjlTPcfjTU_h/view',
                'name' => __('Schemes l1'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1MvMRQXRHPENsvjD1cQpVgQYif4oamdlu/view',
                'name' => __('Schemes l2'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/19v96so0EmT82V94WoNcdcTqsYosbW8zd/view',
                'name' => __('Schemes l3'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1okH2aWx6XGa-mJkaCmoeUykJlel_ca_n/view',
                'name' => __('Schemes l4'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1tAZq5IvfvqvJFntuqzpGnGnhX5etcaw2/view',
                'name' => __('Schemes l5'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1wogvJ_YsjU_H9GvPZ5jZrsY4tKB2jzrp/view',
                'name' => __('Schemes l6'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1t69CZ2TSbUJkc0x9j7meqNykLqGK5Bx2/view',
                'name' => __('Schemes l7'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1cRrbPAPQWvkjCo53qg1KUS-HbRwKUBUk/view',
                'name' => __('Schemes l8'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1d5c43PsYSC-bco7_yVvMeJMGmhjgftv5/view',
                'name' => __('Schemes l9'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1DPVhgMDuc8xDA1cBMVbpwMFSXR1ykHXZ/view',
                'name' => __('Schemes l10'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1iOfY1rcCL4PFKNfRJJSFzYgh5WZCDZIw/view',
                'name' => __('Schemes l11'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1P7P_XnczNvThWP7Md0vOHB38mctamo5t/view',
                'name' => __('Schemes l12'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1vfAJPKaEd29rtWLzJwO_lOAg-paMv4z5/view',
                'name' => __('Schemes l13'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1Bi8hWMK2-km_oU3HYXn08n3uD-66ZtF9/view',
                'name' => __('Schemes l14'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1EEy1HwCl9-x-91Gao3jXOXJCe2iNlYFz/view',
                'name' => __('Schemes l15'),
            ],
        ];
    @endphp

    <x-actand-rules title="{{ __('Preventive & Strategic Legal Services Schemes') }}" :items="$items" />
@endsection
