import axios from 'axios';

const axiosPlugin = {
  install(app) {
    app.config.globalProperties.$axios = axios;
  }
};

export default axiosPlugin;