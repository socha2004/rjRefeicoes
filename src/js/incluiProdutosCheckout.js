document.querySelector('form').addEventListener('submit', function (e) {
    // Capturar os dados da tabela
    const carrinhoResumo = [];
    const valorPrecoTotal = document.querySelector(".valorTotal").innerHTML;
    console.log(valorPrecoTotal)
    document.querySelectorAll('#resumo-carrinho tr').forEach(row => {
        const produto = row.cells[0]?.textContent.trim();
        const quantidade = row.cells[1]?.textContent.trim();
        const preco = row.cells[2]?.textContent.trim();
        const observacao = row.cells[3]?.textContent.trim();
        
        if (produto && quantidade && preco) {
            carrinhoResumo.push({
                nome: produto,
                quantidade: quantidade,
                precoTotal: preco,
                observacao: observacao || ''
            });
        }
    });

    // Criar input oculto no formulário para enviar os dados do carrinho
    const precoTotal = document.createElement('input');
    precoTotal.type = 'hidden';
    precoTotal.name = 'precoTotal';
    precoTotal.value = valorPrecoTotal;
    this.appendChild(precoTotal);

    const carrinhoInput = document.createElement('input');
    carrinhoInput.type = 'hidden';
    carrinhoInput.name = 'carrinhoResumo';
    carrinhoInput.value = JSON.stringify(carrinhoResumo);
    this.appendChild(carrinhoInput);
});
