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

    if (data) {
      console.log("ok");


      window.location.href = window.location.origin + "/show-list/" + data;
    }

  }//postData

  const card = document.querySelectorAll('.formAjax');
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  let countCheckboxes = checkboxes.length;
  const span = document.querySelector('.title-todo');

  function conteur(countCheckboxes, span) {
    span.innerHTML = countCheckboxes;
    span.style.display = "inline-block";
  }
  conteur(countCheckboxes, span);


  card.forEach( (card) => {
    card.addEventListener('click', function (event) {
     
   
    if(event.target.tagName === 'INPUT'){
      const formattedFormCard = new FormData(card);
      ajax_update_task(formattedFormCard);
    }

    
  });

  async function ajax_update_task(formattedFormCard) {
    let url = window.location.origin + "/update-task";
    const response = await fetch(url, {
      method: 'POST',
      body: formattedFormCard
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.text();

    if (data) {
      console.log("ok");
     // decrémenter le nombre de checkbox avec la fonction countCheckboxes
      
      

    }
    
    window.location.href = window.location.origin + "/show-list/" + data;


  }//ajax_update_task
  
  
  });    

    
});
