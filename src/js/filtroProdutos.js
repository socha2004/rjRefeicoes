const navItems = document.querySelectorAll(".nav-item");
const cardProduto = document.querySelectorAll(".card");
const botaoReset = document.querySelector(".navbar-brand");

function filtrarProdutos(categoria) {
    cardProduto.forEach(cardProduto => {
      // Mostra ou esconde os produtos dependendo da categoria
      if (categoria === 'all' || cardProduto.getAttribute('data-category') === categoria) {
        cardProduto.style.display = 'block';
      } else {
        cardProduto.style.display = 'none';
      }
    });
  }
  
  botaoReset.addEventListener('click', () => {
    filtrarProdutos('all');
  });

  // Adiciona o evento de clique a cada nav-item
  navItems.forEach(item => {
    item.addEventListener('click', () => {
      const categoria = item.getAttribute('data-category');
      filtrarProdutos(categoria);
    });
  });

  botaoReset.addEventListener("click", resetaFiltro());

 