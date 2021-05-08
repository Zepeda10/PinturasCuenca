$(".form-eliminar").submit(function(e){
			e.preventDefault();
			
			Swal.fire({
			title: '¿Está seguro de eliminar el registro?',
			text: "Esta acción es irreversible",
			icon: 'warning',
            iconColor:"#d33",
			showCancelButton: true,
			confirmButtonColor: '#0A2363',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Eliminar',
			cancelButtonText: 'Cancelar',
            width: '500px',
            height:"400px"
			
			}).then((result) => {
			if (result.isConfirmed) {
				this.submit();
			}
			})

});