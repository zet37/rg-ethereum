const form = document.getElementById("form");
const result = document.getElementById("result");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent form from submitting

  const account = document.getElementById("account").value;

  fetch("get_balance.php?account=" + account) // Send GET request to PHP script
    .then((response) => response.text()) // Get response text
    .then((balance) => (result.innerHTML = "Account balance: " + balance)) // Display balance to user
    .catch((error) => console.log(error)); // Handle errors
});
