let encabezadoSticky = ()=>{
  let blockSuggestion = document.querySelector('#blockSuggestion');
  let menuVision = false;
  
  if (window.screen.width < 800) {
    let burgerMenu = document.querySelector("#burgerMenu");
    burgerMenu.addEventListener('click',(e)=>{
      e.preventDefault();	
      if(menuVision === false){
        blockSuggestion.style.left = '0';
        blockSuggestion.style.transition = '0.5s';
        burgerMenu.style.backgroundImage = "url(./img/times-solid.svg)";
        menuVision = true; 
      }else{
        blockSuggestion.style.left = '-100%';
        burgerMenu.style.backgroundImage = "url(./img/bars-solid.svg)";
        burgerMenu.style.transition = '0.5s';
        menuVision = false;	}
      })  
      
      let botonTop = document.querySelector(".top_icon");
      botonTop.addEventListener("click", ()=>{ window.scrollTo(0,0); })
    }
    else{	
      let header = document.querySelector("#header");
      let sticky = header.offsetTop+140;
      
      let cambiarHeader = ()=> { 
        if (window.pageYOffset > sticky) { header.classList.add("headerSticky");
      } else { header.classList.remove("headerSticky"); }
    } 
    window.addEventListener("scroll", cambiarHeader);
  }
}


document.addEventListener('DOMContentLoaded', ()=>{
  encabezadoSticky()
  iniciar();
})