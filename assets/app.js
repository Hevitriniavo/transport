import './styles/app.css';

const dropdownMenu = document.getElementById('dropdown-menu');
const responsiveMenu = document.getElementById('responsive-menu');
const menuBtn = document.getElementById('menu-btn');
const dropdownBtn = document.getElementById('dropdown-btn');

const toggleResponsiveMenu = () => {
    responsiveMenu.classList.toggle('hidden');
};

const toggleDropdownMenu = (event) => {
    event.stopPropagation();
    dropdownMenu.classList.toggle('hidden');
};

menuBtn.addEventListener('click', toggleResponsiveMenu);
dropdownBtn.addEventListener('click', toggleDropdownMenu);

document.addEventListener('click', () => {
    dropdownMenu.classList.add("hidden");
});
