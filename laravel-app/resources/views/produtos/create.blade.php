<x-app-layout>
    <x-slot name="header">
        Novo Produto
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-aqua-light border-b border-aqua">
                    <h2 class="text-2xl font-bold text-blue-dark">Criar Novo Produto</h2>
                </div>

                <div class="p-6">
                    <form action="{{ route('produtos.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nome do Produto *
                                </label>
                                <input type="text" 
                                       name="nome" 
                                       id="nome" 
                                       value="{{ old('nome') }}"
                                       class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent @error('nome') border-red-500 @enderror"
                                       placeholder="Digite o nome do produto"
                                       required>
                                @error('nome')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Categoria *
                                </label>
                                <select name="categoria_id" 
                                        id="categoria_id"
                                        class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent @error('categoria_id') border-red-500 @enderror"
                                        required>
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="preco" class="block text-sm font-medium text-gray-700 mb-2">
                                    Preço *
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2 text-gray-500">R$</span>
                                    <input type="number" 
                                           name="preco" 
                                           id="preco" 
                                           value="{{ old('preco') }}"
                                           step="0.01"
                                           min="0"
                                           class="w-full pl-8 pr-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent @error('preco') border-red-500 @enderror"
                                           placeholder="0.00"
                                           required>
                                </div>
                                @error('preco')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                                    Descrição
                                </label>
                                <textarea name="descricao" 
                                          id="descricao" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent @error('descricao') border-red-500 @enderror"
                                          placeholder="Digite uma descrição para o produto">{{ old('descricao') }}</textarea>
                                @error('descricao')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('produtos.index') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Criar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 