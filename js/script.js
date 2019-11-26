window.onload = function() {

    if(document.getElementById('contBanner')){
        
        let contBanner = document.getElementById('contBanner');
	    let contDots = document.getElementById('contDots');
        let dots = document.getElementsByClassName("dot");
        let banners = document.getElementsByClassName("contSlider");
        let cont = 0;

        let numslider = banners.length;
        
        let contador = 0;

        function cambioBanner(index){

            for (var i = 0; i < banners.length; i++) {
                
                if (banners[i].getAttribute("numslide") == index) {
    
                       banners[i].classList.add("active");
    
                       isVideo = banners[i].getAttribute("video");
    
                       if (isVideo) {
                           video = banners[i].querySelector("video");
                           video.play();
                       }
                                                      
                }else{
                    banners[i].classList.remove("active");
    
                    isVideo = banners[i].getAttribute("video");
    
                    if (isVideo) {
                           video = banners[i].querySelector("video");
                           video.pause();
                       }
                }
            }
        }
	

        function cambioDots(index){
            for (var i = 0; i < dots.length; i++) {
                if (dots[i].getAttribute("numslide") == index) {
                    dots[i].classList.add("active");
                }else{
                    dots[i].classList.remove("active");
                }
            }
        }

        for (var i = 0; i < dots.length; i++) {
		
            dots[i].onclick = function(){
                contador = this.getAttribute("numslide");
                cambioBanner(contador);
                cambioDots(contador);
                
            }		
    
        }

        setInterval(function(){

            cont ++;
          
            if(cont > numslider-1){
                cont = 0;
            }

            Array.prototype.forEach.call(banners, (el)=>{
                if(el.getAttribute("numslide") == cont){
  
                    el.classList.add("active")
                  }else{
                    el.classList.remove("active");
                  
                  }
            })

            Array.prototype.forEach.call(dots, (el)=>{
                if(el.getAttribute("numslide") == cont){
  
                    el.classList.add("active")
                  }else{
                    el.classList.remove("active");
                  
                  }
            })


        }, 10000)
    }

    //active menu

    if(document.title == 'por-que-el-aleman'){
        menuActive = document.getElementById('menu-item-79');//79
        menuActive.classList.add('active');
    }
    else if(document.title == 'mision-vision' || document.title == 'historia' || document.title == 'idiomas'){
        menuActive = document.getElementById('menu-item-75');//75
        menuActive.classList.add('active');
    }

    //activacion menu responsive;
    if(document.getElementById('btn-menu')){
        let btnMenu = document.getElementById('btn-menu');
        let menuCont = document.getElementById('menuCont');
        let bgMenu = this.document.getElementById('bg-menu');

        btnMenu.onclick = ()=>{
            
            menuCont.classList.add('leftUp');
            bgMenu.classList.add('fadeIn');
        }

        bgMenu.onclick = ()=>{
            menuCont.classList.remove('leftUp');
            bgMenu.classList.remove('fadeIn');
        }
    }

    //active submenus responsive

    if(document.getElementById('contSubmenus')){
        let contSubmenus  = document.getElementById('contSubmenus');
        let titleSubMenus = document.getElementById('titleSubMenus');
        let isclick =  true;

        titleSubMenus.onclick = ()=>{


            if(isclick){

                contSubmenus.classList.add('menus-fadeIn');
                isclick = !isclick;
            }else{
                contSubmenus.classList.remove('menus-fadeIn');
                isclick = !isclick;
            }
        }


    }

    //activacion de sub menu desplegable para los submenus de submenus1
    if(this.document.querySelector(".contentItems")){
        
        const Submenus = document.querySelectorAll(".page-item-submenu1.subSubmenus a");
        //const contentItems = document.querySelectorall(".contentItems");

        Submenus.forEach(function(Submenu){

            Submenu.onclick = ()=>{
    
                Submenu.classList.toggle('active');
                // Submenu.querySelector(".contentItems").classList.toggle('open');
                Submenu.nextElementSibling.classList.toggle('open')
               
            }
        })


    }

    //submenu en tercer nivel de profundidad subemnu1
    if(this.document.querySelector(".page-item-submenu1.items.container a")){
        
        const Submenu2 = document.querySelector(".page-item-submenu1.items.container a");
        
        const submenuSub3 = document.querySelector(".itemsContainer");

        Submenu2.onclick = ()=>{
            this.console.log('hola')
            submenuSub3.classList.toggle('open');
        }

    }

    //contador regresivo
    if(document.getElementById('clock')){
    
        //constante para almacenar el tiempo faltante
        //deadline-> variable de el tiempo limite
        const getRemainTime = deadline => {

            //fecha actual
            let now = new Date();

            //fecha limite, tiempo en milisegundos dividimos para sacar en segundos y sumamos un segundo para que no se atrase un segundo el contador
            remainTime = (new Date(deadline) - now + 1000) / 1000;

            //obtener los segundos,usamos la clase Math para redondear ya que debe tener decimales
            //slice para que coja los dos ultimos dijitos esto es por q si el numero no es mayor a 9 debe ponerse un 0 ej 02, como funcionan los relojes
            remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2);

            //sacando los minutos dividimos en la cantidad de segundo que hay en un minuto, y modulo de cuantos minutos en una hora
            remainMinutes = ('0' + Math.floor(remainTime /60 % 60)).slice(-2);

            //horas -> dividimos en cantidad de segundos en una hora, y modulo de horas en un día
            remainHours = ('0' + Math.floor(remainTime /3600 % 24)).slice(-2);

            //obteniendo días -> multiplicamos los segundos por horas
            remainDays =  Math.floor(remainTime /(3600 * 24));

            return{
                remainTime,
                remainSeconds,
                remainMinutes,
                remainHours,
                remainDays
            }
        }

        const countDown = (deadline, d,h,m,s, finalMessage) =>{
            const elD = document.getElementById(d);
            const elH = document.getElementById(h);
            const elM = document.getElementById(m);
            const elS = document.getElementById(s);

            let time = getRemainTime(deadline);
                elD.innerHTML =`<h2>${time.remainDays}</h2> <span>Días</span>`;
                elH.innerHTML =`<h2>${time.remainHours}</h2> <span>Horas</span>`;
                elM.innerHTML =`<h2>${time.remainMinutes}</h2> <span>Minutos</span>`;
                elS.innerHTML =`<h2>${time.remainSeconds}</h2> <span>Segundos</span>`;

            //acutalizando cada segundo la fecha
            const timerUpdate = setInterval(() => {

                let time = getRemainTime(deadline);
                elD.innerHTML =`<h2>${time.remainDays}</h2> <span>Días</span>`;
                elH.innerHTML =`<h2>${time.remainHours}</h2> <span>Horas</span>`;
                elM.innerHTML =`<h2>${time.remainMinutes}</h2> <span>Minutos</span>`;
                elS.innerHTML =`<h2>${time.remainSeconds}</h2> <span>Segundos</span>`;

                if(time.remainTime <= 1){
                    clearInterval(timerUpdate);
                    el.innerHTML = finalMessage;
                }

            }, 1000);
        }

        countDown('Dec 06 2019 08:00:00 GMT-0500', 'd','h','m','s', '<h2>¡ HOY !</h2>')

    }

    if(document.getElementById('file-upload')){
        
        let imageUpload = document.getElementById("file-upload");
        let uploadMsg = document.getElementById("info");
        // display file name if file has been selected
        imageUpload.onchange = function() {
        let input = this.files[0];
        let text;
        if (input) {
            //process input
            text = imageUpload.value.substr(12);
        } else {
            text = "Please select a file";
        }
        uploadMsg.innerHTML = text;
        };
    }

}
