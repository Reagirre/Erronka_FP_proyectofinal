// Function to fetch and display products
function selectKotxeak() {
    $.ajax({
        url: 'php/selectKotxeak.php',
        type: 'GET',
        success: function(response) {
            // Update category buttons
            // console.log(response);
            let categoryButtons = '';
            response.kategoriak.forEach(function(kategoria) {
                categoryButtons += `<button type="button" class="btn btn-secondary" onclick="filterCars('${kategoria}')">${kategoria}</button>`;
            });
            categoryButtons += `<button type="button" class="btn btn-secondary" onclick="resetFilter()">Guztiak</button>`;
            $('#categoryButtons').html(categoryButtons);

            // Update car cards
            let carCards = '';
            response.kotxeak.forEach(function(kotxea) {
                carCards += `
                    <div class="card" style="width: 18rem;" data-category="${kotxea.kategoria}">
                        <img class="card-img-top" src="../img/${kotxea.irudia}.jpg" alt="Kotxe argazkia">
                        <div class="card-body">
                            <div class="d-flex justify-content-around">
                                <div class="card-text">
                                    ${kotxea.marka} ${kotxea.modeloa}<br>
                                    ${kotxea.kategoria}
                                </div>
                                <a href="./?id=${kotxea.id}" data-id="${kotxea.id}" class="ver-mas btn btn-secondary align-self-center">
                                    Ver mas...
                                </a>
                            </div>
                        </div>
                    </div>`;
            });
            $('#car-container').html(carCards);
            $('.ver-mas').click(function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                console.log('Clicked on Ver mas with ID:', id);
                // Redirect to detail page with the ID
                window.location.href = 'php/detalle.php?id=' + id;
                    });
        },
        error: function(xhr, status, error) {
            console.error(error);
            console.error(xhr);
            console.error(status);
        }
    });
}


function filterCars(categoryId) {
    var categorySearch = document.getElementById("categorySearch").value;

    if (categoryId == null ||  categoryId == '')
    {
        $('#car-container .card').hide();
        $(`#car-container .card[data-category=${categorySearch}]`).show();
    } 
    else {
        $('#car-container .card').hide();
        $(`#car-container .card[data-category=${categoryId}]`).show();
    }
}

function resetFilter() {
    $('#car-container .card').show();
}

// Example usage
$(document).ready(function() {
    // Call the selectKotxeak function
    selectKotxeak();
    // console.log(document);
});