const form = document.querySelector(".formComm"),
identify = form.querySelector(".pid").value,
comment = form.querySelector(".commentperse"),
sendBtn = form.querySelector(".subCom"),
commend = document.querySelector(".commend");

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "bts/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){

      }
    }
    // let formData = new FormData(form);
    xhr.send(form);
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "bts/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            commend.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
}, 500);