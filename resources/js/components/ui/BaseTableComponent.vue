<template>
  <div class="base-table" :class="{ 'card': useCard }">
    <!-- Loading State -->
    <div v-if="loading" class="text-center py-5">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <!-- Empty State -->
    <div v-else-if="!items.length" class="empty-state text-center py-5">
      <slot name="empty">
        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
        <h4>{{ emptyText }}</h4>
        <p class="text-muted" v-if="emptyDescription">
          {{ emptyDescription }}
        </p>
      </slot>
    </div>

    <!-- Table Content -->
    <div v-else class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th
              v-for="column in columns"
              :key="column.key"
              :class="[column.headerClass, { 'text-right': column.align === 'right' }]"
            >
              {{ column.label }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in items" :key="item.id || index">
            <td
              v-for="column in columns"
              :key="column.key"
              :class="[column.cellClass, { 'text-right': column.align === 'right' }]"
            >
              <slot
                :name="column.key"
                :item="item"
                :column="column"
                :index="index"
              >
                {{ item[column.key] }}
              </slot>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
defineProps({
  columns: {
    type: Array,
    required: true,
    // Each column should have: { key, label, headerClass?, cellClass?, align? }
  },
  items: {
    type: Array,
    required: true
  },
  loading: {
    type: Boolean,
    default: false
  },
  useCard: {
    type: Boolean,
    default: true
  },
  emptyText: {
    type: String,
    default: 'No Data Found'
  },
  emptyDescription: {
    type: String,
    default: ''
  }
});
</script>

<style scoped>
.base-table {
  background: white;
  border-radius: 8px;
}

.base-table.card {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.table {
  margin-bottom: 0;
}

.table th {
  border-top: none;
  text-transform: uppercase;
  font-size: 0.75rem;
  font-weight: 600;
  color: #6c757d;
  padding: 1rem;
}

.table td {
  padding: 1rem;
  vertical-align: middle;
}

.empty-state {
  padding: 3rem 1rem;
}

.empty-state i {
  color: #e5e7eb;
  margin-bottom: 1rem;
}

/* Dark Mode Support */
:deep(.dark-mode) {
  .base-table {
    background-color: #2d3748;
  }

  .table {
    color: #e5e7eb;
  }

  .table th {
    color: #9ca3af;
  }

  .table td {
    border-top-color: #4a5568;
  }

  .empty-state i {
    color: #4a5568;
  }
}
</style>
