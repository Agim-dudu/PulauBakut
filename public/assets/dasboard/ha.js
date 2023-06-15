const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
  const li = item.parentElement;

  item.addEventListener('click', function() {
    allSideMenu.forEach(i => {
      i.parentElement.classList.remove('active');
    });
    li.classList.add('active');
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function() {
  sidebar.classList.toggle('hide');
});

const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function(e) {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchForm.classList.toggle('show');
    if (searchForm.classList.contains('show')) {
      searchButtonIcon.classList.replace('bx-search', 'bx-x');
    } else {
      searchButtonIcon.classList.replace('bx-x', 'bx-search');
    }
  }
});

if (window.innerWidth < 768) {
  sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
  searchButtonIcon.classList.replace('bx-x', 'bx-search');
  searchForm.classList.remove('show');
}

window.addEventListener('resize', function() {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
  }
});

const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function() {
  if (this.checked) {
    document.body.classList.add('dark');
  } else {
    document.body.classList.remove('dark');
  }
});

// Get the modal elements
var addModal1 = document.getElementById('myModal1');
var addModal2 = document.getElementById('myModal2');
var addModal3 = document.getElementById('myModal3');
var addModal4 = document.getElementById('myModal4');

// Get the button elements that open the modals
var btnTambahpenju = document.getElementById('btnTambahpenju');
var btnTambahpetu = document.getElementById('btnTambahpetu');
var btnTambahpaket = document.getElementById('btnTambahpaket');
var btnTambahmaje = document.getElementById('btnTambahmaje');

// Get the <span> elements that close the modals
var span = document.getElementsByClassName('close');

// Function to close the modals
function closeModal(modal) {
  modal.style.display = 'none';
}

// When the user clicks on the button, open the modal
btnTambahpenju.onclick = function() {
  addModal1.style.display = 'block';
};
btnTambahpetu.onclick = function() {
  addModal2.style.display = 'block';
};
btnTambahpaket.onclick = function() {
  addModal3.style.display = 'block';
};
btnTambahmaje.onclick = function() {
  addModal4.style.display = 'block';
};

// When the user clicks on <span> (x), close the modal
span[0].onclick = function() {
  closeModal(addModal1);
};
span[1].onclick = function() {
  closeModal(addModal2);
};
span[2].onclick = function() {
  closeModal(addModal3);
};
span[3].onclick = function() {
  closeModal(addModal4);
};

// Close the modal when the user clicks anywhere outside of it
window.onclick = function(event) {
  if (event.target === addModal1 || event.target === addModal2 || event.target === addModal3 || event.target === addModal4) {
    closeModal(addModal1);
    closeModal(addModal2);
    closeModal(addModal3);
    closeModal(addModal4);
  }
};
