<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>

            <form method="POST" action="/sessions" class="mt-10">
            @csrf

            <div class="mb-6">
                <label class="mb-2 block uppercase font-bold text-xs text-gray-700" for="username">
                    email
                </label>

                <input 
                class="border border-gray-400 p-2 w-full"
                type="email"
                name="email"
                id="email"
                value="{{old('email')}}"
                required>

                @error('email')
                    <p class="text-red-500 text-xs mt-3">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="mb-2 block uppercase font-bold text-xs text-gray-700" for="password">
                    password
                </label>

                <input 
                class="border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                required>

                @error('password')
                    <p class="text-red-500 text-xs mt-3">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button 
                type="submit" 
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Log in
                </button>
            </div>
            </form>

        </main>
    </section>
</x-layout>