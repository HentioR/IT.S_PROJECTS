new WOW().init();

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

// ajout de la classe JS à HTML
document.querySelector("html").classList.add('js');

// initialisation des variables
var fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");

// action lorsque la "barre d'espace" ou "Entrée" est pressée
button.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput.focus();
    }
});

// action lorsque le label est cliqué
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});

// affiche un retour visuel dès que input:file change
fileInput.addEventListener( "change", function( event ) {
    the_return.innerHTML = this.value;
});



// smooth scroll
$(document).ready(function() {
  $('.js-scrollTo').on('click', function() { // Au clic sur un élément
    var page = $(this).attr('href'); // Page cible
    var speed = 750; // Durée de l'animation (en ms)
    $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
    return false;
  });
});
