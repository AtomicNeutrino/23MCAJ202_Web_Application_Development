/* script.js */

// Add an event listener to the registration form to handle form submission
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // Prevent the default form submission behavior (page reload)
    event.preventDefault();

    // Clear any existing error messages
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('phoneError').textContent = '';
    document.getElementById('dobError').textContent = '';
    document.getElementById('addressError').textContent = '';

    // Get the values from the input fields
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const dob = document.getElementById('dob').value;
    const address = document.getElementById('address').value;

    // Initialize a flag to track form validity
    let isValid = true;

    // Validation for Full Name
    if (!name) {
        // Check if the name field is empty
        document.getElementById('nameError').textContent = 'Full Name is required.';
        isValid = false; // Set isValid to false if name is empty
    } else if (name.trim().length < 3) {
        // Check if the name has at least 3 characters after removing leading/trailing whitespace
        document.getElementById('nameError').textContent = 'Full Name must be at least 3 characters.';
        isValid = false;
    } else if (!/^[a-zA-Z\s]+$/.test(name)) {
        // Check if the name contains only letters and spaces
        document.getElementById('nameError').textContent = 'Full Name can only contain letters and spaces.';
        isValid = false;
    }

    // Validation for Email Address
    if (!email) {
        document.getElementById('emailError').textContent = 'Email is required.';
        isValid = false; // Set isValid to false if email is empty
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        // Use a regular expression to check for a valid email format
        document.getElementById('emailError').textContent = 'Invalid email format.';
        isValid = false; // Set isValid to false if email format is invalid
    }

    // Validation for Phone Number
    if (!phone) {
        document.getElementById('phoneError').textContent = 'Phone number is required.';
        isValid = false; // Set isValid to false if phone is empty
    } else if (!/^\d{10}$/.test(phone)) {
        // Use a regular expression to check for a 10-digit phone number
        document.getElementById('phoneError').textContent = 'Invalid phone number. Must be 10 digits.';
        isValid = false;
    }

    // Validation for Date of Birth
    if (!dob) {
        document.getElementById('dobError').textContent = 'Date of birth is required.';
        isValid = false; // Set isValid to false if dob is empty
    }

    // Validation for Address
    if (!address) {
        document.getElementById('addressError').textContent = 'Address is required.';
        isValid = false; // Set isValid to false if address is empty
    }

    // If all validations pass (isValid is still true)
    if (isValid) {
        alert('Registration successful!'); // Display a success message
        // this.submit(); // Uncomment this line to actually submit the form to the server
    }
});