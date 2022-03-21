export default {

  methods: {

    moneyFormat(amount) {
      return amount.toFixed(2);
    },

    shorten(str, length = 10, suffix = "...") {
      return str.substring(0, length) + suffix;
    },

    randomString() {
      return Math.random().toString(36).slice(2);
    },

    getImageSrc(image, template, maxWidth = 2000, maxHeight = 1250) {
      let coords = '';
      if (image.coords_w && image.coords_h) {
        coords = `/${maxWidth}/${maxHeight}/${image.coords_w},${image.coords_h},${image.coords_x},${image.coords_y}`;
      }
      return `/img/${template}/${image.name}${coords}`;
    },
  }
};