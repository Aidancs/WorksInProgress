<template>
  <div class="container">
    {{ image.image }}
    <!-- <a
      class="thumbnail fancybox"
      rel="ligthbox"
      :href="`/images/` + image.image"
    >
      <img class="img-responsive" alt="" :src="`/images/` + image.image" />
      <div class="text-center">
        <small class="text-muted">{{ image.title }}</small>
      </div>
    </a>
    <form :action="url('image-gallery', image.id)" method="POST">
      <input type="hidden" name="_method" value="delete" />
      {!! csrf_field() !!}
      <button type="submit" class="close-icon btn btn-danger">
        <i class="glyphicon glyphicon-remove"></i>
      </button>
    </form> -->
  </div>
</template>
<script type="text/javascript">
$(document).ready(function () {
  $(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none",
  });
});
</script>
<script>
export default {
  props: ["image"],
};
</script>
<style>
.root {
  --jumbotron-padding-y: 3rem;
}

.jumbotron {
  padding-top: var(--jumbotron-padding-y);
  padding-bottom: var(--jumbotron-padding-y);
  margin-bottom: 0;
  background-color: #fff;
}

@media (min-width: 768px) {
  .jumbotron {
    padding-top: calc(var(--jumbotron-padding-y) * 2);
    padding-bottom: calc(var(--jumbotron-padding-y) * 2);
  }
}

.jumbotron p:last-child {
  margin-bottom: 0;
}

.jumbotron-heading {
  font-weight: 300;
}

.jumbotron .container {
  max-width: 40rem;
}

footer {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

footer p {
  margin-bottom: 0.25rem;
}

.box-shadow {
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
}

.gallery {
  display: inline-block;
  margin-top: 20px;
}

.close-icon {
  border-radius: 50%;
  position: absolute;
  right: 5px;
  top: -10px;
  padding: 5px 8px;
}

.form-image-upload {
  background: #e8e8e8 none repeat scroll 0 0;
  padding: 15px;
}
</style>
