<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div v-if="isFetched" class="is-loaded">
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
        :images="data"
        :imagePreviewRoute="'cache'"
        :ratioW="this.$props.imageRatioW"
        :ratioH="this.$props.imageRatioH"
      ></image-edit>
    </div>
  </div>
</div>
</template>
<script>
import ErrorHandling from "@/mixins/ErrorHandling";
import Helpers from "@/mixins/Helpers";
// import PageFooter from "@/components/ui/PageFooter.vue";
// import PageHeader from "@/components/ui/PageHeader.vue";
import ImageUpload from "@/modules/assets/components/Upload.vue";
import ImageEdit from "@/modules/assets/components/Edit.vue";

export default {

  components: {
    // PageFooter,
    // PageHeader,
    ImageUpload,
    ImageEdit
  },

  mixins: [ErrorHandling, Helpers],

  props: {
    imageRatioW: {
      type: Number,
      default: 3
    },

    imageRatioH: {
      type: Number,
      default: 2
    }
  },

  data() {
    return {

      // Data
      data: [],

      // Routes
      routes: {
        get: '/api/assets',
        store: '/api/asset',
        delete: '/api/asset',
        toggle: '/api/asset/state',
        coords: '/api/asset/coords',
      },

      // States
      isLoading: false,
      isFetched: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Dateien vorhanden...',
        saved: 'Datei gespeichert!',
        updated: 'Änderungen gespeichert!',
      },
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`${this.routes.get}`).then(response => {
        this.data = response.data.data;
        this.isFetched = true;
      });
    },

    store(media) {
      let asset = {
        id: null,
        name: media.name,
        original_name: media.original_name,
        size: media.size,
        extension: media.extension,
        orientation: media.orientation,
        coords_w: 0,
        coords_h: 0,
        coords_x: 0,
        coords_y: 0,
        publish: 1,
        type: this.$route.params.type,
      }

      this.axios.post(`${this.routes.store}`, asset).then(response => {
        this.$notify({ type: "success", text: this.messages.saved });
        asset.id = response.data.assetId;
        this.data.push(asset);
      });
    },

    destroyImage(image) {
      if (confirm("Bitte löschen bestätigen!")) {
        this.isLoading = true;
        this.axios.delete(`${this.routes.delete}/${image}`).then(response => {
          const index = this.data.findIndex(x => x.name === image);
          this.data.splice(index, 1);
          this.isLoading = false;
        });
      }
    },

    toggleImage(image) {
      this.isLoading = true;
      this.axios.get(`${this.routes.toggle}/${image.id}`).then(response => {
        const index = this.data.findIndex(x => x.id === image.id);
        this.data[index].publish = response.data;
        this.isLoading = false;
      });
    },

    saveImageCoords(image) {
      this.isLoading = true;
      this.axios.put(`${this.routes.coords}/${image.id}`, image).then(response => {
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },
  }
}
</script>