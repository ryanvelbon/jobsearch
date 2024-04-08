@extends('layouts.app')

@section('content')
<style>
    #features h3 {font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;}
    code {background-color: #f7fafc; color: #4a5568; padding: 0.25rem;}
</style>
<section class="bg-white py-32">
    <div class="container">
        <h2 class="text-5xl font-semibold text-gray-800">Find a job</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <div class="mt-12">
            <a href="{{ route('listings.index') }}" class="btn btn-primary btn-lg">Find a job</a>
            <a href="#" class="btn btn-primary btn-lg">Other button</a>
        </div>
    </div>
</section>
<section id="features" class="bg-gray-300 py-24">
    <div class="container">
        this is a section
    </div>
</section>
@endsection
