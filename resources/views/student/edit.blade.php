@extends('welcome')

@extends('navbar')

@section('content')

<div class="container">
    <div>
        <livewire:edit :userId="$id"/>
    </div>
</div>

@endsection
