<template>
  <AuthenticatedLayout>
    <div class="container">
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <div class="getImage" style="display: none;">
              {{ mainImg = getImageUrl($page.props.main_image[0]) }}
            </div>
            <div v-if="mainImg" class="image-container">
              <img :src="mainImg" class="d-block mx-lg-auto img-fluid rounded" alt="Pololitos" width="700" height="500" />
              <button class="edit-icon rounded-circle" @click="addFile">
                <ion-icon name="create-outline" style="color: black;"></ion-icon>
              </button>
            </div>
            <button v-else @click.prevent="addFile">
              <ion-icon size="large" name="add-circle"></ion-icon>
            </button>
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
import { CoupleApi } from '@/services/couples_api';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2'

const { getImageUrl } = CoupleApi();

let mainImg = null;
const addFile = async () => {
  const { value: file } = await Swal.fire({
    title: 'Select image',
    input: 'file',
    showConfirmButton: true,
    inputAttributes: {
      'accept': 'image/*',
      'aria-label': 'Upload your profile picture'
    }
  });

  if (file) {
    const reader = new FileReader();
    reader.onload = async (e) => {
      const formData = new FormData();
      formData.append('image', file);
      try {
        const response = await axios.post('/upload-image', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });

        if (response.status === 200) {
          Swal.fire('Success', 'Image uploaded successfully!', 'success',).then(() => {
            window.location.reload();
          });
        } else {
          Swal.fire('Error', 'Failed to upload image.', 'error');
        }
      } catch (error) {
        const message = error.response.data.message;
        Swal.fire('Error', message, 'error');
      }
    };
    reader.readAsDataURL(file);
  }
}
</script>

<style lang="css" scoped>
h1 {
  font-family: 'Delius', 'Times New Roman', Times, serif;
  font-weight: bold;
  padding-top: 30px;
  text-align: justify;
}

.container {
  padding-bottom: 0.7rem;
}

.image-container {
  position: relative;
}

.edit-icon {
  position: absolute;
  width: 3rem !important;
  height: 3rem !important;
  top: 0.5px;
  right: 0.5px;
  background-color: rgba(255, 255, 255, 0.5);
  padding: 0.5rem;
  margin: 0.5rem;
  /* Cambiar el valor del padding a 0.5rem */
  display: flex;
  justify-content: center;
  align-items: center;
}

.edit-icon ion-icon {
  font-size: 24px;
}
</style>
