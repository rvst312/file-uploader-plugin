document.addEventListener('DOMContentLoaded', function () {
    // Obtén el botón y el campo de entrada
    var pathInput = document.getElementById('pathInput');

    // Función para cambiar la ruta
    function changePath(newPath) {
        // Construye la nueva URL con la nueva ruta
        var currentUrl = window.location.href.split('?')[0];
        var newUrl = currentUrl + '?path=' + encodeURIComponent(newPath);

        // Redirige a la nueva URL
        window.location.href = newUrl;
    }

    // Agrega eventos clic a los botones de cambio de ruta
    document.getElementById('changePathButton1').addEventListener('click', function () {
        changePath('oro');
    });

    document.getElementById('changePathButton2').addEventListener('click', function () {
        changePath('reloj');
    });

    document.getElementById('changePathButton3').addEventListener('click', function () {
        changePath('diamantes')
    });
});