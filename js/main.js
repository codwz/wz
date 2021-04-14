document.getElementById("btnBuscar").addEventListener('click', function(){
    console.log('click');
    var peticion = new XMLHttpRequest();
    peticion.open("GET","https://public-api.tracker.gg/v2/apex/standard/profile/psn/kaiser629");
    peticion.setRequestHeader("Accept" ,"application/json");
    peticion.setRequestHeader("TRN-Api-Key","298c6aee-f618-42c9-be6b-8bee55da5653");
    peticion.setRequestHeader("Accept-Encoding", "gzip");
    peticion.send();
    peticion.onreadystatechange = function(){
        if(this.readyState== 4 && this.status ==200){
            var todo = peticion.responseText;
            console.log(todo);
        }
    }
    
    


        
      
            
            
            
        
  
});
    