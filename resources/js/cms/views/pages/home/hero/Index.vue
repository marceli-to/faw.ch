<template>
<div>
  <div v-if="isFetched" class="is-loaded">
    <page-header>
      <h1>Bilder</h1>
    </page-header>
    <images 
      :imageRatioW="3" 
      :imageRatioH="2"
      :type="'HeroImage'"
      :typeId="1"
      :images="data.images">
    </images>
    <page-footer>
      <button-back :route="'home-dashboard'">Zurück</button-back>
    </page-footer>
  </div>
</div>
</template>
<script>
import Helpers from "@/mixins/Helpers";
import ButtonBack from "@/components/ui/ButtonBack.vue";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import Images from "@/modules/images/Index.vue";


export default {

  components: {
    PageFooter,
    PageHeader,
    ButtonBack,
    Images
  },

  mixins: [Helpers],

  data() {
    return {

      // Data
      data: [],

      // Routes
      routes: {
        get: '/api/hero/images/home',
      },

      // States
      isLoading: false,
      isFetched: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        saved: 'Bild gespeichert!',
        updated: 'Änderungen gespeichert!',
      }
    };
  },

  created() {
    this.fetch();
  },

  methods: {
    fetch() {
      this.axios.get(`${this.routes.get}`).then(response => {
        this.data = response.data;
        this.isFetched = true;
      });
    },
  }
}
</script>