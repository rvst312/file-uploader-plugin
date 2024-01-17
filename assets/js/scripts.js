document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.querySelectorAll('.change-view-button');
    var dynamicContent = document.getElementById('dynamic-content');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            var param1 = this.getAttribute('data-param1');
            var param2 = this.getAttribute('data-param2');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    dynamicContent.innerHTML = xhr.responseText;
                }
            };
            xhr.send('action=change_view&param1=' + param1 + '&param2=' + param2);
        });
    });
});