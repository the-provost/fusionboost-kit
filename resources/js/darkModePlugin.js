import { ref, provide, inject, watch } from 'vue';

// Create a reactive reference to hold the dark mode state.
const darkMode = ref(false);

/**
 * Provides the dark mode state to the Vue application.
 * This should be called in your root component (usually App.vue).
 */
export const provideDarkMode = () => {
  provide('darkMode', darkMode);
};

/**
 * Toggles the application's dark mode state.
 * This function handles:
 * 1. Updating the reactive dark mode value.
 * 2. Modifying DOM elements' classes for theme changes.
 * 3. Managing sidebar appearance.
 */
export const toggleDarkMode = () => {
  // Toggle the dark mode value.
  darkMode.value = !darkMode.value;

  // Get the required DOM elements.
  const bodyElement = document.querySelector("body");
  const sidebarElement = document.querySelector("aside");
  const modalElements = document.querySelectorAll(".modal-content");

  // Only proceed if required elements are found.
  if (bodyElement && sidebarElement) {
    if (darkMode.value) {
      // Apply dark mode styles.
      bodyElement.classList.add('dark-mode');
      sidebarElement.classList.remove('sidebar-light-primary');
      sidebarElement.classList.add('sidebar-dark-primary');
    } else {
      // Remove dark mode styles.
      bodyElement.classList.remove('dark-mode');
      sidebarElement.classList.remove('sidebar-dark-primary');
      sidebarElement.classList.add('sidebar-light-primary');
    }

    // Update any active modals if they exist.
    if (modalElements.length > 0) {
      modalElements.forEach(modal => {
        if (darkMode.value) {
          modal.classList.add('dark-mode');
        } else {
          modal.classList.remove('dark-mode');
        }
      });
    }
  }

  // Save the preference whenever dark mode is toggled.
  saveDarkModePreference();
};

/**
 * Hook to access the dark mode state within components.
 * This hook ensures components have access to the dark mode state.
 * @returns {Ref<boolean>} A reactive reference to the dark mode state.
 * @throws {Error} If used outside of a component that provides dark mode.
 */
export const useDarkMode = () => {
  // Attempt to inject the dark mode state.
  const darkModeValue = inject('darkMode', null);

  // Throw an error if dark mode state is not available.
  if (!darkModeValue) {
    throw new Error(
      'useDarkMode() must be used within a component that provides the dark mode state.'
    );
  }

  // Return the dark mode state reference.
  return darkModeValue;
};

/**
 * Returns the current dark mode state without reactivity.
 * Useful for components that only need to check the current state.
 * @returns {boolean} The current dark mode state.
 */
export const isDarkMode = () => {
  return darkMode.value;
};

/**
 * Initializes the dark mode state based on user preferences or saved settings.
 * This should be called when your application starts.
 */
export const initializeDarkMode = () => {
  // Check localStorage or system preferences for initial dark mode state.
  const savedDarkMode = localStorage.getItem('darkMode');

  if (savedDarkMode !== null) {
    // If there's a saved preference, use it.
    darkMode.value = JSON.parse(savedDarkMode);

    // Apply the saved preference.
    if (darkMode.value) {
      toggleDarkMode();
    }
  } else {
    // Check system preferences if no saved preference exists.
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (prefersDark) {
      toggleDarkMode();
    }
  }
};

/**
 * Saves the current dark mode state to localStorage.
 * This should be called whenever the dark mode state changes.
 */
const saveDarkModePreference = () => {
  localStorage.setItem('darkMode', JSON.stringify(darkMode.value));
};

// Watch for changes in dark mode and save preferences.
watch(darkMode, (newValue) => {
  saveDarkModePreference();
});
