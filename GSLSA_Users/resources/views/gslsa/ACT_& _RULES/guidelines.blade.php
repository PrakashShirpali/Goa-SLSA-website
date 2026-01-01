@extends('gslsa.layout')

@section('firstlayout-title')
    guidelines
@endsection

@section('first-layout-content')
    @php
        $items = [
            [
                'src' => 'https://drive.google.com/file/d/1k4YYH15GAQM-Vk3fpapr-963UWD4NbTy/view',
                'name' => __('Guidelines l1'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1PvigJOz6l77uPj-vLvdy7tA5L7EeZX-q/view',
                'name' => __('Guidelines l2'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1djK2KxdyLh8tzK_sqSphMHyrVKm-vqV8/view',
                'name' => __('Guidelines l3'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1LU-sPXRrgC4F2fIQeuL3h4rNcMwaXcnC/view',
                'name' => __('Guidelines l4'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1pINN4aJNmjmYqyJ8aTS1V_qa5p2_pkPn/view',
                'name' => __('Guidelines l5'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1FX5i2aWIuefzXn2ngf1dGjB-L9ArJM9F/view',
                'name' => __('Guidelines l6'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1989aL3IxrqGyRRYDRYdBUzDP96f5N6U3/view',
                'name' => __('Guidelines l7'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1d_NU8njJmRqFMmMC1t4-acFnoeOhtjTU//view',
                'name' => __('Guidelines l8'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1CktonWaSh5aGOrO4Oi14HuvpdqIECEaH/view',
                'name' => __('Guidelines l9'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1cbWZq7aD3IWMRHOu8AvxUkXJQKO_LYP-/view',
                'name' => __('Guidelines l10'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1bavMbGbUBBL4_gVl8y9HsoWRZFPvZ3CS/view',
                'name' => __('Guidelines l11'),
            ],
        ];
    @endphp

    <x-actand-rules title="{{ __('Guidelines') }}" :items="$items" />
@endsection
