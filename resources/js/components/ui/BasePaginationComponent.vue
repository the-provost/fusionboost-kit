<template>
  <div class="card-footer d-flex justify-content-between align-items-center">
    <!-- Page Info -->
    <div class="text-muted">
      Showing {{ firstItem }}
      to {{ lastItem }}
      of {{ total }} entries
    </div>

    <!-- Pagination Controls -->
    <ul class="pagination pagination-sm m-0">
      <!-- Previous -->
      <li class="page-item" :class="{ disabled: currentPage === 1 }">
        <a class="page-link" href="#" @click.prevent="onPageChange(currentPage - 1)">
          Previous
        </a>
      </li>

      <!-- First Page -->
      <li v-if="shouldShowFirst" class="page-item">
        <a class="page-link" href="#" @click.prevent="onPageChange(1)">1</a>
      </li>

      <!-- First Ellipsis -->
      <li v-if="shouldShowFirstEllipsis" class="page-item disabled">
        <span class="page-link">...</span>
      </li>

      <!-- Page Numbers -->
      <li
        v-for="page in displayedPages"
        :key="page"
        class="page-item"
        :class="{ active: page === currentPage }"
      >
        <a class="page-link" href="#" @click.prevent="onPageChange(page)">
          {{ page }}
        </a>
      </li>

      <!-- Last Ellipsis -->
      <li v-if="shouldShowLastEllipsis" class="page-item disabled">
        <span class="page-link">...</span>
      </li>

      <!-- Last Page -->
      <li v-if="shouldShowLast" class="page-item">
        <a
          class="page-link"
          href="#"
          @click.prevent="onPageChange(totalPages)"
        >
          {{ totalPages }}
        </a>
      </li>

      <!-- Next -->
      <li class="page-item" :class="{ disabled: currentPage === totalPages }">
        <a
          class="page-link"
          href="#"
          @click.prevent="onPageChange(currentPage + 1)"
        >
          Next
        </a>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  currentPage: {
    type: Number,
    required: true
  },
  perPage: {
    type: Number,
    required: true
  },
  total: {
    type: Number,
    required: true
  },
  totalPages: {
    type: Number,
    required: true
  },
  maxDisplayedPages: {
    type: Number,
    default: 5
  }
});

const emit = defineEmits(['page-change']);

const firstItem = computed(() => {
  return Math.min((props.currentPage - 1) * props.perPage + 1, props.total);
});

const lastItem = computed(() => {
  return Math.min(props.currentPage * props.perPage, props.total);
});

const displayedPages = computed(() => {
  const pages = [];
  let start = Math.max(1, props.currentPage - Math.floor(props.maxDisplayedPages / 2));
  let end = Math.min(props.totalPages, start + props.maxDisplayedPages - 1);

  // Adjust start if end is at totalPages
  start = Math.max(1, end - props.maxDisplayedPages + 1);

  for (let i = start; i <= end; i++) {
    pages.push(i);
  }
  return pages;
});

const shouldShowFirst = computed(() => {
  return displayedPages.value[0] > 1;
});

const shouldShowLast = computed(() => {
  return displayedPages.value[displayedPages.value.length - 1] < props.totalPages;
});

const shouldShowFirstEllipsis = computed(() => {
  return displayedPages.value[0] > 2;
});

const shouldShowLastEllipsis = computed(() => {
  return displayedPages.value[displayedPages.value.length - 1] < props.totalPages - 1;
});

const onPageChange = (page) => {
  if (page >= 1 && page <= props.totalPages && page !== props.currentPage) {
    emit('page-change', page);
  }
};
</script>

<style scoped>
.pagination {
  margin: 0;
}

.page-link {
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border: 1px solid #dee2e6;
  margin-left: -1px;
  color: #4f46e5;
}

.page-item.active .page-link {
  background-color: #4f46e5;
  border-color: #4f46e5;
  color: white;
}

.page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
}

:deep(.dark-mode) {
  .page-link {
    background-color: #2d3748;
    border-color: #4a5568;
    color: #e5e7eb;
  }

  .page-item.active .page-link {
    background-color: #4f46e5;
    border-color: #4f46e5;
  }

  .page-item.disabled .page-link {
    background-color: #374151;
    border-color: #4a5568;
    color: #6b7280;
  }
}
</style>
