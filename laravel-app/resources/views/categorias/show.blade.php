<x-app-layout>
    <x-slot name="header">
        Detalhes da Categoria
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-aqua-light border-b border-aqua">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-blue-dark">{{ $categoria->nome }}</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('categorias.edit', $categoria) }}" 
                               class="bg-teal hover:bg-teal-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Editar
                            </a>
                            <a href="{{ route('categorias.index') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-aqua-light p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-dark mb-4">Informações da Categoria</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="font-medium text-gray-700">Nome:</span>
                                    <span class="ml-2 text-gray-900">{{ $categoria->nome }}</span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Total de Produtos:</span>
                                    <span class="ml-2 bg-teal text-white px-2 py-1 rounded-full text-sm">
                                        {{ $categoria->produtos->count() }}
                                    </span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Criada em:</span>
                                    <span class="ml-2 text-gray-900">{{ $categoria->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Última atualização:</span>
                                    <span class="ml-2 text-gray-900">{{ $categoria->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-teal-light p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-teal-dark mb-4">Produtos desta Categoria</h3>
                            @if($categoria->produtos->count() > 0)
                                <div class="space-y-3">
                                    @foreach($categoria->produtos as $produto)
                                        <div class="bg-white p-3 rounded border border-teal">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">{{ $produto->nome }}</h4>
                                                    <p class="text-sm text-gray-600">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                                                </div>
                                                <a href="{{ route('produtos.show', $produto) }}" 
                                                   class="text-blue hover:text-blue-dark text-sm">
                                                    Ver detalhes
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-600">Nenhum produto cadastrado nesta categoria.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 