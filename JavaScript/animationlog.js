const card  = document.getElementById('card');
const inputUser  = document.getElementById('input-usuario');
const inputPass  = document.getElementById('input-clave');
const body = document.querySelector('body');
const anchoMid = window.innerWidth/2;
const altoMid = window.innerHeight/2;

body.addEventListener('mousemove',(m)=>{
  if(m.clientX < anchoMid && m.clientY < altoMid){
    card.src = "/SmartBuy/img/I_AR.png";
 }
 else if(m.clientX < anchoMid && m.clientY> altoMid){
  card.src = "/SmartBuy/img/I_AB.png";
 }
 else if(m.clientX > anchoMid && m.clientY< altoMid){
  card.src = "/SmartBuy/img/D_AR.png";
 }
 else{
 
    card.src = "/SmartBuy/img/D_AB.png";
   }
 
})

   
  
