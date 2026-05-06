// Seleciona todos os campos de quantidade
const camposQuantidade = document.querySelectorAll(".qtd-produto");

// Itera sobre cada campo de quantidade
camposQuantidade.forEach((campoQuantidade) => {
    campoQuantidade.addEventListener("keyup", function () {
        // Encontra o card pai correspondente
        const card = campoQuantidade.closest(".modal-body");

        // Seleciona os elementos de preço relativos ao card atual
        const precoProduto = card.querySelector(".preco-produto");
        const areaPrecoTotal = card.querySelector(".preco-total");

        // Calcula o preço total
        const precoTotal = (parseFloat(precoProduto.innerHTML) || 0) * (parseInt(campoQuantidade.value) || 0);

        // Atualiza a área de preço total
        areaPrecoTotal.innerHTML = precoTotal.toFixed(2);
    });
});
