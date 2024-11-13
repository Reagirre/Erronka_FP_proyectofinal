function loadHTML(url, elementId) {
    fetch(url)
      .then(response => response.text())
      .then(data => {
        document.getElementById(elementId).innerHTML = data;
      })
      .catch(error => console.error(error));
}
  
// Cargar el header y el footer
loadHTML('footer.html', 'footer');