 function  getMessage(){
  const requetAjax = new XMLHttpRequest();
  requetAjax.open("GET","handler.php");
  requetAjax.onload = function() {
    const resultat = JSON.parse(requetAjax.responseText);
    const html  =  resultat.reverse().map(function(message){
      return  ` <div class="msg">
    <span class="date">${message.created_at.substring(11,16)}</span>
    <span class="author">${message.author}</span>
    <span class="content">${message.content} </span` 
  }).join('')
    const message = document.querySelector('message');
    message.innerHTML =html;
    message.scrollTop = message.scollHeight;
  }
  requetAjax.send();

 }
 function postMessage(event){
  event.preventDefault();
  const author = document.querySelector('#author');
  const content = document.querySelector('#content');
   const data = new Form Data();
   data.append('author', author.value);
    data.append('content' , content.value);
    const requetAjax = new XMLHttpRequest();
    requetAjax.open('POST','handler.php?task="write');

requetAjax.onload = function(){
  content.value='';
  content.focus();
  getMessage();
 }
 requetAjax.send(data);
}
document.querySelector('form').addEventListener('submit',postMessage);
const interval =window.setInterval(getMessage,1000);
getMessage();
 
