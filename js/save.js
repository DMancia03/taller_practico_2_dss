let btnSubmit = document.getElementById('sbmt'); 
let inputs = [document.getElementById('name'),
 document.getElementById('desc'), document.getElementById('date') ] 
btnSubmit.addEventListener("click", (e)=>{
    e.preventDefault(); 
    $.post("controlador/eventController.php?option=save", {
        "name": inputs[0].value, 
        "desc": inputs[1].value, 
        "date": inputs[2].value,
        "user": document.getElementById('user').value
    }, function(result){
        if(result){
            Swal.fire({
                title: '¡Se guardo el evento con exito!', 
                confirmButtonText: 'Ok, volver al inicio'}).then((result)=>{
                    if (result.isConfirmed) {
                        window.location = "dashboard.php"; 
                    }
                })
        }else{
            Swal.fire({
                title: 'Hubo un error al actualizar, vuelve a intentarlo', 
                confirmButtonText: 'Ok, volver al inicio'}).then((result)=>{
                    if (result.isConfirmed) {
                        location.reload(); 
                    }
                })
        }
      
    })
})