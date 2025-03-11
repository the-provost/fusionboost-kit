import axios from 'axios';

export const enumService = {
  async getProjectTypes() {
    const response = await axios.get('/api/enums/project-types');
    return response.data;
  },

  async getIndustries() {
    const response = await axios.get('/api/enums/industries');
    return response.data;
  },

  async getProjectStatuses(projectType) {
    const response = await axios.get(`/api/master-project-statuses`);
    if (projectType) {
      return response.data.filter(status => status.project_type === projectType && status.is_active);
    }
    return response.data.filter(status => status.is_active);
  }
};
