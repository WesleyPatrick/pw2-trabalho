<x-app-layout>
    <x-slot name="header">
        Gerenciar Categorias
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-aqua-light border-b border-aqua">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-blue-dark">Categorias</h2>
                        <a href="{{ route('categorias.create') }}" 
                           class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                            Nova Categoria
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-teal-light border-l-4 border-teal text-teal-dark p-4 m-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 m-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="p-6">
                    @if($categorias->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-aqua">
                                <thead class="bg-blue text-white">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Nome</th>
                                        <th class="py-3 px-4 text-left">Produtos</th>
                                        <th class="py-3 px-4 text-left">Criado em</th>
                                        <th class="py-3 px-4 text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorias as $categoria)
                                        <tr class="border-b border-aqua-light hover:bg-aqua-light transition duration-200">
                                            <td class="py-3 px-4">{{ $categoria->nome }}</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-teal text-white px-2 py-1 rounded-full text-sm">
                                                    {{ $categoria->produtos_count }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">{{ $categoria->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('categorias.show', $categoria) }}" 
                                                       class="text-blue hover:text-blue-dark">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('categorias.edit', $categoria) }}" 
                                                       class="text-teal hover:text-teal-dark">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800" 
                                                                onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
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
                            {{ $categorias->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-aqua" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhuma categoria encontrada</h3>
                            <p class="mt-1 text-sm text-gray-500">Comece criando sua primeira categoria.</p>
                            <div class="mt-6">
                                <a href="{{ route('categorias.create') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue hover:bg-blue-dark">
                                    Nova Categoria
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 