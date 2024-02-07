<div class="bg-blue-500 p-4 text-white">
    <h1 class="text-2xl mb-2"><a href="/" class="hover:underline">STYLE STOCKROOM</a></h1>
    <ul class="flex justify-between space-x-4">
        <div class="flex space-x-4">
            <li><a href="/products" class="hover:underline">Product</a></li>
            <li><a href="/categories" class="hover:underline">Category</a></li>
        </div>
        @auth
            <div class="relative inline-block text-left">
                <div>
                    <button type="button" class="inline-flex justify-center w-full" id="options-menu" aria-haspopup="true" aria-expanded="true">
                        Hi, {{ Auth::user()->name }}
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
                <div class="dropdown-menu hidden origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Dashboard</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 hover:text-gray-900">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('options-menu').addEventListener('click', function (event) {
                    event.preventDefault();
                    this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
                    document.querySelector('.dropdown-menu').classList.toggle('hidden');
                });
            </script>
        @else
            <li><a href="/login" class="hover:underline">Login</a></li>
        @endauth
    </ul>
</div>
