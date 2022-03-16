<template>
<div>
  <div  class="is-loaded">
    <page-header>
      <h1>Bilder</h1>
    </page-header>
    <assets :imageRatioW="3" :imageRatioH="2"></assets>
    <page-footer>
      <router-link :to="{ name: 'home-dashboard' }" class="btn-primary">
        <span>Zurück</span>
      </router-link>
    </page-footer>
  </div>
</div>
</template>
<script>
import ErrorHandling from "@/mixins/ErrorHandling";
import Helpers from "@/mixins/Helpers";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import Assets from "@/modules/assets/Index.vue";


export default {

  components: {
    PageFooter,
    PageHeader,
    Assets
  },

  mixins: [ErrorHandling, Helpers],

  // data() {
  //   return {

  //     // Data
  //     data: [],

  //     // Routes
  //     routes: {
  //       get: '/api/home/images',
  //       store: '/api/home/image',
  //       delete: '/api/home/image',
  //       toggle: '/api/home/image/state',
  //       coords: '/api/home/image/coords',
  //     },

  //     // States
  //     isLoading: false,
  //     isFetched: false,

  //     // Messages
  //     messages: {
  //       emptyData: 'Es sind noch keine Daten vorhanden...',
  //       saved: 'Bild gespeichert!',
  //       updated: 'Änderungen gespeichert!',
  //     }

  //   };
  // },

  // created() {
  //   this.fetch();
  // },

  // methods: {

  //   fetch() {
  //     this.axios.get(`${this.routes.get}`).then(response => {
  //       this.data = response.data.data;
  //       this.isFetched = true;
  //     });
  //   },

  //   // Store uploaded image
  //   storeImage(upload) {
  //     let image = {
  //       id: null,
  //       name: upload.name,
  //       orientation: upload.orientation,
  //       coords_w: 0,
  //       coords_h: 0,
  //       coords_x: 0,
  //       coords_y: 0,
  //       publish: 1,
  //     }

  //     this.axios.post(`${this.routes.store}`, image).then(response => {
  //       this.$notify({ type: "success", text: this.messages.saved });
  //       image.id = response.data.imageId;
  //       this.data.push(image);
  //     });
  //   },

  //   destroyImage(image) {
  //     if (confirm("Bitte löschen bestätigen!")) {
  //       this.isLoading = true;
  //       this.axios.delete(`${this.routes.delete}/${image}`).then(response => {
  //         const index = this.data.findIndex(x => x.name === image);
  //         this.data.splice(index, 1);
  //         this.isLoading = false;
  //       });
  //     }
  //   },

  //   toggleImage(image) {
  //     this.isLoading = true;
  //     this.axios.get(`${this.routes.toggle}/${image.id}`).then(response => {
  //       const index = this.data.findIndex(x => x.id === image.id);
  //       this.data[index].publish = response.data;
  //       this.isLoading = false;
  //     });
  //   },

  //   saveImageCoords(image) {
  //     this.isLoading = true;
  //     this.axios.put(`${this.routes.coords}/${image.id}`, image).then(response => {
  //       this.$notify({ type: "success", text: this.messages.updated });
  //       this.isLoading = false;
  //     });
  //   },
  // }
}
</script>