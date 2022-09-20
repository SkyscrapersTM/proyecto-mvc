botonCarrito = document.querySelector('.btn-carrito');

document.addEventListener('DOMContentLoaded', event =>{
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
        botonCarrito.innerHTML = `(${count}) Carrito`;
    }
});