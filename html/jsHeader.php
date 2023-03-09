
 </div>

 <script>
      const btnMobile = document.getElementById("btn_icon_header");
      const btnDrobDownCadastra = document.getElementById("btnDrobDownCadastra");
      const btnDrobDownConfig = document.getElementById("btnDrobDownConfig");
        function toggleMenu(event) {
            if (event.type === "touchstart") event.preventDefault();
            const nav = document.getElementById("nav");
            nav.classList.toggle("active");
            const active = nav.classList.contains("active");
        }
        function togglecadastro(event) {
            if (event.type === "touchstart") event.preventDefault();
            const subMenuCadastrar = document.getElementById("subMenuCadastrar");
            subMenuCadastrar.classList.toggle("active");
            const active = subMenuCadastrar.classList.contains("active");
        }
        function toggleconfig(event) {
            if (event.type === "touchstart") event.preventDefault();
            const subMenuConfig = document.getElementById("subMenuConfig");
            subMenuConfig.classList.toggle("active");
            const active = subMenuConfig.classList.contains("active");
        }

      btnMobile.addEventListener("click", toggleMenu);
      btnMobile.addEventListener("touchstart", toggleMenu);
      btnDrobDownCadastra.addEventListener("click",togglecadastro);
      btnDrobDownCadastra.addEventListener("touchstart",togglecadastro);
      
      btnDrobDownConfig.addEventListener("click",toggleconfig);
      btnDrobDownConfig.addEventListener("touchstart",toggleconfig);
    
    </script>
 <!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>    
