// Dashboard Home
import DashboardHome from '@/views/pages/home/Index.vue';

// Image
import HomeImageIndex from '@/views/pages/home/image/Index.vue';

const routes = [

  // Dashboard 
  {
    name: 'dashboard-home',
    path: '/administration/home',
    component: DashboardHome,
  },

  // Images
  {
    name: 'home-images',
    path: '/administration/home/images',
    component: HomeImageIndex,
  },
];

export default routes;