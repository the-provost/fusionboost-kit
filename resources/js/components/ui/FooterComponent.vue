// FooterComponent.vue
<template>
    <footer class="main-footer shadow-none border-none border-top-0 accent-navy d-flex align-items-center justify-content-between py-2"
    :class="{ 'dark-mode': darkMode }">
    <div class="d-flex align-items-center">
        <img :src="currentGreymoreLogo" alt="Company Logo" class="brand-image" style="max-height: 30px; opacity: 1">
        <strong class="ml-2">
          | <a href="https://konceptslab.com" target="_blank" rel="noopener noreferrer">
            <img :src="currentKlLogo" alt="Company Logo" class="brand-image" style="max-height: 30px; opacity: 1">
          </a>
        </strong>
        <strong class="ml-2" style="display: none;">
          | <a :href="companyUrl" target="_blank" rel="noopener noreferrer">{{ companyName }}</a>
        </strong>
      </div>
      <div class="d-none d-sm-inline">
        {{ companyTagline }}
      </div>
    </footer>
</template>

<script>
import { computed } from 'vue';
import { useDarkMode } from '../../darkModePlugin';

// Import both light and dark versions of logos
import greymoreLogoLight from '../../assets/greymorelogo.png';  // Change to your light version
import greymoreLogoDark from '../../assets/greymorelogo.png';   // Change to your dark version
import klLogoLight from '../../assets/kl-sm-wordmark-black.png';
import klLogoDark from '../../assets/kl-sm-wordmark-white.png';

export default {
  name: 'FooterComponent',

  setup() {
    const darkMode = useDarkMode();

    const companyConfig = {
      name: 'Greymore Tech',
      url: 'https://www.greymore.tech',
      tagline: 'Vestibulum. Accomodare. Vincere.'
    };

    // Compute current logos based on dark mode state
    const currentGreymoreLogo = computed(() =>
      darkMode.value ? greymoreLogoDark : greymoreLogoLight
    );

    const currentKlLogo = computed(() =>
      darkMode.value ? klLogoDark : klLogoLight
    );

    // Add a computed property for footer text color
    const footerTextClass = computed(() =>
      darkMode.value ? 'text-light' : 'text-dark'
    );

    return {
      currentGreymoreLogo,
      currentKlLogo,
      footerTextClass,
      companyName: companyConfig.name,
      companyUrl: companyConfig.url,
      companyTagline: companyConfig.tagline
    };
  }
};
</script>

<style scoped>
.brand-image {
  transition: opacity 0.2s ease;
}

.brand-image:hover {
  opacity: 0.8 !important;
}

/* Smooth transition for logo changes */
img {
  transition: all 0.3s ease;
}
</style>
