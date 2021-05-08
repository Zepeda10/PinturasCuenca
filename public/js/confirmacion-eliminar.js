$(".form-eliminar").submit(function(e){
    e.preventDefault();
    
    Swal.fire({
    title: '¿Está seguro de eliminar el registro?',
    text: "Esta acción es irreversible",
    icon: 'Advertencia',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar'
    
    }).then((result) => {
    if (result.isConfirmed) {
        this.submit();
    }
    })

});