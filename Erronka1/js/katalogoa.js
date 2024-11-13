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