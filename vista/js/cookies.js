var capaInfo = document.querySelector('.cookies'); let first = true;

let iniciar = ()=>{
  if (localStorage.getItem('cookie') !== null && localStorage.getItem('cookie') === 'true') {
    aceptarCookies(); }
  else if(localStorage.getItem('cookie') !== null && localStorage.getItem('cookie') === 'false'){  
    } 
  else { mostrarCartelCookies(); scrollAceptado(); }   
}

function ajax(config){
  var xhr = new XMLHttpRequest();
  xhr.open(config.metodo, config.url, true);
  xhr.addEventListener("load", ()=>{ 
    if(xhr.readyState == 4 && xhr.status == 200){
      config.parametros(xhr.response);
    }
  })
  xhr.send();
}

let mostrarCartelCookies = ()=>{
  ajax({
    metodo:"GET",
    url:"vista/modulos/cookies_contenido.php",
    parametros:(respuesta)=>{ capaInfo.innerHTML = respuesta; }
  });
}

let datosCookies = ()=>{
  let head = document.querySelector('head');
  let header = document.querySelector('header');
  let adsense = document.createElement('script');
  let analytics = document.createElement('script');
  let facebookSDK = document.createElement('script');
  let pinterest = document.createElement('script');
  let analyticsAndTwitter = document.createElement('script');
  adsense.setAttribute("data-ad-client","ca-pub-4393812899161447")
  adsense.setAttribute("async",""); //antes async
  adsense.setAttribute("src","https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" )
  head.appendChild(adsense);
  analytics.setAttribute("async",""); // antes async
  analytics.setAttribute("src","https://www.googletagmanager.com/gtag/js?id=UA-163587257-1" ) //
  head.appendChild(analytics);
  facebookSDK.setAttribute("async","");
  facebookSDK.setAttribute("async","");
  facebookSDK.setAttribute("crossorigin","anonymous");
  facebookSDK.setAttribute("src","https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0&appId=475513462895671") //  
  var pariente = header.parentNode;
  pariente.insertBefore(facebookSDK, header);
  pinterest.setAttribute("async","");
  pinterest.setAttribute("async","");
  pinterest.setAttribute("src","//assets.pinterest.com/js/pinit.js") //  
  head.appendChild(pinterest);
  analyticsAndTwitter.setAttribute("async","");
  analyticsAndTwitter.setAttribute("async","");
  analyticsAndTwitter.setAttribute("src","vista/js/social.js") //
  head.appendChild(analyticsAndTwitter); 
}

let aceptarCookies = ()=> {
  localStorage.setItem('cookie', true);
  datosCookies()
  capaInfo.remove();
}

let scrollAceptado = ()=>{
  document.addEventListener('scroll', () => {
    if (document.documentElement.scrollTop > 400 || document.body.scrollTop > 400) {
      if (first === true) {
        aceptarCookies();
        first = false;
        return;
      }
    }
    return;
  })
}

let denegarCookies = ()=> {
  capaInfo.remove();
  localStorage.setItem('cookie', false);
  first = false;
}
