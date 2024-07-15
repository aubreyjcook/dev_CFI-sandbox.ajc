document.addEventListener("DOMContentLoaded", function() {
    console.log("Test script loaded successfully!");

    // Create a new div element
    var newDiv = document.createElement("div");
    newDiv.style.backgroundColor = "yellow";
    newDiv.style.padding = "10px";
    newDiv.style.marginTop = "10px";
    newDiv.innerText = "Test script content: This is a dynamically added element.";

    // Append the new div to the body
    document.body.appendChild(newDiv);
});