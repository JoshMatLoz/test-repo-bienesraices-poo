const d = document;

d.addEventListener("DOMContentLoaded", (e) => {
  eventListeners();
  darkMode();
});

function eventListeners() {
  const mobileMenu = d.querySelector('.mobile-menu');

  mobileMenu.addEventListener("click", navegacionResponsive);
};

function navegacionResponsive() {
  const navegacion = d.querySelector('.navegacion');

  navegacion.classList.toggle('mostrar');
};

function darkMode() {
  const darkModePrefs = window.matchMedia('(prefers-color-scheme: dark)');
  const botonDarkMode = d.querySelector('.dark-mode-boton');

  if (darkModePrefs.matches) {
    d.body.classList.add('dark-mode');
  } else {
    d.body.classList.remove('dark-mode');
  }

  darkModePrefs.addEventListener('change', e => {

    if (darkModePrefs.matches) {
      d.body.classList.add('dark-mode');
    } else {
      d.body.classList.remove('dark-mode');
    }
  })

  botonDarkMode.addEventListener('click', e => {
    d.body.classList.toggle('dark-mode');
  });
}
