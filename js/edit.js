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
}
