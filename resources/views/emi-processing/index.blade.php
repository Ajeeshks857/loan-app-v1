<form action="{{ route('process-data.process') }}" method="POST" class="mt-4">
    @csrf
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Process Data
    </button>
</form>

@if (session('success'))
    <p class="mt-2 text-green-500">{{ session('success') }}</p>
@endif

