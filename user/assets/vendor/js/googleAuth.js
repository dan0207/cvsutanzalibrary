
globalThis.handleCredentialResponse = async (response) => {

    fetch('../php_script/googleAuth_script.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            request_type: 'user_auth',
            credential: response.credential
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);

            if (data) {
                $('#signup_reminder_modal').modal('show');
            } else {
                location.href = '../php_script/signup_script.php';
            }
        })
        .catch(error => {
            console.error('Error:', error)
        })
}


