let agenda = document.getElementById('agenda'); 

agenda.addEventListener("click", (e)=>{
    if(e.target.classList.contains('del-btn')){
        let btn = e.target; 
        let idSplit = btn.id.split('_'); 
        Swal.fire({
            title: '¿Quiéres eliminar este evento?',
            showDenyButton: true,
            confirmButtonText: 'Eliminar',
            denyButtonText: `No, quiero conservarlo`,
          }).then((result) => {
            if (result.isConfirmed) {
                $.post("controlador/eventController.php?option=delete", 
                {"id" : idSplit[1]}, function(result){
                    if(result == true){
                        Swal.fire({
                            title: '¡Se elimino el evento con exito!', 
                            confirmButtonText: 'Ok, volver al inicio'}).then((result)=>{
                                if (result.isConfirmed) {
                                    location.reload()
                                }
                            })

                    }else{

                    }
                })
            } else if (result.isDenied) {
              Swal.fire('Eliminación cancelado', '', 'cerrar')
            }
          })    }


})