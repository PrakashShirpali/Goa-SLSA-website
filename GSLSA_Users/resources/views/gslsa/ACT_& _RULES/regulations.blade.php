@extends('gslsa.layout')

@section('firstlayout-title')
    regulations
@endsection

@section('first-layout-content')
    @php
        $items = [
            [
                'src' => 'https://nalsa.gov.in/uploads//pdf/2019/09/26/26_09_2019_124565470.pdf',
                'name' => __('Regulations l1'),
            ],
            [
                'src' => 'https://nalsa.gov.in/uploads//pdf/2019/09/26/26_09_2019_875124084.pdf',
                'name' => __('Regulations l2'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1x_UeosdYYxPe_eqmcrL7UnPWlhI2LUbW/view',
                'name' => __('Regulations l3'),
            ],
        ];
    @endphp
    <x-actand-rules title="{{ __('Regulations') }}" :items="$items" />
@endsection
