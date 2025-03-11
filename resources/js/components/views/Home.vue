<template>
    <div class="content-wrapper">
      <!-- Content Header -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ pageTitle }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <router-link to="/home">Home</router-link>
                </li>
                <li class="breadcrumb-item active">{{ pageTitle }}</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main Content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Quick Stats Cards Row -->
          <div class="row">
            <div class="col-lg-3 col-6" v-for="(stat, index) in quickStats" :key="index">
              <div class="small-box" :class="stat.bgColor">
                <div class="inner">
                  <h3>{{ stat.value }}</h3>
                  <p>{{ stat.label }}</p>
                </div>
                <div class="icon">
                  <i :class="stat.icon"></i>
                </div>
                <router-link :to="stat.link" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>
            </div>
          </div>

          <!-- Main Content Cards -->
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Welcome</h3>
                </div>
                <div class="card-body">
                  <p class="lead">
                    This is a temporary placeholder... And we mean it when we say temporary.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item" v-for="(action, index) in quickActions" :key="index">
                      <router-link :to="action.route" class="nav-link">
                        <i :class="[action.icon, 'mr-2']"></i>
                        {{ action.label }}
                      </router-link>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </template>

  <script>
  import { ref, onMounted } from 'vue';
  import { useRoute } from 'vue-router';

  export default {
    name: 'DashboardView',

    setup() {
      const route = useRoute();
      const pageTitle = ref('Dashboard');

      const quickStats = ref([
        {
            value: '150',
            label: 'New Orders',
            bgColor: 'bg-custom-dark', // Dark charcoal
            icon: 'fas fa-shopping-cart',
            link: '/orders'
        },
        {
            value: '53%',
            label: 'Bounce Rate',
            bgColor: 'bg-custom-red', // Deep red
            icon: 'fas fa-chart-bar',
            link: '/analytics'
        },
        {
            value: '44',
            label: 'User Registrations',
            bgColor: 'bg-custom-gray', // Dark gray
            icon: 'fas fa-user-plus',
            link: '/users'
        },
        {
            value: '65',
            label: 'Unique Visitors',
            bgColor: 'bg-custom-darker', // Darker charcoal
            icon: 'fas fa-chart-pie',
            link: '/visitors'
        }
    ]);

      const quickActions = ref([
        {
          label: 'Create New Project',
          icon: 'fas fa-plus',
          route: '/projects/create'
        },
        {
          label: 'View Reports',
          icon: 'fas fa-chart-line',
          route: '/reports'
        },
        {
          label: 'Manage Users',
          icon: 'fas fa-users',
          route: '/users'
        }
      ]);

      return {
        pageTitle,
        quickStats,
        quickActions
      };
    }
  };
  </script>

<style scoped>
.content-wrapper {
  padding: 1rem;
  min-height: calc(100vh - 114px);
}

.card {
  box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
  margin-bottom: 1rem;
  border-radius: 0; /* Remove card rounded corners */
}

.small-box {
  transition: transform .3s ease;
  border-radius: 0 !important; /* Remove rounded corners */
}

/* Custom background colors */
.bg-custom-dark {
  background-color: #1a1a1a !important;
  color: white !important;
}

.bg-custom-red {
  background-color: #8B0000 !important; /* Dark red */
  color: white !important;
}

.bg-custom-gray {
  background-color: #2C2C2C !important;
  color: white !important;
}

.bg-custom-darker {
  background-color: #121212 !important;
  color: white !important;
}

/* Make the icon color consistent */
.small-box .icon {
  color: rgba(255, 255, 255, 0.2) !important;
}

/* Style the "More info" link */
.small-box .small-box-footer {
  background: rgba(0, 0, 0, 0.1) !important;
  color: rgba(255, 255, 255, 0.8) !important;
}

.small-box:hover {
  transform: translateY(-3px);
}

.small-box:hover .small-box-footer {
  background: rgba(0, 0, 0, 0.2) !important;
  color: white !important;
}

.nav-pills .nav-link {
  border-radius: 0;
  border-bottom: 1px solid #f4f4f4;
}

.nav-pills .nav-link:hover {
  background-color: #f8f9fa;
}

.lead {
  font-size: 1.1rem;
  line-height: 1.6;
}
</style>
