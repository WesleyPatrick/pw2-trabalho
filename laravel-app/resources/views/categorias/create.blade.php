<x-app-layout>
    <x-slot name="header">
        Nova Categoria
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-aqua-light border-b border-aqua">
                    <h2 class="text-2xl font-bold text-blue-dark">Criar Nova Categoria</h2>
                </div>

                <div class="p-6">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                                Nome da Categoria
                            </label>
                            <input type="text" 
                                   name="nome" 
                                   id="nome" 
                                   value="{{ old('nome') }}"
                                   class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent @error('nome') border-red-500 @enderror"
                                   placeholder="Digite o nome da categoria"
                                   required>
                            @error('nome')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('categorias.index') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Criar Categoria
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 