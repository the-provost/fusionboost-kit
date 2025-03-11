<template>
    <li class="nav-item" :class="{ 'menu-open': isOpen }">
      <!-- Single Level Menu Item -->
      <router-link
        v-if="!item.children"
        :to="item.route"
        custom
        v-slot="{ navigate, href, isExactActive }"
      >
        <a
          :href="href"
          @click="navigate"
          class="nav-link"
          :class="{ 'active': isExactActive }"
        >
          <i :class="['nav-icon', item.icon]"></i>
          <p>
            {{ item.title }}
            <span
              v-if="item.badge"
              :class="['right', 'badge', `badge-${item.badge.type || 'primary'}`]"
            >
              {{ item.badge.text }}
            </span>
          </p>
        </a>
      </router-link>

      <!-- Multi Level Menu Item -->
      <template v-else>
        <a
          href="#"
          class="nav-link"
          :class="{ 'menu-active': hasActiveChild }"
          @click.prevent="toggleSubmenu"
        >
          <i :class="['nav-icon', item.icon]"></i>
          <p>
            {{ item.title }}
            <i
              class="right"
              :class="[
                'fas',
                isOpen ? 'fa-angle-down' : 'fa-angle-left',
                'transition-transform'
              ]"
            ></i>
          </p>
        </a>
        <ul class="nav nav-treeview" :class="{ 'show': isOpen }">
          <sidebar-menu-item
            v-for="(child, index) in item.children"
            :key="`${item.title}-child-${index}`"
            :item="child"
            @click="handleChildClick"
          />
        </ul>
      </template>
    </li>
  </template>

  <script setup>
  import { ref, computed, watch, onMounted } from 'vue';
  import { useRoute, useRouter } from 'vue-router';

  const props = defineProps({
    item: {
      type: Object,
      required: true,
      validator: (value) => {
        return value.title && (value.route || value.children);
      }
    }
  });

  const emit = defineEmits(['click']);
  const route = useRoute();
  const router = useRouter();
  const isOpen = ref(false);

  // Check if any child route is exactly active
  const hasActiveChild = computed(() => {
    if (!props.item.children) return false;
    return props.item.children.some(child => {
      const matchedRoute = router.resolve(child.route);
      return matchedRoute.name === route.name;
    });
  });

  // Watch for route changes to handle menu expansion
  watch(
    () => route.path,
    (newPath) => {
      if (props.item.children) {
        const shouldBeOpen = props.item.children.some(child => {
          const matchedRoute = router.resolve(child.route);
          return matchedRoute.name === route.name;
        });
        isOpen.value = shouldBeOpen;
      }
    },
    { immediate: true }
  );

  // Event handlers
  const handleClick = (item) => {
    emit('click', { item, path: item.route });
  };

  const handleChildClick = (childData) => {
    emit('click', {
      parent: props.item,
      ...childData
    });
  };

  const toggleSubmenu = () => {
    isOpen.value = !isOpen.value;
    emit('click', {
      item: props.item,
      action: 'toggle',
      isOpen: isOpen.value
    });
  };

  // Initialize
  onMounted(() => {
    if (hasActiveChild.value) {
      isOpen.value = true;
    }
  });
  </script>

  <style scoped>
  .nav-item {
    margin: 0;
    padding: 0;
    width: 100%;
  }

  .nav-link {
    display: flex;
    align-items: center;
    padding: 0.5rem 1rem;
    color: #6c757d;
    transition: all 0.3s ease;
    margin: 0;
    border-radius: 0;
    text-decoration: none;
  }

  .nav-icon {
    margin-right: 0.5rem;
    width: 1.6em;
    text-align: center;
    font-size: 1rem;
  }

  .nav-treeview {
    display: none;
    list-style: none;
    padding: 0;
    margin: 0;
    padding-left: 1rem;
    background: transparent;
    transition: all 0.3s ease;
  }

  .nav-treeview.show {
    display: block;
  }

  .nav-treeview .nav-item {
    margin: 0;
  }

  .nav-treeview .nav-link {
    padding-left: 1rem;
  }

  /* Active states */
  .nav-link.active {
    background-color: #8B0000;
    color: #fff;
  }

  .nav-link.menu-active {
    background-color: rgba(139, 0, 0, 0.1);
    color: #8B0000;
  }

  /* Hover states */
  .nav-link:hover:not(.active):not(.menu-active) {
    background-color: rgba(139, 0, 0, 0.05);
    color: #8B0000;
  }

  .right {
    margin-left: auto;
    transition: transform 0.3s ease;
  }

  .badge {
    font-size: 0.75rem;
    padding: 0.25em 0.6em;
    margin-left: auto;
    font-weight: 600;
    border-radius: 0.375rem;
  }

  /* Dark mode */
  :deep(.dark-mode) {
    .nav-link {
      color: #c2c7d0;
    }

    .nav-link.active {
      background-color: #8B0000;
      color: #fff;
    }

    .nav-link.menu-active {
      background-color: rgba(139, 0, 0, 0.2);
      color: #fff;
    }

    .nav-link:hover:not(.active):not(.menu-active) {
      background-color: rgba(139, 0, 0, 0.1);
      color: #fff;
    }

    .nav-treeview .nav-link {
      color: #c2c7d0;
    }
  }

  @media (max-width: 768px) {
    .nav-link {
      padding: 0.5rem;
    }

    .nav-treeview {
      padding-left: 0.5rem;
    }

    .nav-treeview .nav-link {
      padding-left: 0.5rem;
    }
  }
  </style>
