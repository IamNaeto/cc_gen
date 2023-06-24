function navBarChange(){
    // Side bar navigations
const dashboard = document.querySelector('.dashboard-container')
const profile = document.querySelector('.profile-container')
const downloadedCards = document.querySelector('.download-wrapper')
const savedCards = document.querySelector('.saved-wrapper')

const dashboardNav = document.querySelector('#dashboardNav')
dashboardNav.addEventListener('click', () => {
    dashboard.style.display = 'block'
    dashboardNav.style.backgroundColor = '#F3691B'
    dashboardNav.style.color = '#FFFFFF'
    profile.style.display = 'none'
    profileNav.style.backgroundColor = '#FFFFFF'
    profileNav.style.color = '#000000'
    downloadedCards.style.display = 'none'
    downloadedCardsNav.style.backgroundColor = '#FFFFFF'
    downloadedCardsNav.style.color = '#000000'
})

const profileNav = document.querySelector('#profileNav')
profileNav.addEventListener('click', () => {
    dashboard.style.display = 'none'
    dashboardNav.style.backgroundColor = '#FFFFFF'
    dashboardNav.style.color = '#000000'
    profile.style.display = 'block'
    profileNav.style.backgroundColor = '#F3691B'
    profileNav.style.color = '#FFFFFF'
    downloadedCards.style.display = 'none'
    downloadedCardsNav.style.backgroundColor = '#FFFFFF'
    downloadedCardsNav.style.color = '#000000'
})

const downloadedCardsNav = document.querySelector("#downloadNav")
downloadedCardsNav.addEventListener('click', () => {
    dashboard.style.display = 'none'
    dashboardNav.style.backgroundColor = '#FFFFFF'
    dashboardNav.style.color = '#000000'
    profile.style.display = 'none'
    profileNav.style.backgroundColor = '#FFFFFF'
    profileNav.style.color = '#000000'
    downloadedCards.style.display = 'block'
    downloadedCardsNav.style.backgroundColor = '#F3691B'
    downloadedCardsNav.style.color = '#FFFFFF'
})
}
// Calling of the function so that anything the sidebar is clicked on, it will change
navBarChange()

// Users Detials Edit and Submit 
const usersForm = document.querySelector('#usersDetails');
const usersFName = document.querySelector('.fName');
const usersLName = document.querySelector('.lName');
const usersUName = document.querySelector('.userN');
const usersMail = document.querySelector('.userMail');
const editBtn = document.querySelector('.edit');
const saveBtn = document.querySelector('.save');

editBtn.addEventListener('click', (event) => {
    event.preventDefault();
    usersFName.removeAttribute("readonly");
    usersFName.focus();
    usersLName.removeAttribute("readonly");
    usersUName.removeAttribute("readonly");
    usersMail.removeAttribute("readonly");
    saveBtn.removeAttribute("disabled");
});

saveBtn.addEventListener('click', (event) => {
    event.preventDefault();
    usersFName.setAttribute("readonly", "readonly");
    usersLName.setAttribute("readonly", "readonly");
    usersUName.setAttribute("readonly", "readonly");
    usersMail.setAttribute("readonly", "readonly");
    usersForm.submit();
    saveBtn.setAttribute("disabled", "disabled");
    window.location.href="../php/edit.php";
});
