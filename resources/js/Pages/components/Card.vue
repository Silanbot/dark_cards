<script setup>
    const props = defineProps(['img', 'src'])
</script>

<template>
    <img :src="props.src" :data-cardimg="props.img" alt="">
</template>
