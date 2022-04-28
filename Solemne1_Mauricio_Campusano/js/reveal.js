//Script propio para efecto scroll reveal.
//se agrega un listener para detectar cuando se hace scroll a la pagina
//se calcula el top del window y se asigna la clase con efecto css para que aparezca
//el contenido que se encuetra en pantalla con una animación

window.addEventListener("scroll", reveal);
function reveal() {
  const revealElements = document.querySelectorAll(".reveal");
  for (let i = 0; i < revealElements.length; i++) {
    let windowsHeight = window.innerHeight;
    let revealTop = revealElements[i].getBoundingClientRect().top;
    let revealPoint = 100;
    if (revealTop < windowsHeight - revealPoint) {
      revealElements[i].classList.add("active");
    } else {
      revealElements[i].classList.remove("active");
    }
  }
}