const placeholder = "https://m.media-amazon.com/images/I/31YAbWpcjYL._AC_.jpg";
const previewImg = document.getElementById('preview-img');
const imgInput = document.getElementById('img');

imgInput.addEventListener('change', function() {
   // PRENDE LA VALUE DELL'EVENTO IN CUI CI SI TROVA
   const url = this.value;
   if (url) previewImg.setAttribute('src', url);
   else previewImg.setAttribute('src', placeholder);
});