// script.js
const button = document.getElementById('changeColorBtn'); // Get the button element by its ID
const colors = ['#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF', '#800080', '#008080', '#808000']; // Array of colors to cycle through
let colorIndex = 0; // Initialize color index to 0

button.addEventListener('click', function() { // Add click event listener to the button
    document.body.style.backgroundColor = colors[colorIndex]; // Change background color to the current color
    button.style.color = colors[(colorIndex + 1) % colors.length];

    colorIndex = (colorIndex + 1) % colors.length; // Increment color index and cycle back to 0 when it reaches the end of the array
});