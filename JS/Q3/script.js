/* script.js */
const content = document.getElementById('content'); // Get content element
const overlay = document.getElementById('overlay'); // Get overlay element

content.addEventListener('mouseover', function() { // Add mouseover event listener
    overlay.style.display = 'flex'; // Show overlay on mouseover
});

content.addEventListener('mouseout', function() { // Add mouseout event listener
    overlay.style.display = 'none'; // Hide overlay on mouseout
});