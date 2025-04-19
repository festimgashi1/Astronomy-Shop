const loginTab = document.getElementById('login-tab');
const signupTab = document.getElementById('signup-tab');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

loginTab.addEventListener('click', () => {
  loginTab.classList.add('active');
  signupTab.classList.remove('active');
  loginForm.classList.add('active');
  signupForm.classList.remove('active');
  document.getElementById('login-form').reset();
  document.getElementById('signup-form').reset();
});

signupTab.addEventListener('click', () => {
  signupTab.classList.add('active');
  loginTab.classList.remove('active');
  signupForm.classList.add('active');
  loginForm.classList.remove('active');
  document.getElementById('login-form').reset();
  document.getElementById('signup-form').reset();
});

document.getElementById('login-form').addEventListener('submit', function(e) {
  e.preventDefault();
  document.getElementById('login-button').disabled = true;
  document.getElementById('login-spinner').style.display = 'inline-block';
  
  setTimeout(() => {
    document.getElementById('login-button').disabled = false;
    document.getElementById('login-spinner').style.display = 'none';
    document.getElementById('login-success').style.display = 'block';
    document.getElementById('login-form').reset();
  }, 1500);
});

document.getElementById('signup-form').addEventListener('submit', function(e) {
  e.preventDefault();
  document.getElementById('signup-button').disabled = true;
  document.getElementById('signup-spinner').style.display = 'inline-block';
  
  setTimeout(() => {
    document.getElementById('signup-button').disabled = false;
    document.getElementById('signup-spinner').style.display = 'none';
    document.getElementById('signup-success').style.display = 'block';
    document.getElementById('signup-form').reset();
  }, 1500);
});