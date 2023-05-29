// Hamburger script start
const hamMenu = document.querySelector('.hamburger-menu');
const offScreenMenu = document.querySelector('.nav-links')
hamMenu.addEventListener('click', () =>{
	hamMenu.classList.toggle('active');
	offScreenMenu.classList.toggle('active')
})
// Hamburger script end

// documentations page script start
const cardDesign = document.querySelector('.card-design')
const leftColor = document.querySelector('.left-color')
const midColor = document.querySelector('.mid-color')
const rightColor = document.querySelector('.right-color')

leftColor.addEventListener('click', ()=>{
	cardDesign.style.background = 'linear-gradient(134deg, #EB001B -43.28%, #F79E1B  97%)'
	console.log(cardDesign)
})
midColor.addEventListener('click', ()=>{
	cardDesign.style.background = 'linear-gradient(134deg, #327A60 35.63%, #230B58 93.35%)'
	console.log(cardDesign)
})
rightColor.addEventListener('click', ()=>{
	cardDesign.style.background = 'linear-gradient(134deg, #4C0964 7.86%, #EF8B16 97%)'
	console.log(cardDesign)
})
// documentations page script end