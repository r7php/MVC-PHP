        
const btn = document.getElementById("btnCPF");
const baseURL = 'https://jsonplaceholder.typicode.com';


btn.addEventListener("click",()=>{
    var cpf = document.getElementById("infoInput").value;
    var info = document.getElementById("res");
    if(cpf == ""){
        alert("Digite um cpf");
    }else{
        info.style.display = 'block';
        fetch('http://172.22.4.108:9392/feed/ajax/buscar_cpf_base/'+cpf)
          .then(response =>response.json())
          .then(data=>{
            info.style.display = 'none';
            document.getElementById('msg-res').innerHTML = data[0].registration_number;
          })
          .catch(error=>{
            alert("Nao existe na base");
            
          });
    }
});

        

function applyCpfMask(event) {
            const input = event.target;
            let value = input.value.replace(/\D/g, ''); // Remove non-digit characters
            
            // Apply CPF mask
            if (value.length <= 3) {
                input.value = value;
            } else if (value.length <= 6) {
                input.value = value.replace(/(\d{3})(\d+)/, '$1.$2');
            } else if (value.length <= 9) {
                input.value = value.replace(/(\d{3})(\d{3})(\d+)/, '$1.$2.$3');
            } else {
                input.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d+)/, '$1.$2.$3-$4');
            }
}

        
