// Side bar navigations
const dashboard = document.querySelector('.dashboard-container')
const profile = document.querySelector('.profile-container')

const dashboardNav = document.querySelector('#dashboardNav')
dashboardNav.addEventListener('click', () => {
    dashboard.style.display = 'block'
    profile.style.display = 'none'
})

const profileNav = document.querySelector('#profileNav')
profileNav.addEventListener('click', () => {
    dashboard.style.display = 'none'
    profile.style.display = 'block'
})




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
    
});
