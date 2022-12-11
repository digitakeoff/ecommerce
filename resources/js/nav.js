export default () => ({
    open: false,

    init() {
        if(window.screen.width > 639){
            this.open = true
        }
    },

    triggerOpen(){
        if(window.screen.width < 640){
            this.open = ! this.open
        }
    },

    clickOutside(){
        if(window.screen.width < 640){
            this.open = false
        }
    },
 
})