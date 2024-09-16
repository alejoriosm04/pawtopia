document.querySelectorAll('input[name="species"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        let species = this.value;
        let categorySelector = document.getElementById('category-selector');

        categorySelector.innerHTML = '<option value="">' + adminProductSelectCategory + '</option>';

        categories.forEach(function(category) {
            if (category.species === species) {
                categorySelector.innerHTML += '<option value="' + category.id + '">' + category.name + '</option>';
            }
        });
    });
});
