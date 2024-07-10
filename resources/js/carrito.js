document.addEventListener("DOMContentLoaded", function () {
    const addToCart = document.querySelector(".bag__carrito");
    /* const closeModal = document.querySelector(".jsModalClose"); */

    addToCart.addEventListener("click", (event) => {
        const modal = document.getElementById("jsModalCarrito");
        modal.classList.add("active");
    });

    //CERRAMOS MODAL CUANDO HACEMOS CLICK FUERA DEL CONTENDINO DEL MODAL
    window.onclick = (event) => {
        const modal = document.querySelector(".modal.active");

        if (event.target == modal) {
            modal.classList.remove("active");
        }
    };
});
