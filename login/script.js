document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.getElementById('registration-form');
    const registerButton = document.getElementById('register-button');
    const loginButton = document.getElementById('login-button');

    registrationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm()) {
            const formData = collectFormData();
            displaySummary(formData);
        }
    });

    loginButton.addEventListener('click', function() {
    
        alert('Login functionality would go here');
    });

    function validateForm() {
        const email = document.getElementById('email').value.trim();
        const mobile = document.getElementById('mobile-number').value.trim();
        const firstName = document.getElementById('first-name').value.trim();
        const lastName = document.getElementById('last-name').value.trim();
        const address = document.getElementById('address').value.trim();

        if (!email || !mobile || !firstName || !lastName || !address) {
            alert('All fields are required');
            return false;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            alert('Please enter a valid email address');
            return false;
        }

        if (!/^\d{10}$/.test(mobile)) {
            alert('Mobile number must be 10 digits');
            return false;
        }

        return true;
    }

    function collectFormData() {
        return {
            firstName: document.getElementById('first-name').value.trim(),
            lastName: document.getElementById('last-name').value.trim(),
            email: document.getElementById('email').value.trim(),
            mobile: document.getElementById('mobile-number').value.trim(),
            address: document.getElementById('address').value.trim(),
            countryCode: document.getElementById('country-code').value.trim()
        };
    }

    function displaySummary(data) {
        const summary = `Registration Summary:
------------------------
First Name: ${data.firstName}
Last Name: ${data.lastName}
Email: ${data.email}
Mobile: ${data.countryCode}${data.mobile}
Address: ${data.address}`;
        alert(summary);
    }
});