<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div v-if="isFetched" class="is-loaded">
    <page-header>
      <h1>Layout Startseite</h1>
    </page-header>

    <div class="grid-items">
      <figure class="grid-item__hero">
        <router-link class="btn-primary is-tiny" :to="{name: 'home-images'}">
          Bearbeiten
        </router-link>
        <img :src="getImageSrc(data.hero, 'cache')" height="300" width="300">
      </figure>
      <hr>
      <h1>Veranstaltungen</h1>
      <div class="grid-cols-12">
        <div class="span-6">Item 1</div>
        <div class="span-6">Item 2</div>
      </div>
      <hr>
      <h1>Teaser</h1>
      <div class="grid-cols-12">
        <div 
          class="span-4 grid-item"
          v-for="item in data.grid.teasers"
          :key="item.id">
          <a href="javascript:;" @click.prevent="destroy(item.id)" class="btn-primary is-tiny">Löschen</a>
          <figure>
            <img :src="getImageSrc(item.teaser.image, 'cache')" height="300" width="300">
            <h2>{{item.teaser.title}}</h2>
            <p v-html="item.teaser.text"></p>
          </figure>
        </div>

      </div>
    </div>
    <page-footer>
      <router-link :to="{ name: 'home-dashboard' }" class="btn-primary">
        <span>Zurück</span>
      </router-link>
    </page-footer>
  </div>
</div>
</template>
<script>
import { EditIcon } from 'vue-feather-icons';
import ErrorHandling from "@/mixins/ErrorHandling";
import Helpers from "@/mixins/Helpers";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";

export default {

  components: {
    EditIcon,
    PageFooter,
    PageHeader,
  },

  mixins: [ErrorHandling, Helpers],

  data() {
    return {

      data: {
        hero: {},
        grid: {},
      },

      // Routes
      routes: {
        getHero: '/api/hero/image/home',
        get: '/api/grid/items',
        delete: '/api/grid/item',
      },

      // States
      isLoading: false,
      isFetched: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        confirm: 'Bitte löschen bestätigen!',
        updated: 'Daten aktualisiert',
      }
    }
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.isLoading = true;
      this.axios.all([
        this.axios.get(`${this.routes.getHero}`),
        this.axios.get(`${this.routes.get}`),
      ]).then(axios.spread((...responses) => {
        this.data.hero = responses[0].data;
        this.data.grid = responses[1].data;
        this.isFetched = true;
        this.isLoading = false;
      }));
    },

    destroy(id, event) {
      if (confirm(this.messages.confirm)) {
        this.isLoading = true;
        this.axios.delete(`${this.routes.delete}/${id}`).then(response => {
          this.fetch();
          this.isLoading = false;
        });
      }
    },
  }
}
</script>