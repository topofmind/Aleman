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
        
        const Submenu = document.querySelector(".page-item-submenu1.subSubmenus a");
        const contentItems = document.querySelector(".contentItems");

        Submenu.onclick = ()=>{

            Submenu.classList.toggle('active');
            contentItems.classList.toggle('open');
        }

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

}
