document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector('.slider');
    let isHovered = false;
    const cardWidth = 290; // Ancho de una tarjeta (250px) más el espacio (40px)
    let interval;

    // Función para mover el slider
    function moveSlider() {
        slider.style.transition = 'transform 0.5s ease';
        slider.style.transform = `translateX(-${cardWidth}px)`; // Mueve el slider hacia la izquierda

        setTimeout(() => {
            slider.appendChild(slider.firstElementChild); // Mueve la primera tarjeta al final
            slider.style.transition = 'none'; // Evita animación en el reinicio
            slider.style.transform = 'translateX(0)'; // Resetea la posición
        }, 500); // 500ms es el tiempo de la animación
    }

    // Iniciar el intervalo para mover el slider cada 2 segundos
    interval = setInterval(moveSlider, 2000);

    // Pausar el slider al pasar el mouse
    slider.addEventListener('mouseenter', () => {
        clearInterval(interval); // Detiene el movimiento automático
    });

    // Reanudar el slider cuando el mouse sale
    slider.addEventListener('mouseleave', () => {
        interval = setInterval(moveSlider, 2000); // Reanuda el movimiento
    });
});
