document.getElementById('species-selector').addEventListener('change', function() {
    let speciesId = this.value;
    let categorySelector = document.getElementById('category-selector');

    categorySelector.innerHTML = '<option value="">' + adminProductSelectCategory + '</option>';

    categories.forEach(function(category) {
        if (category.species_id == speciesId) {
            categorySelector.innerHTML += '<option value="' + category.id + '">' + category.name + '</option>';
        }
    });
});
