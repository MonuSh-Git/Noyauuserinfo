let currentStep = 0;
const steps = document.querySelectorAll('.step');

function showStep(step) {
  steps.forEach((stepElement, index) => {
    stepElement.classList.toggle('active', index === step);
  });
}

function nextStep() {
  currentStep++;
  if (currentStep >= steps.length) {
    currentStep = steps.length - 1;
  }
  showStep(currentStep);
}

function previousStep() {
  currentStep--;
  if (currentStep < 0) {
    currentStep = 0;
  }
  showStep(currentStep);
}

document.getElementById('multiStepForm').addEventListener('submit', function(event) {
  event.preventDefault();
  
  // You can remove the alert and proceed with form submission to the server
  alert('Form submitted!');
  
  // Proceed to submit form data to PHP backend
  this.submit();  // Remove this.submit() if handling the form via AJAX
});

//username
document.getElementById('form').addEventListener('submit', function(event) {
  event.preventDefault();
  // Get the values of the input fields
  const name = document.getElementById('name').value;
  // Store them in localStorage
  localStorage.setItem('name', name);
  // Redirect to the second page
  window.location.href = '/pages/second.html';
});