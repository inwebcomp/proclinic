<template>

</template>

<script>
export default {
    name: 'mob-menu',

    props: {
        isOpen: {
            type: Boolean,
            default: false
        }
    },

    methods: {
        closeMenu() {
            this.$emit('menu-close')
        },
        scrollToBlock(e) {
            this.$root.scrollToBlock(e)
            this.closeMenu()
        }
    }
};
</script>

<style lang="scss">
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s ease;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>

