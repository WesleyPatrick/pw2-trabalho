<x-app-layout>
    <x-slot name="header">
        Gerenciar Produtos
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-aqua-light border-b border-aqua">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-blue-dark">Produtos</h2>
                        <a href="{{ route('produtos.create') }}" 
                           class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                            Novo Produto
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-teal-light border-l-4 border-teal text-teal-dark p-4 m-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Filtros e Busca -->
                <div class="p-6 border-b border-aqua-light">
                    <form method="GET" action="{{ route('produtos.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                                <input type="text" 
                                       name="search" 
                                       id="search" 
                                       value="{{ request('search') }}"
                                       class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue"
                                       placeholder="Nome do produto">
                            </div>
                            <div>
                                <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                                <select name="categoria_id" 
                                        id="categoria_id"
                                        class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue">
                                    <option value="">Todas as categorias</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="preco_min" class="block text-sm font-medium text-gray-700 mb-1">Preço Mín.</label>
                                <input type="number" 
                                       name="preco_min" 
                                       id="preco_min" 
                                       value="{{ request('preco_min') }}"
                                       step="0.01"
                                       class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue"
                                       placeholder="0.00">
                            </div>
                            <div>
                                <label for="preco_max" class="block text-sm font-medium text-gray-700 mb-1">Preço Máx.</label>
                                <input type="number" 
                                       name="preco_max" 
                                       id="preco_max" 
                                       value="{{ request('preco_max') }}"
                                       step="0.01"
                                       class="w-full px-3 py-2 border border-aqua rounded-lg focus:outline-none focus:ring-2 focus:ring-blue"
                                       placeholder="999.99">
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <button type="submit" 
                                    class="bg-teal hover:bg-teal-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Filtrar
                            </button>
                            <a href="{{ route('produtos.index') }}" 
                               class="text-blue hover:text-blue-dark">
                                Limpar filtros
                            </a>
                        </div>
                    </form>
                </div>

                <div class="p-6">
                    @if($produtos->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-aqua">
                                <thead class="bg-blue text-white">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Nome</th>
                                        <th class="py-3 px-4 text-left">Categoria</th>
                                        <th class="py-3 px-4 text-left">Preço</th>
                                        <th class="py-3 px-4 text-left">Descrição</th>
                                        <th class="py-3 px-4 text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $produto)
                                        <tr class="border-b border-aqua-light hover:bg-aqua-light transition duration-200">
                                            <td class="py-3 px-4 font-medium">{{ $produto->nome }}</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-teal text-white px-2 py-1 rounded-full text-sm">
                                                    {{ $produto->categoria->nome }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 font-bold text-green-600">
                                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="text-gray-600 text-sm">
                                                    {{ Str::limit($produto->descricao, 50) }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('produtos.show', $produto) }}" 
                                                       class="text-blue hover:text-blue-dark">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('produtos.edit', $produto) }}" 
                                                       class="text-teal hover:text-teal-dark">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800" 
                                                                onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $produtos->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-aqua" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum produto encontrado</h3>
                            <p class="mt-1 text-sm text-gray-500">Comece criando seu primeiro produto.</p>
                            <div class="mt-6">
                                <a href="{{ route('produtos.create') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue hover:bg-blue-dark">
                                    Novo Produto
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 