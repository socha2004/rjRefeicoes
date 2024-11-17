let carrinho = [
    { id: 1, nome: "Produto 1", preco: 10 },
    { id: 2, nome: "Produto 2", preco: 20 }
];

document.getElementById('removeFromCart').addEventListener('click', function () {
    let produtoId = 1; // Exemplo: Produto 1
    carrinho = carrinho.filter(produto => produto.id !== produtoId); // Remover produto pelo ID

    alert("Produto removido do carrinho!");
    // Aqui você pode atualizar a visualização do carrinho, ou salvar novamente no localStorage
});
