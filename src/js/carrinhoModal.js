let carrinho = [];

// Função para atualizar o carrinho no modal
function atualizarCarrinho() {
    const carrinhoItens = document.getElementById("itens-carrinho");
    carrinhoItens.innerHTML = ""; // Limpa o conteúdo atual

    carrinho.forEach((item, index) => {
        const itemHTML = `
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>${item.nome}</strong>
                    <p>${item.quantidade}x - ${item.observacao || "Sem observações"}</p>
                </div>
                <span>${item.precoTotal.toFixed(2)} R$</span>
                <button class="btn btn-danger btn-sm" onclick="removerItem(${index})">Remover</button>
            </div>`;
        carrinhoItens.insertAdjacentHTML("beforeend", itemHTML);
    });
}

document.querySelectorAll('.btn-add-carrinho').forEach((button) => {
    button.addEventListener("click", function (e) {
        // Encontra os dados do produto dentro do modal
        const modalBody = e.target.closest(".modal-content").querySelector(".modal-body");
        const nomeProduto = modalBody.querySelector("p > span").textContent; // Nome do produto
        const precoUnitario = parseFloat(modalBody.querySelector(".preco-produto").textContent);
        const quantidade = parseInt(modalBody.querySelector(".qtd-produto").value) || 1;
        const observacao = modalBody.querySelector("input[type='text']").value;
        const precoTotal = precoUnitario * quantidade;

        // Adiciona ao array do carrinho
        carrinho.push({ nome: nomeProduto, quantidade, precoTotal, observacao });
        atualizarCarrinho(); // Atualiza o modal do carrinho
        $.notify("Produto adicionado ao carrinho.", "success");
    });
});

function removerItem(index) {
    carrinho.splice(index, 1);
    atualizarCarrinho();
    $.notify("Produto excluído do carrinho.", "info");
}

function abrirModal(){
    new bootstrap.Modal("#modal").show()
}
