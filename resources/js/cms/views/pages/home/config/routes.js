import Dashboard from '@/views/pages/home/Index.vue';
import Layout from '@/views/pages/home/layout/Index.vue';
import HeroImages from '@/views/pages/home/hero/Index.vue';
import TeaserIndex from '@/views/pages/home/teaser/Index.vue';
import TeaserCreate from '@/views/pages/home/teaser/partials/Create.vue';
import TeaserEdit from '@/views/pages/home/teaser/partials/Edit.vue';

const routes = [

  // Dashboard 
  {
    name: 'home-dashboard',
    path: '/administration/home',
    component: Dashboard,
  },

  // Home: Layout
  {
    name: 'home-layout',
    path: '/administration/home/layout',
    component: Layout,
  },

  // Home: Images
  {
    name: 'home-images',
    path: '/administration/home/hero-images',
    component: HeroImages,
  },

  // Home: Teasers
  {
    name: 'teasers',
    path: '/administration/home/teasers',
    component: TeaserIndex,
  },
  {
    name: 'teaser-create',
    path: '/administration/home/teaser/create',
    component: TeaserCreate,
  },
  {
    name: 'teaser-edit',
    path: '/administration/home/teaser/edit/:id',
    component: TeaserEdit,
  },

];

export default routes;