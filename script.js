const password = document.getElementById('Password')
const Form = document.getElementById('form')
const name = document.getElementById('Username')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
	
	let messages = [];
	if (name.value === '' || name.value == null) {
		
		messages.push('Name is required');
	}
	
	if (password.value <= 6) {
		
		messages.push('Password is short');
	}
	
	
	if(messages.length > 0 ){
		
		e.preventDefault()
		errorElement.innerText = messages.join(',');
	}
	
	
	
}