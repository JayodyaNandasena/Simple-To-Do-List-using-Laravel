<x-layout>
    <x-slot:heading>
        To Do List
    </x-slot:heading>

    <div class="flex items-center justify-center h-screen w-full px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <div class="p-6 text-center">
                <h1 class="text-3xl font-bold mb-6">Welcome to Your To-Do List App</h1>
                <p class="text-gray-600 mb-8">Manage your tasks efficiently and effectively with our simple and intuitive to-do list app.</p>
    
                <!-- Login and Register buttons -->
                <div class="flex justify-center space-x-4">
                    <a href="/login" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600">
                        Login
                    </a>
                    <a href="/register" class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>


