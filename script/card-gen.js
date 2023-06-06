const generateBtn = document.querySelector('#generate');
const cardNum = document.querySelector('.card-num');
const cardbrand = document.querySelector('.cardbrand');
const select = document.querySelector('select');
const brandInfo = document.querySelector('.brandInfo')
const expiryDate = document.querySelector('.expire')

function brandType() {
  const brandType = ["Visa", "MasterCard", "Verve"];
  for (let i = 0; i < brandType.length; i++) {
    let createOption = document.createElement('option');
    createOption.innerHTML = brandType[i];
    createOption.value = brandType[i];
    select.appendChild(createOption);
  }
}
brandType();



// Add event listener to the select element for change event
generateBtn.addEventListener('click', (event)=>{
    event.preventDefault()
    // Function to generate a random credit card number
function generateCreditCardNumber() {
    let prefix = '';
    let length = 0;
  
    // Determine the prefix and length based on the card type
    let brand = select.value;
  
    if (brand === 'Visa') {
      prefix = '4';
      length = 16;
      cardbrand.src = '../img/visa.png';
      brandInfo.textContent = "Visa Credit Card Generated Successfully!!!";
      brandInfo.style.color = "#008000"
    } else if (brand === 'Verve') {
      prefix = '5061';
      length = 19;
      cardbrand.src = '../img/verve.png';
      brandInfo.textContent = "Verve Credit Card Generated Successfully!!!";
      brandInfo.style.color = "#008000"
    } else if (brand === 'MasterCard') {
      prefix = '51'; // Mastercard prefix can be 51-55
      length = 16;
      cardbrand.src = '../img/mastercard.png';
      brandInfo.textContent = "MasterCard Credit Card Generated Successfully!!!";
      brandInfo.style.color = "#008000"
    } else {
      brandInfo.textContent = 'Please select a valid card brand!!!';
      brandInfo.style.color = "#d80202"
      cardbrand.src = '';
      cardNum.textContent = 'xxxx  xxxx  xxxx'
      expiryDate.textContent = ''
      return null;
      
    }
  
    let cardNumber = prefix;
  
    // Generate random digits
    for (let i = cardNumber.length; i < length - 1; i++) {
      const randomDigit = Math.floor(Math.random() * 10);
      cardNumber += randomDigit;
  
      // Add a space after every fourth digit
      if ((i + 1) % 4 === 0 && i !== length - 2) {
        cardNumber += ' ';
      }
    }
  
    // Calculate the Luhn checksum digit
    const digits = cardNumber.split('').map(Number);
    const reversedDigits = digits.slice().reverse();
  
    let sum = 0;
    for (let i = 0; i < reversedDigits.length; i++) {
      if (i % 2 === 0) {
        let doubled = reversedDigits[i] * 2;
        if (doubled > 9) {
          doubled -= 9;
        }
        sum += doubled;
      } else {
        sum += reversedDigits[i];
      }
    }
  
    const checksumDigit = (Math.ceil(sum / 10) * 10 - sum) % 10;
    cardNumber += checksumDigit;
  
    cardNum.innerHTML = cardNumber;

    // Calculate expiry date
    const date = new Date()
    let year = date.getFullYear()+3
    let month = date.getMonth()+1
    let expire = `Valid Till : ${month}/${year}`
    expiryDate.textContent = expire
  }

    generateCreditCardNumber()
});