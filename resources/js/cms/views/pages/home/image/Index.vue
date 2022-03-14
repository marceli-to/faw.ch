<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div v-if="isFetched" class="is-loaded">
    
    <page-header>
      <h1>Bilder</h1>
    </page-header>

    <div>
      <div class="form-row">
        <image-upload
          :restrictions="'jpg, png | max. 8 MB'"
          :maxFiles="99"
          :maxFilesize="8"
          :acceptedFiles="'.png,.jpg'"
        ></image-upload>
      </div>
      <div class="form-row">
        <image-edit 
          :images="images"
          :imagePreviewRoute="'cache'"
          :aspectRatioW="3"
          :aspectRatioH="2"
        ></image-edit>
      </div>
    </div>
   
    <page-footer>
      <router-link :to="{ name: 'dashboard-home' }" class="btn-primary">
        <span>Zurück</span>
      </router-link>
    </page-footer>
    
  </div>
</div>
</template>
<script>

// Components
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import ImageUpload from "@/views/pages/home/image/Upload.vue";
import ImageEdit from "@/views/pages/home/image/Edit.vue";

// Mixins
import ErrorHandling from "@/mixins/ErrorHandling";
import Helpers from "@/mixins/Helpers";

export default {

  components: {
    PageFooter,
    PageHeader,
    ImageUpload,
    ImageEdit
  },

  mixins: [ErrorHandling, Helpers],

  data() {
    return {
      isLoading: false,
      isFetched: false,
      images: [],
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`/api/home/images`).then(response => {
        this.images = response.data.data;
        this.isFetched = true;
      });
    },

    // Store uploaded image
    storeImage(upload) {
      let image = {
        id: null,
        name: upload.name,
        orientation: upload.orientation,
        coords_w: 0,
        coords_h: 0,
        coords_x: 0,
        coords_y: 0,
        publish: 1,
      }

      this.axios.post('/api/home/image', image).then(response => {
        this.$notify({ type: "success", text: "Bild gespeichert!" });
        image.id = response.data.imageId;
        this.images.push(image);
      });
    },

    destroyImage(image, event) {
      if (confirm("Bitte löschen bestätigen!")) {
        let uri = `/api/home/image/${image}`;
        this.isLoading = true;
        this.axios.delete(uri).then(response => {
          const index = this.images.findIndex(x => x.name === image);
          this.images.splice(index, 1);
          this.isLoading = false;
        });
      }
    },

    toggleImage(image, event) {
      let uri = `/api/home/image/state/${image.id}`;
      this.isLoading = true;
      this.axios.get(uri).then(response => {
        const index = this.images.findIndex(x => x.id === image.id);
        this.images[index].publish = response.data;
        this.isLoading = false;
      });
    },

    saveImageCoords(image) {
      let uri = `/api/home/image/coords/${image.id}`;
      this.isLoading = true;
      this.axios.put(uri, image).then(response => {
        this.$notify({ type: "success", text: "Änderungen gespeichert!" });
        this.isLoading = false;
      });
    },
  }
}
</script>