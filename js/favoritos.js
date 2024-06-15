window.addEventListener("load", function () {

  function cargarFavoritos() {
    const favoritosElement = document.querySelector("#favoritos");
    if (favoritosElement) {
      const favoritos = JSON.parse(localStorage.getItem("favoritos")) || []; //Si no hay nada en el localstorage, se crea un array vacío
      favoritos.forEach((pelicula) => {
        if (pelicula) {
          const card = document.createElement("div");
          card.classList.add("card");
          card.innerHTML = `
          <div class="card" style="width: 38rem;">
            <img src="../html/assets/img/${pelicula.cartel}" class="card-img-top" alt="${pelicula.nombre}">
          <div class="card-body">
                <h5 class="card-title">${pelicula.nombre}</h5>
                <p class="card-text">${pelicula.director}</p>
                <p class="card-text">${pelicula.valoracion} €</p>
                 <button class="btn btn-danger" data-pelicula-nombre="${pelicula.nombre}">Eliminar favorito</button>
        </div>
    </div>
    `;
          favoritosElement.appendChild(card);
        }
      });
    }
  }
  cargarFavoritos();

    function eliminarFavorito(nombre) {
        const favoritos = JSON.parse(localStorage.getItem("favoritos")) || [];
        const nuevoArray = favoritos.filter((pelicula) => pelicula.nombre !== nombre);
        localStorage.setItem("favoritos", JSON.stringify(nuevoArray));
        location.reload();
    }

    document.addEventListener("click", (event) => {
        if (event.target.tagName === "BUTTON") {
            const nombre = event.target.getAttribute("data-pelicula-nombre");
            eliminarFavorito(nombre);
        }
    });
});
