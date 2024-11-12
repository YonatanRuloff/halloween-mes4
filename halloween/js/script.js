document.addEventListener('DOMContentLoaded', () => {
    const botonesVotar = document.querySelectorAll('.votar');
    botonesVotar.forEach(boton => {
        boton.addEventListener('click', () => {
            const disfrazId = boton.getAttribute('data-id');
            alert(`Votaste por el disfraz con ID: ${disfrazId}`);
            // Aquí puedes agregar lógica para enviar el voto al servidor
        });
    });
});
