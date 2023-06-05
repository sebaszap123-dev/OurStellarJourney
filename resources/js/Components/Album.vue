<template>
    <div class="album bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                <slot />
                <div class="col">
                    <div class="card shadow-sm" style="width: 15rem; height: 100%;" @click.prevent="fireForm">
                        <div class="card-body text-center">
                            <ion-icon name="add-circle-outline"></ion-icon>
                            <p class="card-text">
                                Agrega una nueva fotografía :3.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Swal from 'sweetalert2';
const fireForm = async () => {
    const { value: formValues } = await Swal.fire({
        title: 'Save changes before closing?',
        html: `
        <input type="file" id="swal-input-file" accept="image/*" aria-label="Upload your profile picture" class="form-control">
        <br>
        <input type="text" id="swal-input-description" class="form-control" placeholder="Description">
      `,
        showCancelButton: true,
        confirmButtonText: 'Save As',
        cancelButtonText: 'Cancel',
        denyButtonText: 'Close without Saving',
        preConfirm: () => {
            const fileInput = document.getElementById('swal-input-file');
            const descriptionInput = document.getElementById('swal-input-description');
            return {
                file: fileInput.files[0],
                description: descriptionInput.value
            };
        },
    });
    if (formValues) {
        // Realizar acciones con los valores del formulario
        console.log(formValues.file);
        console.log(formValues.description);
    }
}
</script>

<style lang="css" scoped>
ion-icon {
    font-size: 100px;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: scale(1.1);
}


.col {
    padding-top: 30px;
    padding-bottom: 15px;
}

.card-body {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>