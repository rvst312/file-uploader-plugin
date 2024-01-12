// // Lógica de manejo de las carpetas en el cliente. Se envia un valor al servidor en cada petición, el cual se usa de parametro
// document.addEventListener('DOMContentLoaded', function () {
//
//    const folders = document.getElementsByClassName('folders');
//
//    for (let i = 0; i < folders.length; i++) {
//
//        folders[i].addEventListener('click', function () {
//
//            let value = this.getAttribute('data-valor');
//            console.log('ready click en: ' + value);
//            // Realiza una solicitud AJAX al servidor
//            let xhr = new XMLHttpRequest();
//            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
//            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
//            xhr.send('action=process_click&value=' + encodeURIComponent(value));
//        });
//    }
//});
