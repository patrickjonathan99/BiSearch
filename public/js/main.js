const burgerIcon = document.querySelector('#burger');
const navbarMenu = document.querySelector('#navLink');
var isSubmit = true;

burgerIcon.addEventListener('click', () => (
    navbarMenu.classList.toggle('is-active')
))

function editContent() {
    var contentElement = document.getElementById("contentToBeEdit");
    var editField = document.getElementById("editField");
    var button = document.getElementById('editButton');

    if (isSubmit) {
        button.type = "button";
        isSubmit = false;
    }
    else {
        button.type = "submit";
        isSubmit = true;
    }

    if (editField.style.display === "none") {
      editField.value = contentElement.textContent;
      contentElement.style.display = "none";
      editField.style.display = "block";
      editField.focus();
    } else {
      contentElement.textContent = editField.value;
      editField.style.display = "none";
      contentElement.style.display = "block";
    }
}

window.addEventListener('scroll', function() {
    var floatingButton = document.getElementById('floatingButton');
    var footer = document.getElementById('footer');

    var floatingButtonHeight = floatingButton.offsetHeight;
    var footerOffset = footer.offsetTop;

    if (window.pageYOffset + window.innerHeight > footerOffset) {
        floatingButton.style.bottom = (window.pageYOffset + window.innerHeight - footerOffset + 120) + 'px';
    } else {
        floatingButton.style.bottom = '50px';
    }
});

