// Seleciona todos os elementos com a classe 'produtos'
const produtosElements = document.querySelectorAll('.produtos');
console.log(produtosElements)
// Itera sobre cada elemento
produtosElements.forEach((produtosElement) => {
    // Obtém o conteúdo (string) do elemento atual
    const jsonString = produtosElement.innerHTML.trim();

    // Verifica se o conteúdo não está vazio
    if (jsonString) {
        try {
            console.log("Entrou no if e try")
            // Converte a string JSON em um array
            const data = JSON.parse(jsonString);

            // Cria uma nova <ul> para listar os produtos
            const ul = document.createElement('ul');

            // Adiciona cada item do array à lista
            data.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `Produto: ${item.nome}, Preço Total: R$${item.precoTotal}`;
                ul.appendChild(li);
            });

            // Localiza o elemento mais próximo com a classe 'produtos-area'
            const cardElement = produtosElement.closest('.card'); // Garante o escopo do card
            const produtosArea = cardElement.querySelector('.produtos-area');

            if (produtosArea) {
                produtosArea.appendChild(ul); // Adiciona a lista à área de produtos
            } else {
                console.error('Não foi possível encontrar ".produtos-area" para este card.');
            }s
        } catch (error) {
            console.error('Erro ao processar JSON:', error);
        }
    }
});
