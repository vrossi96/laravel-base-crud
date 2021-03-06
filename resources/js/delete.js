const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
   const name = form.getAttribute('data-name');
   form.addEventListener('submit', (e) => {
      e.preventDefault();
      const deleteItem = confirm(`Sei sicuro di voler eliminare ${name}?`);
      if(deleteItem) e.target.submit();
   })
})