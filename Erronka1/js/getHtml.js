async function cargarContenido(id, archivo) {
    try {
        const response = await fetch(archivo);
        const data = await response.text();
        document.getElementById(id).innerHTML = data;
    } catch (error) {
        console.error('Error loading content:', error);
    }
}


// function cargarContenido(id, archivo) {
//     fetch(archivo)
//         .then(response => response.text())
//         .then(data => {
//             document.getElementById(id).innerHTML = data;
//         });
// }

// cargarContenido('header', 'header.php');
// cargarContenido('footer', 'footer.php');

// cargarContenido('katalogoa', 'katalogoa/index.php');
cargarContenido('hasiera', 'hasiera/index.php');
cargarContenido('usuario', 'erabiltzailea/index.php');
// cargarContenido('content', 'content.php');

document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar el botón de usuario
    var botonUsuario = document.getElementById('botonUsuario');
    
    // Manejar el evento de clic en el botón
    botonUsuario.addEventListener('click', function () {
        // Mostrar u ocultar el main de usuario según su estado actual
        var mainUsuario = document.getElementById('usuario');
        var mainHasiera = document.getElementById('hasiera');
        
        mainUsuario.classList.remove('d-none');
        mainHasiera.classList.add('d-none');
    });
});
