<div id="sidebar" class="z-10 fixed top-0 h-full w-64 bg-white text-gray-800 transition-transform duration-300 ease-in-out transform -translate-x-full flex flex-col shadow-lg">
    <div class="flex items-center justify-center h-14 px-6 bg-blue-500 relative">
        <button id="closeSidebar" class="text-gray-200 hover:text-gray-400 absolute left-4">
            <span id="closeIcon">✕</span>
        </button>
        <h2 class="text-2xl text-white">Menu</h2>
    </div>
    <ul class="mt-4 space-y-2 flex-grow">
        <li><a href="/dashboard" class="px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:text-white w-full block">Dashboard</a></li>
        <li><a href="/dashboard/products" class="px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:text-white w-full block">Product</a></li>
    </ul>
    <form method="POST" action="/logout" class="mb-4">
        @csrf
        <button type="submit" class="px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:text-white w-full">Logout</button>
    </form>
</div>

<div id="overlay" class="fixed inset-0 bg-black opacity-30 hidden"></div>

<script>
    const sidebar = document.querySelector('#sidebar');
    const overlay = document.querySelector('#overlay');
    const openIcon = document.querySelector('#openIcon');
    const closeIcon = document.querySelector('#closeIcon');
    
    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
    
    document.querySelector('#openSidebar').addEventListener('click', toggleSidebar);
    document.querySelector('#closeSidebar').addEventListener('click', toggleSidebar);
    document.querySelector('#overlay').addEventListener('click', toggleSidebar);
</script>
