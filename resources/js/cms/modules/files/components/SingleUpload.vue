<template>
  <div class="single-file-upload">
    <div v-if="currentFile" class="upload-listing is-files">
      <div>
        <div class="upload-item-file">
          <div>{{ currentFile }}</div>
          <div class="upload__actions">
            <file-actions :file="fileObject" :hasEdit="false" :hasDownload="true"></file-actions>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <vue-dropzone-file
        ref="dropzone"
        id="dropzone-single"
        :options="dropzoneConfig"
        @vdropzone-complete="complete"
      ></vue-dropzone-file>
      <span class="bubble is-restriction">{{ restrictions }}</span>
    </div>
  </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import FileActions from "@/modules/files/components/Actions.vue";

export default {
  components: {
    vueDropzoneFile: vue2Dropzone,
    FileActions,
  },

  props: {
    file: {
      type: String,
      default: null
    },
    restrictions: {
      type: String,
      default: 'pdf | max. 32 MB'
    },
    acceptedFiles: {
      type: String,
      default: '.pdf'
    },
    maxFilesize: {
      type: Number,
      default: 32
    },
    storagePath: {
      type: String,
      default: '/storage/files/'
    }
  },

  data() {
    return {
      currentFile: this.$props.file,
      dropzoneConfig: {
        url: "/api/file/upload",
        method: 'post',
        maxFilesize: this.$props.maxFilesize,
        maxFiles: 1,
        createImageThumbnails: false,
        acceptedFiles: this.$props.acceptedFiles,
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      },
      messages: {
        uploadError: 'Invalid format or file too big!'
      }
    };
  },

  watch: {
    file(newVal) {
      this.currentFile = newVal;
    }
  },

  computed: {
    fileUrl() {
      return this.storagePath + this.currentFile;
    },
    fileObject() {
      return { name: this.currentFile };
    }
  },

  methods: {
    complete(file) {
      if (file.status == "error" && file.accepted == false) {
        this.$notify({ type: "error", text: this.messages.uploadError });
      } else {
        let response = JSON.parse(file.xhr.response);
        this.currentFile = response.name;
        this.$emit('update:file', response.name);
      }
      this.$refs.dropzone.removeFile(file);
    },

    destroy() {
      this.currentFile = null;
      this.$emit('update:file', null);
    }
  }
};
</script>
