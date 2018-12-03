/**
 * Variables
 */
const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)


// clik muncul

// const tanya = document.getElementById('tanya');
//   tanya.addEventListener('click', function(){
//   const remove = document.getElementsByTagName('span')[0];
//   remove.removeAttribute('hidden');
// });

const tanya = document.getElementById('tanya');
	tanya.addEventListener('keydown', function() {
	const enter = event.key ;	
	if(enter == 'Enter') {
		const remove = document.getElementsByTagName('span')[0];
		remove.classList.add('padding-b');
		remove.removeAttribute('hidden');
	}
});


