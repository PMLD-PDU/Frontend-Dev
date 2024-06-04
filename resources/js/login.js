document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.btn-color').addEventListener('click', async function (event) {
        event.preventDefault();

        let email = document.getElementById('Username').value;
        let password = document.getElementById('password').value;

        let response = await fetch('https://bepdu.aliifam.com/api/employee/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        });

        let data = await response.json();
        console.log('Response:', data); // Log the full response

        if (response.ok) {
            localStorage.setItem('jwt_token', data.token);
            console.log('Token:', data.token);
            window.location.href = '/mainscreen';
        } else {
            alert(data.error || 'Login failed');
        }
    });
});