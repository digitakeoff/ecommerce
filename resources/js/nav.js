export default () => ({
    open: false,

    init() {
        if(window.screen.width > 995){
            this.open = true
        }
    },

    triggerOpen(){
        if(window.screen.width < 995){
            this.open = ! this.open
        }
    },

    clickOutside(){
        if(window.screen.width < 995){
            this.open = false
        }
    },
 
})