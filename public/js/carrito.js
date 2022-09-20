const d = document,
bCarrito = d.querySelector('.btn-carrito');

d.addEventListener('DOMContentLoaded', event =>{
    // cookies
    const cookies = document.cookie.split(';');
    let cookie = null;
    cookies.forEach(item =>{
        if(item.indexOf('items') > -1){
            cookie = item;
        }
    });

    if(cookie != null){
        const count = cookie.split('=')[1];
        bCarrito.innerHTML = `(${count}) Carrito`;
    }
});

bCarrito.addEventListener('click', event => {
    const carritoContainer = d.querySelector('#carrito-container');
    if (carritoContainer.style.display == '') {
        carritoContainer.style.display = 'block';
        actualizarCarritoUI();
    }else {
        carritoContainer.style.display = '';
    }
});

function actualizarCarritoUI() {
    fetch('http://localhost/php/proyecto-mvc/carrito/action/mostrar')
        .then(response => response.json())
        .then(data => {
            let tablaCont = d.querySelector('#tabla');
            let precioTotal = '';
            let html = '';
            data.items.forEach(element => {
                html += `
                    <div class='fila'>
                        <div class='imagen'>
                            <img src='http://localhost/php/proyecto-mvc/public/img/${element.imagen}' width='100'/>
                        </div> 

                        <div class='info'>
                            <input type='hidden' value='${element.id}' />
                            <div class='nombre'>${element.nombre}</div>
                            <div>${element.cantidad} items de S/${element.precio}</div>
                            <div>Subtotal: S/${element.subtotal}</div>
                            <div class='botones'><button class='btn-remove'>Quitar 1 del carrito</button></div>
                        </div> 
                    </div>
                `;
            });
            precioTotal = `<p>Total: S/${data.info.total}</p>`;
            tablaCont.innerHTML = precioTotal + html;

            document.cookie = `items=${data.info.count}`;
            
            bCarrito.innerHTML = `(${data.info.count} Carrito)`;

            d.querySelectorAll('.btn-remove').forEach(boton => {
                boton.addEventListener('click', e=> {
                    const id = boton.parentElement.parentElement.children[0].value;
                    removeItemFromCarrito(id);
                });
            });
        });
}

const botones = d.querySelectorAll('.btn-add');

botones.forEach(boton => {
    const id = boton.parentElement.parentElement.children[0].value;
    boton.addEventListener('click', e => {
        addItemToCarrito(id);
    });
});

function removeItemFromCarrito(id) {
    fetch('http://localhost/php/proyecto-mvc/carrito/action/remove/' + id)
        .then(res => res.json())
        .then(data => {
            actualizarCarritoUI();
        });
}

function addItemToCarrito(id) {
    fetch('http://localhost/php/proyecto-mvc/carrito/action/add/' + id)
        .then(res => res.json())
        .then(data => {
            actualizarCarritoUI();
        });
}

//alert('hi');