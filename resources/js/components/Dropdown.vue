<template>
    <div class="dropdown relative">
        <!-- trigger -->
        <div class="dropdown-toggle" 
            @click="isOpen=!isOpen"
            aria-haspopup="true"
            :aria-expanded="isOpen"
        >
            <slot name="trigger"></slot>
        </div>

        <!-- menu links -->
        <div v-show="isOpen" class="dropdown-menu absolute bg-card py-2 rounded shadow"
            :class="align==='left' ? 'pin-l' : 'pin-r'" 
            :stype="{width}"
        >
            <slot></slot>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            width : {default: 'auto'},
            align : { default : 'left'}
        },
        watch: {
            isOpen(isOpen) {
                document.addEventListener('click', this.closeIfClickedOutside);
            }
        },
        methods : {
            closeIfClickedOutside(event){
                if (! event.target.closest('.dropdown')){
                    this.isOpen=false;
                    document.removeEventListener('click', this.closeIfClickedOutside);
                }
            }
        },
        data() {
            return {
                isOpen : false
            }
        }
    }
</script>