@section('title', 'Create a new account')

<div class="flex min-h-full">
    <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <a href="{{ route('home') }}">
                    <x-logo class="w-auto h-16 mx-auto text-primary-600" />
                </a>

                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                    Create an account
                </h2>

                <p class="text-gray-600 text-center my-8">
                    Select employer or job seeker and setup your profile in the next step
                </p>

            </div>

            <div class="p-4">
                <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                    <form wire:submit.prevent="register">

                        <div x-data="{ accountType: null }">
                            <div class="flex flex-col gap-2">
                                <label
                                    class="radio-btn"
                                    :class="{'bg-primary-500 text-white': accountType == 'company', 'bg-gray-100 hover:bg-gray-200': accountType != 'company'}"
                                >
                                    <input wire:model="accountType" x-model="accountType" type="radio" value="company" class="hidden">
                                    <span class="ml-2 text-sm font-medium">I'm a company</span>
                                </label>
                                <label
                                    class="radio-btn"
                                    :class="{'bg-primary-500 text-white': accountType == 'candidate', 'bg-gray-100 hover:bg-gray-200': accountType != 'candidate'}"
                                >
                                    <input wire:model="accountType" x-model="accountType" type="radio" value="candidate" class="hidden">
                                    <span class="ml-2 text-sm font-medium">I'm a candidate</span>
                                </label>
                            </div>


                            @error('accountType')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                                Email address
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                                Password
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                            </div>

                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:ring-primary active:bg-primary-700 transition duration-150 ease-in-out">
                                    Register
                                </button>
                            </span>
                        </div>

                        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                Log in
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="relative hidden w-0 flex-1 lg:block">
        <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1549923746-c502d488b3ea" alt="">
    </div>
</div>
