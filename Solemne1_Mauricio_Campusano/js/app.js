//Script propio, desarrolladocon el proposito de fijar estilo css que indica la sección
//a la que se le dió clic, dejando marcada la opción con un color y estilo diferente

//Intento escribir código en ingles como practica, aún me encuentro perfeccionando esto.


//agrego listener al window del navegador, en cuanto el documento este cargado se ejecuta el script
window.addEventListener("load", function () {

  //declaro estructura de datos con opciones del menu
  const optionsMenu = ["HOME", "ACERCA DE", "SERVICIOS", "GALERÍA", "CONTACTO"];

  //accedo a elementos del dom y guardo referencia en variables
  const mobileOptions = document.getElementById("mobile-options");
  const checkMobile = document.getElementById("check-mobile");

  //Listener para escuchar el evento clic sobre elemento del dom
  //en este caso verifico si la opcion que se le hizo clic se encuentra dentro del arreglo optionsMenu
  //si es así asigno false a cheked de elemento checkMobile para que el menú responsive se retire y muestre el contenido
  //esto solo se puede ver en acción con la vista responsive
  mobileOptions.addEventListener("click", (e) => {
    const clickInOption = optionsMenu.includes(e.target.textContent);
    if (clickInOption) {
      checkMobile.checked = false;
    }
  });

  //accedo a elementos del dom y guardo referencia en variables
  const navDeskContainer = this.document.getElementById("navDeskContainer");
  //Listener para escuchar el evento clic sobre elemento del dom
  //en este caso verifico que se le de clic a alguna opción del menu nav
  //y le quito la clase que indica que sección esta activa a todas las opciones
  //y luego le agrego la clase al target donde se hizo clic, es decir, a la opción del menú
  //esto solo se puede ver en acción en la visto desktop
  navDeskContainer.addEventListener("click", (e) => {
    const [classTarget] = Array.from(e.target.classList);
    const textTarget = e.target.textContent;
    if (clickInOption(textTarget) && classTarget !== undefined) {
      removeActiveClassFromNav();
      e.target.classList.add("active-section");
    }
  });
});

//Funciones

function clickInOption(option) {
  const optionsMenu = ["HOME", "ACERCA DE", "ARTICULOS", "ESTADISTÍCAS", "CONTACTO"];
  return optionsMenu.includes(option);
}

function removeActiveClassFromNav() {
  const navMenu = document.getElementsByClassName("nav-desk-item");
  Array.from(navMenu).forEach((item) => {
    item.classList.remove("active-section");
  });
}
