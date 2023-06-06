<template>
  <AuthenticatedLayout>
    <ImageCarousel></ImageCarousel>
    <Album>
      <GalleryCard v-for="item in $page.props.gallery" :description="item.description" :image="getImageUrl(item.image)"
        :elapsedTime="item.updated_at" />
    </Album>
  </AuthenticatedLayout>
</template>

<script setup>
import { CoupleApi } from '@/services/couples_api'
import ImageCarousel from '@/Components/ImageCarousel.vue';
import Album from '@/Components/Album.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GalleryCard from '@/Components/GalleryCard.vue';

const { getImageUrl } = CoupleApi();
</script>

<style lang="css" scoped></style>
