<x-app-layout>
    <x-slot name="header">
        Detalhes do Produto
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-aqua-light border-b border-aqua">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-blue-dark">{{ $produto->nome }}</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('produtos.edit', $produto) }}" 
                               class="bg-teal hover:bg-teal-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Editar
                            </a>
                            <a href="{{ route('produtos.index') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-aqua-light p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-dark mb-4">Informações do Produto</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="font-medium text-gray-700">Nome:</span>
                                    <span class="ml-2 text-gray-900">{{ $produto->nome }}</span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Categoria:</span>
                                    <span class="ml-2 bg-teal text-white px-2 py-1 rounded-full text-sm">
                                        {{ $produto->categoria->nome }}
                                    </span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Preço:</span>
                                    <span class="ml-2 text-2xl font-bold text-green-600">
                                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                    </span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Criado em:</span>
                                    <span class="ml-2 text-gray-900">{{ $produto->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Última atualização:</span>
                                    <span class="ml-2 text-gray-900">{{ $produto->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-teal-light p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-teal-dark mb-4">Descrição</h3>
                            @if($produto->descricao)
                                <p class="text-gray-700 leading-relaxed">{{ $produto->descricao }}</p>
                            @else
                                <p class="text-gray-500 italic">Nenhuma descrição fornecida.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6 bg-blue-light p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-blue-dark mb-4">Outros Produtos da Categoria "{{ $produto->categoria->nome }}"</h3>
                        @php
                            $outrosProdutos = $produto->categoria->produtos()->where('id', '!=', $produto->id)->take(5)->get();
                        @endphp
                        
                        @if($outrosProdutos->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($outrosProdutos as $outroProduto)
                                    <div class="bg-white p-4 rounded border border-blue">
                                        <h4 class="font-medium text-gray-900">{{ $outroProduto->nome }}</h4>
                                        <p class="text-sm text-green-600 font-bold">R$ {{ number_format($outroProduto->preco, 2, ',', '.') }}</p>
                                        <a href="{{ route('produtos.show', $outroProduto) }}" 
                                           class="text-blue hover:text-blue-dark text-sm">
                                            Ver detalhes
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600">Este é o único produto nesta categoria.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 