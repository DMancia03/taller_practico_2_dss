let btnEdit = document.getElementById('edit_btn'); 
let cancel = document.getElementById('cancel_btn'); 
let btnSubmit = document.getElementById('sbmt'); 
let inputs = [document.getElementById('name'),
 document.getElementById('desc'), document.getElementById('date') ] 
btnEdit.addEventListener("click", (e)=>{

        btnEdit.classList.add('hidden'); 
        cancel.classList.toggle('hidden'); 
        btnSubmit.classList.toggle('hidden'); 
        for(index = 0; index<inputs.length; index++){
            inputs[index].disabled = false; 
        }
        other(); 
    
})
function other(){
    cancel.addEventListener("click", (e)=>{
        btnEdit.classList.toggle('hidden'); 
        cancel.classList.toggle('hidden'); 
        btnSubmit.classList.toggle('hidden'); 
        for(index = 0; index<inputs.length; index++){
                inputs[index].disabled = true; 
        }
    })
    btnSubmit.addEventListener("click", (e)=>{
        e.preventDefault(); 
        $.post("controlador/eventController.php?option=update", {
            "name": inputs[0].value, 
            "desc": inputs[1].value, 
            "date": inputs[2].value,
            "user": document.getElementById('user').value,
            "event": document.getElementById('event').value
        }, function(result){
            if(result){
                Swal.fire({
                    title: '¡Se actualizo el evento con exito!', 
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
}

