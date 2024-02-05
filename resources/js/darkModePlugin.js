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
};

// Function to check if dark mode is enabled
export const useDarkMode = () => {
  const darkModeValue = inject('darkMode', null);
  if (!darkModeValue) {
    throw new Error('useDarkMode() must be used within a component that provides the dark mode state');
  }
  return darkModeValue;
};
