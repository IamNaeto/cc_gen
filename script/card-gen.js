const generateBtn = document.querySelector('#generate');
const cardNum = document.querySelector('.card-num');
const cardbrand = document.querySelector('.cardbrand');
const select = document.querySelector('select');
const brandInfo = document.querySelector('.brandInfo')
const expiryDate = document.querySelector('.expire')
const cardCVV = document.querySelector('.cv')

// Below is a function that make the card brands accessable
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

// Below is the script that generates credit card cvv, first we write a function to generate a random number between min and max (inclusive)
function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Generate random three-digit number for the back of the credit card
function generateCreditCardCVV() {
  let cvv = '';
  for (let i = 0; i < 3; i++) {
    cvv += getRandomNumber(0, 9).toString();
  }
  return cvv;
}


// Add event listener to the select element for change event
generateBtn.addEventListener('click', (event)=>{
    event.preventDefault()
    // Function to generate a random credit card number
function generateCreditCardNumber() {
    let prefix = '';
    let length = 0;

  // re-assign the ccv to another variable
    let generatedCVV = generateCreditCardCVV();

    // Determine the prefix and length based on the card type
    let brand = select.value;
  
    if (brand === 'Visa') {
      prefix = '4';
      length = 16;
      cardbrand.src = '../img/visa.png';
      brandInfo.textContent = "Visa Credit Card Generated Successfully!!!";
      brandInfo.style.color = "#008000"
      cardCVV.textContent = generatedCVV;
    } else if (brand === 'Verve') {
      prefix = '5061';
      length = 19;
      cardbrand.src = '../img/verve.png';
      brandInfo.textContent = "Verve Credit Card Generated Successfully!!!";
      brandInfo.style.color = "#008000"
      cardCVV.textContent = generatedCVV;
    } else if (brand === 'MasterCard') {
      prefix = '51'; // Mastercard prefix can be 51-55
      length = 16;
      cardbrand.src = '../img/mastercard.png';
      brandInfo.textContent = "MasterCard Credit Card Generated Successfully!!!";
      brandInfo.style.color = "#008000"
      cardCVV.textContent = generatedCVV;
    } else {
      brandInfo.textContent = 'Please select a valid card brand!!!';
      brandInfo.style.color = "#d80202"
      cardbrand.src = '';
      cardNum.textContent = 'xxxx  xxxx  xxxx'
      cardCVV.innerHTML = 'xxx'
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


// Download Card

const downloadButton = document.getElementById('download');

downloadButton.addEventListener('click', (event)=>{
  event.preventDefault()
    function downloadDivAsImage() {
      const cardToDownload = document.getElementById('cardFront');
    
      // Create a new canvas element
      const canvas = document.createElement('canvas');
      const context = canvas.getContext('2d');
      const cardStyles = window.getComputedStyle(cardToDownload);
    
      // Set the canvas size based on the card dimensions
      const width = parseInt(cardStyles.width);
      const height = parseInt(cardStyles.height);
      canvas.width = width;
      canvas.height = height;
    
      // Create an image element and set its source to the div background image
      const image = new Image();
      image.onload = function() {
        // Draw the image onto the canvas
        context.drawImage(image, 0, 0, width, height);
    
        // Convert the canvas to a data URL
        const dataURL = canvas.toDataURL('image/png');
    
        // Create a temporary link and trigger the download
        const link = document.createElement('a');
        link.href = dataURL;
        link.download = 'card.png';
        link.click();
      };
      
      // Set the source of the image element to the background image of the div
      const backgroundImage = cardStyles.backgroundImage;
      const imageUrl = backgroundImage.replace(/url\(['"]?(.*?)['"]?\)/i, '$1');
      image.src = imageUrl;
    }
  downloadDivAsImage()
})
