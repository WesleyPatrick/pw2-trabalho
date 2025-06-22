<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            [
                'nome' => 'Smartphone Galaxy S23',
                'preco' => 2999.99,
                'descricao' => 'Smartphone Samsung Galaxy S23 com 128GB, tela de 6.1 polegadas e câmera de 50MP.',
                'categoria_id' => 1 // Eletrônicos
            ],
            [
                'nome' => 'Notebook Dell Inspiron',
                'preco' => 4599.99,
                'descricao' => 'Notebook Dell Inspiron com Intel i5, 8GB RAM, 256GB SSD e Windows 11.',
                'categoria_id' => 9 // Tecnologia
            ],
            [
                'nome' => 'Camiseta Básica',
                'preco' => 49.90,
                'descricao' => 'Camiseta básica de algodão, disponível em várias cores e tamanhos.',
                'categoria_id' => 2 // Roupas
            ],
            [
                'nome' => 'Livro O Senhor dos Anéis',
                'preco' => 89.90,
                'descricao' => 'Trilogia completa de O Senhor dos Anéis em edição especial.',
                'categoria_id' => 3 // Livros
            ],
            [
                'nome' => 'Vaso Decorativo',
                'preco' => 129.90,
                'descricao' => 'Vaso decorativo de cerâmica para plantas, ideal para decoração.',
                'categoria_id' => 4 // Casa e Jardim
            ],
            [
                'nome' => 'Bola de Futebol',
                'preco' => 89.90,
                'descricao' => 'Bola de futebol oficial, tamanho 5, ideal para jogos e treinos.',
                'categoria_id' => 5 // Esportes
            ],
            [
                'nome' => 'Café Especial',
                'preco' => 29.90,
                'descricao' => 'Café especial torrado, 500g, sabor intenso e aroma marcante.',
                'categoria_id' => 6 // Alimentos
            ],
            [
                'nome' => 'Perfume Masculino',
                'preco' => 199.90,
                'descricao' => 'Perfume masculino com fragrância duradoura e elegante.',
                'categoria_id' => 7 // Beleza
            ],
            [
                'nome' => 'Capacete Motociclista',
                'preco' => 299.90,
                'descricao' => 'Capacete de segurança para motociclistas, certificado e seguro.',
                'categoria_id' => 8 // Automóveis
            ],
            [
                'nome' => 'Jogo de Tabuleiro',
                'preco' => 79.90,
                'descricao' => 'Jogo de tabuleiro divertido para toda a família.',
                'categoria_id' => 10 // Lazer
            ]
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
