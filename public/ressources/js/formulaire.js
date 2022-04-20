
window.addEventListener("DOMContentLoaded", (event) => {
  // On récupere le formulaire edit-list et on lui ajoute un eventListener puis en creer une modal avec un formualire pour éditer la liste
  const editList = document.querySelectorAll('.edit-list');
  editList.forEach(function(element) {
    element.addEventListener('click', function(event) {
      event.preventDefault();
     const form_list = document.querySelector('.edit-list-form');
      form_list.style.display = 'block';
    });
    
  });




});// Fin de la fonction window.addEventListener