// sign-up page validation script start
const form = document.querySelector('#signup-form');
const button = document.querySelector('#signup-btn');
const info = document.querySelector('.info')

function validatePassword(event) {
  event.preventDefault();
  const password = document.querySelector('#pswd');
  const cPassword = document.querySelector('#cpswd');
  if(password.value === "" || cPassword.value === ""){
	password.style.border = '1px solid #ff0000';
	cPassword.style.border = '1px solid #ff0000';
	info.textContent = 'Fill in both password spaces'
	info.style.color = '#ff0000'
	
  }
  else if (password.value === cPassword.value) {
    password.style.border = '1px solid #008000';
    cPassword.style.border = '1px solid #008000';
    form.submit();
	info.textContent = ""
  } else {
    password.style.border = '1px solid #ff0000';
    cPassword.style.border = '1px solid #ff0000';
	info.textContent = 'Both passwords are not the same'
	info.style.color = '#ff0000'
  }
}
button.onclick = validatePassword
// sign-up page validation script start