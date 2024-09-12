<x-layout>
    <x-slot:heading>
        Tasks
    </x-slot:heading>

    <div class="w-full max-w-sm mx-auto">
        <form method="POST" action="/tasks">
            @csrf
            <div class="flex items-center border-b border-gray-300 py-2">
                <input name="description" id="description" :value="old('description')" type="text"
                    placeholder="Enter a new task" required
                    class="appearance-none bg-transparent border-r-4 w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" />

                {{-- <input name="due_date" id="due_date" :value="old('due_date')" type="date"
                    placeholder="Enter due date" required
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" /> --}}

                <x-form-button>Add Task</x-form-button>
            </div>
            <x-form-error name='description' />
        </form>
    </div>

    @foreach ($tasks as $task)
        <div class="flex flex-col space-y-2 p-4 border-b border-gray-200">
            <div class="flex items-center">
                <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2" id="task{{ $task->id }}"
                    @if ($task->status) checked @endif @disabled(true)>

                <div class="flex w-full justify-between items-center">
                    <label for="task{{ $task->id }}"
                        class="task-text text-gray-700">{{ $task['description'] }}</label>

                    <div class="flex items-end">
                        @if ($task->status)
                            <form method="POST" action="/tasks/{{ $task->id }}" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-orange-500 hover:bg-orange-600 text-white text-xs py-1 px-2 rounded ml-3">
                                    Mark as undone
                                </button>
                            </form>
                        @else
                            <form method="POST" action="/tasks/{{ $task->id }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white text-xs py-1 px-2 rounded ml-3">
                                    Mark as done
                                </button>
                            </form>
                        @endif

                        <form method="POST" action="/tasks/{{ $task->id }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white text-xs py-1 px-2 rounded ml-3">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <small class="text-gray-500">Added: <span>{{ $task['created_at'] }}</span></small><br>
            <small class="text-gray-500">Updated: <span>{{ $task['updated_at'] }}</span></small>
        </div>
    @endforeach



</x-layout>
