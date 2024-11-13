const accessKey = 't-dkj1viDMTTuPtahL13YnAAJezlrHqPjMktez9oKA8';
const query = 'car';

function fetchAndDisplayImage() {

    fetch(`https://api.unsplash.com/photos/random?query=${query}&client_id=${accessKey}`)
    .then(response => response.json())
    .then(data => {
        // Get the image URL from the response data
        const imageUrl = data.urls.regular;
    
        // Create an img element
        const imgElement = document.createElement('img');
    
        imgElement.id = 'car-image';
        imgElement.style.borderRadius = '10px';
    
        // Set the src attribute to the image URL
        imgElement.src = imageUrl;
    
        // Set alt text (optional but recommended)
        imgElement.alt = 'Car Image';
    
        // Append the img element to the container
        document.getElementById('car-image-container').appendChild(imgElement);
    })
    .catch(error => {
        alert("Se ha alcanzado el maximo de peticiones en una hora");
        console.error('Error fetching data:', error);
    });
}
fetchAndDisplayImage();
var button = document.getElementById('changeImageButton')
button.addEventListener('click', function() {
    // Reload the page
    location.reload();
}); 