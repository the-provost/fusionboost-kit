// directives/tooltip.js
import * as bootstrap from 'bootstrap';

export const tooltip = {
    mounted(el, binding) {
        // Handle both v-tooltip and data-bs-toggle cases
        if (binding.value) {
            // v-tooltip case
            el.setAttribute('data-bs-title', binding.value);
            el.setAttribute('data-bs-toggle', 'tooltip');
            el.setAttribute('data-bs-placement', binding.arg || 'top');
        }

        // Initialize tooltip if it has the required attribute
        if (el.hasAttribute('data-bs-toggle') && el.getAttribute('data-bs-toggle') === 'tooltip') {
            const tooltip = new bootstrap.Tooltip(el, {
                trigger: 'hover'
            });
        }
    },

    updated(el, binding) {
        // Handle v-tooltip updates
        if (binding.value) {
            el.setAttribute('data-bs-title', binding.value);
        }

        // Reinitialize tooltip
        const tooltipInstance = bootstrap.Tooltip.getInstance(el);
        if (tooltipInstance) {
            tooltipInstance.dispose();
        }
        if (el.hasAttribute('data-bs-toggle') && el.getAttribute('data-bs-toggle') === 'tooltip') {
            new bootstrap.Tooltip(el);
        }
    },

    beforeUnmount(el) {
        const tooltipInstance = bootstrap.Tooltip.getInstance(el);
        if (tooltipInstance) {
            tooltipInstance.dispose();
        }
    }
};

// Function to initialize tooltips for elements with data-bs-toggle="tooltip"
export const initTooltips = () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(el => {
        // Dispose existing tooltip if any
        const existingTooltip = bootstrap.Tooltip.getInstance(el);
        if (existingTooltip) {
            existingTooltip.dispose();
        }
        // Create new tooltip
        new bootstrap.Tooltip(el);
    });
};

// Function to dispose all tooltips
export const disposeTooltips = () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(el => {
        const tooltip = bootstrap.Tooltip.getInstance(el);
        if (tooltip) {
            tooltip.dispose();
        }
    });
};
