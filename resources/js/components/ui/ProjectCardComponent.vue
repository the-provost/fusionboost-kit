// ProjectCard.vue
<template>
  <div
    class="project-card mb-2"
    :style="{ borderLeftColor: statusColor }"
  >
    <div class="p-3">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <h6 class="mb-0">{{ project.name }}</h6>
        <div class="d-flex align-items-center">
          <i :class="['fas mr-1', getIndustryIcon(project.industry)]"></i>
          <span class="badge badge-light">
            {{ getEnumLabel(project.industry, 'projectTypes') }}
          </span>
        </div>
      </div>

      <p class="small text-muted mb-2">
        {{ truncateText(project.description, 100) }}
      </p>

      <!-- Status and Project Info -->
      <div class="project-info mb-2">
        <div class="d-flex align-items-center gap-2">
          <span class="status-badge" :style="{ backgroundColor: statusColor, color: 'white' }">
            {{ project.status }}
          </span>
        </div>
      </div>

      <div class="project-meta mb-2">
        <span class="mr-3">
          <i class="fas fa-calendar-alt mr-1"></i>
          {{ formatDate(project.start_date) }} - {{ formatDate(project.end_date) }}
        </span>
      </div>

      <div class="project-actions mt-2 d-flex justify-content-between">
        <div class="btn-group">
          <router-link
            :to="`/projects/${project.id}`"
            class="btn btn-sm btn-outline-info"
            title="View Details"
          >
            <i class="fas fa-eye"></i>
          </router-link>
          <router-link
            :to="`/projects/${project.id}/edit`"
            class="btn btn-sm btn-outline-primary"
            title="Edit Project"
          >
            <i class="fas fa-edit"></i>
          </router-link>
          <button
            class="btn btn-sm btn-outline-danger"
            @click="$emit('delete', project.id)"
            title="Delete Project"
          >
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { format } from 'date-fns';

const props = defineProps({
  project: {
    type: Object,
    required: true
  },
  statusColor: {
    type: String,
    required: true
  },
  enums: {
    type: Object,
    required: true,
    default: () => ({
      projectTypes: []
    })
  }
});

defineEmits(['delete']);

const getIndustryIcon = (industry) => {
  switch (industry) {
    case 'CONSTRUCTION':
      return 'fa-building';
    case 'MANUFACTURING':
      return 'fa-industry';
    case 'HEALTHCARE':
      return 'fa-hospital';
    case 'EDUCATION':
      return 'fa-graduation-cap';
    case 'TECHNOLOGY':
      return 'fa-microchip';
    case 'RETAIL':
      return 'fa-shopping-cart';
    case 'LOGISTICS':
      return 'fa-truck';
    case 'ENERGY':
      return 'fa-bolt';
    case 'AGRICULTURE':
      return 'fa-leaf';
    case 'FINANCIAL':
      return 'fa-university';
    case 'TELECOM':
      return 'fa-satellite-dish';
    case 'HOSPITALITY':
      return 'fa-hotel';
    case 'AUTOMOTIVE':
      return 'fa-car';
    case 'AEROSPACE':
      return 'fa-plane';
    case 'CONSULTING':
      return 'fa-handshake';
    default:
      return 'fa-industry'; // Default icon
  }
};

const truncateText = (text, length) => {
  if (!text) return '';
  return text.length > length ? text.substring(0, length) + '...' : text;
};

const formatDate = (date) => {
  if (!date) return 'N/A';
  return format(new Date(date), 'MMM d, yyyy');
};

const getEnumLabel = (value, enumType) => {
  if (!props.enums[enumType]) return value;
  const enumItem = props.enums[enumType].find(item => item.value === value);
  return enumItem ? enumItem.label : value;
};
</script>

<style scoped>
.project-card {
  background: white;
  border-radius: 6px;
  border-left: 4px solid;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s, box-shadow 0.2s;
}

.project-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
}

.project-meta {
  font-size: 0.8125rem;
  color: #6c757d;
}

.status-badge {
  padding: 0.25rem 0.75rem;
  border-radius: 12px;
  font-size: 0.75rem;
  font-weight: 500;
}

.project-info {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.project-actions .btn {
  padding: 0.25rem 0.5rem;
}

.project-actions .btn i {
  font-size: 0.875rem;
}

.gap-2 {
  gap: 0.5rem;
}

:deep(.dark-mode) {
  .project-card {
    background-color: #2d3748;
    border-color: #4a5568;
  }

  .project-meta {
    color: #9ca3af;
  }

  .badge-light {
    background-color: #4a4a4a;
    color: #fff;
  }

  .text-muted {
    color: #9ca3af !important;
  }

  .btn-outline-info,
  .btn-outline-primary,
  .btn-outline-danger {
    color: #e5e7eb;
  }
}
</style>
