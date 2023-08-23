<!DOCTYPE html>
<html>
<head>
<title>Password Generator</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #222;
  color: white;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: flex-start; /* Aligns content slightly higher */
  justify-content: center;
  height: 100vh;
}

.container {
  text-align: center;
  padding: 20px;
}

#password {
  display: none; /* Initially hidden */
  padding: 8px;
  width: 200px;
  font-size: 18px;
  background: #333;
  border: 1px solid #444;
  margin: 0 auto 20px;
}

button {
  background-color: #3498db; /* Light blue color */
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #2980b9; /* Slightly darker shade on hover */
}

h1 {
  color: #fff;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
  #password {
    width: 80%; /* Adjust width for smaller screens */
  }
}
</style>  
<script>
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
    copyButton.onclick = function() {
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
</script>
</head>
<body>

<div class="container">
  <h1>Password Generator</h1>
  
  <div id="password"></div>
  
  <button onclick="updatePassword()">Generate</button>
</div>

</body>
</html>
