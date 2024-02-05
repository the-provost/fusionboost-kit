import { ref, provide, inject } from 'vue';

// Create a ref to hold the dark mode state
const darkMode = ref(false);

// Provide the dark mode state
export const provideDarkMode = () => {
  provide('darkMode', darkMode);
};

// Function to toggle dark mode
export const toggleDarkMode = () => {
  darkMode.value = !darkMode.value;
  // const bodyElement = document.getElementsByTagName("body")[0];
  // const sidebarElement = document.getElementsByTagName("aside")[0];
  const bodyElement = document.querySelector("body");
  const sidebarElement = document.querySelector("aside");
  
  // Check if the elements are found before accessing their classList
  if (bodyElement && sidebarElement) {
    if (darkMode.value) {
      // Add 'dark-mode' class to body
      sidebarElement.classList.remove('sidebar-light-primary');
      sidebarElement.classList.add('sidebar-dark-primary');
      bodyElement.classList.add('dark-mode');
      
    } else {
      // Remove 'dark-mode' class from body
      bodyElement.classList.remove('dark-mode');
      sidebarElement.classList.add('sidebar-light-primary');
      sidebarElement.classList.remove('sidebar-dark-primary');
      
    }
  }
};


// Function to check if dark mode is enabled
export const useDarkMode = () => {
  const darkModeValue = inject('darkMode', null);
  if (!darkModeValue) {
    throw new Error('useDarkMode() must be used within a component that provides the dark mode state');
  }
  return darkModeValue;
};
