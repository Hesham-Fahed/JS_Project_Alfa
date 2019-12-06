const myForm = document.getElementById("myForm"); 

const inpFile = document.getElementById("inpFile"); 

myForm.addEventListener('submit' , e=>{
    e.preventDefault(); 
    console.log('myForm' , myForm);
    console.log('inpFile' , inpFile);

    
    const endpoint = "upload.php"; 
    const formData = new FormData(); 

    formData.append("inpFile" , inpFile.files[0]); 

    fetch(endpoint , {
        method:"post", 
        body:formData
    }).catch(console.error);

});