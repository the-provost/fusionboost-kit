// resources/js/config/menu/index.js

import adminMenu from './admin';
import managerMenu from './manager';
import defaultMenu from './default';

const menuConfig = {
  // System Administration
  superAdmin: adminMenu.menu,
  systemAdministrator: adminMenu.menu,

  // Project Management Roles
  portfolioManager: managerMenu.menu,
  projectManager: managerMenu.menu,
  projectCoordinator: managerMenu.menu,

  // Team Member Roles
  teamLead: managerMenu.menu,
  teamMember: defaultMenu.menu,

  // Stakeholder Access
  clientRepresentative: defaultMenu.menu,
  externalStakeholder: defaultMenu.menu,

  // Department Specific Roles
  salesManager: managerMenu.menu,
  engineeringManager: managerMenu.menu,
  constructionManager: managerMenu.menu,

  // Specialized Access
  qualityController: managerMenu.menu,
  riskManager: managerMenu.menu,
  documentController: managerMenu.menu,

  // Limited Access Roles
  viewer: defaultMenu.menu,
  auditor: defaultMenu.menu,

  // Fallback for any undefined user types
  default: defaultMenu.menu
};

export const getUserMenu = (userType) => {
  // Convert "User Type" to "userType"
  const menuKey = userType
    .split(' ')
    .map((word, index) =>
      index === 0
        ? word.toLowerCase()
        : word.charAt(0).toUpperCase() + word.slice(1)
    )
    .join('');

  return menuConfig[menuKey] || menuConfig.default;
};

export default menuConfig;
