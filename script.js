var currentPassword = ''; // Store the most recent password

function generatePassword(length) {
    var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()1234567890';
    var password = '';
    for (var i = 0; i < length; i++) {
        var index = Math.floor(Math.random() * chars.length);
        password += chars[index];
    }
    currentPassword = password; // Update the stored password
    return password;
}

function updatePassword() {
    var newPassword = generatePassword(16);
    var passwordElement = document.getElementById('password');
    passwordElement.textContent = newPassword;
    passwordElement.style.display = 'block'; // Show the password

    var copyButton = document.getElementById('copyButton');
    if (!copyButton) {
        copyButton = document.createElement('button');
        copyButton.id = 'copyButton';
        copyButton.textContent = 'Copy';
        copyButton.onclick = function () {
            var textArea = document.createElement('textarea');
            textArea.value = currentPassword;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        };

        document.querySelector('.container').appendChild(copyButton);
    }
}
