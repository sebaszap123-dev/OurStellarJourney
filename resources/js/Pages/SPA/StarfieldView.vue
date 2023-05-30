<template>
  <AuthenticatedLayout>
    <div class="container">
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <!-- <img :src="mainImg" class="d-block mx-lg-auto img-fluid rounded" alt="Pololitos" width="700" height="500" /> -->
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">
              Una mágica historia junto a una mágica persona
            </h1>
            <p class="lead" style="text-align: justify">
              ¡Bienvenida a nuestro rinconcito secreto! Esta página ha sido creada especialmente
              para nosotros, donde podemos compartir y revivir todos esos momentos especiales que
              hemos vivido juntos. Gracias por ser la persona maravillosa que eres y por llenar mi
              vida de amor y felicidad. Este espacio es un pequeño homenaje a nuestra historia y un
              recordatorio constante de todo lo que hemos superado y construido como pareja.
            </p>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<style lang="css" scoped>
h1 {
  font-family: 'Delius', 'Times New Roman', Times, serif;
  font-weight: bold;
  padding-top: 30px;
  text-align: justify;
}
</style>
