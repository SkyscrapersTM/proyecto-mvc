const d = document,
botones = d.querySelectorAll('.bEliminar');

botones.forEach(boton => {
    boton.addEventListener('click', function(){
        const id = this.dataset.id;
        const confirm = window.confirm(`Deseas eliminar al item ${id}?`);
        if(confirm) {
            httpRequest('http://localhost/php/proyecto-mvc/consulta/eliminarItem/' + id, function(){
                d.getElementById('respuesta').innerHTML = this.responseText;
                const tbody = d.getElementById('tbody-items');
                const fila = d.querySelector('#fila-' + id);
                tbody.removeChild(fila);
            });
        }
    });
});

function httpRequest(url, callback) {
    const http = new XMLHttpRequest();
    http.open('GET', url);
    http.send();

    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}

//alert('hola');