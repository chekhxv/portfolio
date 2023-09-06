const menuBurger = document.querySelector('.btn__menu-burger');
const menuWrapper = document.querySelector('.header-navigation__wrapper');

menuBurger.addEventListener('click', () => {
  menuWrapper.classList.toggle('active');
});

const SELECTORS = {
  BTN_LK: '.btn__lk',
  BTN_REG: '.btn-sign-up',
  BTN_LOG: '.btn-sign-in',
  FORM_REG: '.sign-up',
  FORM_LOG: '.sign-in',
  FORM_WRAPPER: '.form-wrapper',
};

const CLASSES = {
  DISPLAY_FLEX: 'flex',
  DISPLAY_NONE: 'none',
};

const { BTN_LK, BTN_REG, BTN_LOG, FORM_REG, FORM_LOG, FORM_WRAPPER } = SELECTORS;

const toggleForms = (formToShow, formToHide) => {
  formToShow.style.display = CLASSES.DISPLAY_FLEX;
  formToHide.style.display = CLASSES.DISPLAY_NONE;
};

const closeForms = () => {
  const forms = document.querySelectorAll(`${FORM_REG}, ${FORM_LOG}`);
  forms.forEach((form) => (form.style.display = CLASSES.DISPLAY_NONE));
};

const formWrapper = document.querySelector(FORM_WRAPPER);

document.querySelector(BTN_LK).addEventListener('click', () => {
  toggleForms(document.querySelector(FORM_LOG), document.querySelector(FORM_REG));
  formWrapper.style.display = CLASSES.DISPLAY_FLEX;
});

document.querySelector(BTN_REG).addEventListener('click', () => {
  toggleForms(document.querySelector(FORM_REG), document.querySelector(FORM_LOG));
});

document.querySelector(BTN_LOG).addEventListener('click', () => {
  toggleForms(document.querySelector(FORM_LOG), document.querySelector(FORM_REG));
});

formWrapper.addEventListener('click', (event) => {
  if (event.target === formWrapper) {
    closeForms();
    formWrapper.style.display = CLASSES.DISPLAY_NONE;
  }
});

const exhaustLink = document.querySelector('.products__navigation-bar_list li:nth-child(2) a');
const wheelsLink = document.querySelector('.products__navigation-bar_list li:nth-child(1) a');
const wheelsBlock = document.querySelector('.wheels');
const exhaustBlock = document.querySelector('.exhaust');

exhaustLink.addEventListener('click', () => {
  wheelsBlock.style.display = 'none';
  exhaustBlock.style.display = 'flex';
  wheelsLink.classList.remove('active');
  exhaustLink.classList.add('active');
});

wheelsLink.addEventListener('click', () => {
  wheelsBlock.style.display = 'flex';
  exhaustBlock.style.display = 'none';
  wheelsLink.classList.add('active');
  exhaustLink.classList.remove('active');
});

document.addEventListener('DOMContentLoaded', () => {
  const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
});
