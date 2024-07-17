document.addEventListener("DOMContentLoaded", function() {
    console.log("External script loaded successfully!");

    // Find the placeholder div
    var placeholder = document.getElementById('external-script-placeholder');

    if (placeholder) {
        // Create a new ul element
        var ul = document.createElement('ul');

        // Create list items
        var items = ['Item 1', 'Item 2', 'Item 3'];
        items.forEach(function(item) {
            var li = document.createElement('li');
            li.textContent = item;
            ul.appendChild(li);
        });

        // Append the ul to the placeholder
        placeholder.appendChild(ul);
    }
});
