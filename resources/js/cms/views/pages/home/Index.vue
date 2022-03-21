<template>
  <div v-if="isFetched" class="is-loaded">
    <page-header>
      <h1>Startseite</h1>
    </page-header>
    <div class="content content--wide cards">
      <div class="card">
        <router-link :to="{name: 'home-layout'}">
          <h2>Layout</h2>
          <p>Verwaltung der Startseite</p>
        </router-link>
      </div>
      <div class="card">
        <router-link :to="{name: 'home-images'}">
          <h2>Bilder</h2>
          <p>Verwaltung der Bilder</p>
        </router-link>
      </div>
      <div class="card">
        <router-link :to="{name: 'teasers'}">
          <h2>Teaser</h2>
          <p>Verwaltung der Teaser</p>
        </router-link>
      </div>
    </div>
    <page-footer>
      <router-link :to="{ name: 'dashboard' }" class="btn-primary">
        <span>Zurück</span>
      </router-link>
    </page-footer>
  </div>
</template>
<script>

import Helpers from "@/mixins/Helpers";
import PageHeader from "@/components/ui/PageHeader.vue";
import PageFooter from "@/components/ui/PageFooter.vue";

export default {

  components: {
    PageHeader,
    PageFooter
  },

  mixins: [Helpers],

  data() {
    return {
      isFetched: false,
      user: {},

      // Routes
      routes: {
        get: '/api/user',
      },
    };
  },

  created() {
    this.fetch();
  },

  methods: {
    fetch() {
      this.axios.get(`${this.routes.get}`).then(response => {
        this.user = response.data;
        this.isFetched = true;
      });
    }
  }
}
</script>