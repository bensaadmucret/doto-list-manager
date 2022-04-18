window.addEventListener("DOMContentLoaded", (event) => {

  console.log("DOM entièrement chargé et analysé");
  const form = document.getElementById('add-task');
  console.log(form);
  form.addEventListener('submit', function (event) {
    event.preventDefault();
    console.log("Formulaire soumis");

    const formattedFormData = new FormData(form);
    postData(formattedFormData);
  });

  async function postData(formattedFormData) {
    let url = window.location.origin + "/add-task";
    const response = await fetch(url, {
      method: 'POST',
      body: formattedFormData
    });

    if (!response.ok) {
       throw new Error(`HTTP error! status: ${response.status}`);
     }

    const data = await response.text();

    if(data){
      console.log("ok");
          

      window.location.href = window.location.origin + "/show-list/" + data;
    }

  }//postData

     const card = document.querySelector('#DZ_W_Todo4');
     const checkboxes = document.querySelectorAll('input[type="checkbox"]');
     const countCheckboxes = checkboxes.length;
     let span = document.querySelector('.title-todo');
     span.innerHTML = countCheckboxes;
     span.style.display = "block";
     console.log(countCheckboxes);
   
  console.log(card);
      card.addEventListener('click',  (event) => {
        console.log("click");

        if (event.target.tagName === 'INPUT') {
          console.log("input");
          let checkboxes = document.querySelectorAll('input[type="checkbox"]');
          let countCheckboxes = checkboxes.length;
          countCheckboxes--;
          let span = document.querySelector('.title-todo');
          span.innerHTML = countCheckboxes;
          span.style.display = "block";
          console.log(countCheckboxes);
        }
      });

});// fin de la fonction d'écoute de l'événement DOMContentLoaded
