var input = document.getElementById("autocomplete");

autocomplete({
    input: input,
    emptyMsg: "Aucun résultats correspondant",
    fetch: function(text, update) {

        text = text.toLowerCase();
        // you can also use AJAX requests instead of preloaded data
        var suggestions = fetch('/username_autocomplete?email=' + text)
            .then(r => {
                return r.json();
            }).then(data => {
                update(data);
            })
    },
    onSelect: function(item) {
        input.value = item.email;
    },
    render: function(item, currentValue) {
        const itemElement = document.createElement('div');
        itemElement.classList.add('border', 'pointer');
        const link = document.createElement('a')
        link.setAttribute('href', '#')
        link.classList.add('autocomplete-item')
        link.textContent = item.email;
        link.addEventListener('click', function (e) {
            e.preventDefault()
        })
        itemElement.appendChild(link)

        return itemElement;
    }
});