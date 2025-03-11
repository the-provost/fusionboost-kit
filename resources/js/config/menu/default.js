// config/menu/default.js
export default {
    menu: [
      {
        title: 'Dashboard',
        icon: 'fas fa-tachometer-alt',
        route: '/home'
      },
      {
        title: 'Tasks',
        icon: 'fas fa-tasks',
        route: '/tasks'
      },
      {
        title: 'Projects',
        icon: 'fas fa-project-diagram',
        children: [
          {
            title: 'All Projects',
            icon: 'fas fa-list',
            route: '/projects'
          },
          {
            title: 'Create Project',
            icon: 'fas fa-plus',
            route: '/projects/create'
          }
        ]
      },
      {
        title: 'Masters',
        icon: 'fas fa-cogs',
        children: [
          {
            title: 'Project Statuses',
            icon: 'fas fa-tasks',
            route: '/masters/project-statuses'
          },
          {
            title: 'Epic Statuses',
            icon: 'fas fa-tasks',
            route: '/masters/epic-statuses'
          },
          {
            title: 'Task Statuses',
            icon: 'fas fa-tasks',
            route: '/masters/task-statuses'
          },
          {
            title: 'Staff',
            icon: 'fas fa-users',
            route: '/masters/staff'
          },
          // Other master menu items...
        ]
      }
    ]
  };
