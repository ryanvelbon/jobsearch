@extends('layouts.app')

@section('content')
<style>
    #features h3 {font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;}
    code {background-color: #f7fafc; color: #4a5568; padding: 0.25rem;}
</style>
<section class="bg-white py-32">
    <div class="container">
        <h2 class="text-5xl font-semibold text-gray-800">Build your next<br><span class="text-primary-600">Livewire & Filament App</span><br>with ease!</h2>
        <p>This is the <code>welcome.blade.php</code> page.<br>Start your project by deleting all the code in this file and building a custom landing page.</p>
        <div>
            <button type="button" class="btn btn-primary btn-xs">Extra small</button>
            <button type="button" class="btn btn-primary btn-sm">Small</button>
            <button type="button" class="btn btn-primary">Base</button>
            <button type="button" class="btn btn-primary btn-lg">Large</button>
            <button type="button" class="btn btn-primary btn-xl">Extra large</button>
        </div>
    </div>
</section>
<section id="features" class="bg-gray-300 py-24">
    <h2 class="text-5xl font-bold mb-16 text-center">What's included?</h2>
    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-8 text-center">
        <div>
            <h3>TALL Preset (with auth)</h3>
            <p>
                <a href="https://github.com/laravel-frontend-presets/tall">Laravel TALL Preset</a>
            </p>
        </div>
        <div>
            <h3>Admin Panel</h3>
            <p>Visit <code>/admin</code> to access your Filament admin panel.</p>
        </div>
        <div>
            <h3>Filament for Front-end</h3>
            <p>Configured so that you can build customer-facing apps with Filament's packages.</p>
        </div>
        <div>
            <h3>CSS classes</h3>
            <p>In <code>app.scss</code> you will find pre-defined CSS classes for common UI components such as <code>.btn</code>.</p>
        </div>
    </div>
</section>
@endsection
