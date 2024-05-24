@extends('layouts.app')

@section('content')

<div class="container py-16">
    <h2 class="text-4xl font-bold mb-8">{{ $listing->title }}</h2>
    <div class="prose">
        {!! $listing->description !!}
    </div>
</div>

@endsection