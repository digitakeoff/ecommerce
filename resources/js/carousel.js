export default () => ({
   
    selected: 0,

    products: [],
    carouse: null,

    init(){
        
        window.axios.get('/latests').then(({data}) => {
            this.products = data
        })
        var ap = this

        function carouseFun(){
            // ap.selected = Number(ap.selected) + 1
            if(ap.products.length){
                if(ap.selected < ap.products.length - 1)
                    ap.selected++
                else
                    ap.selected = 0
            }
        }
        // console.log(this.$store.location.states)
        this.carouse = setInterval(carouseFun, 1500)

        if(this.$refs.img){
            this.$refs.img.onmouseenter = function(){
                clearInterval(ap.carouse)
            }

            this.$refs.img.onmouseleave = function(){
                ap.carouse = setInterval(carouseFun, 3000)
            }
        }

    },
    
    carouseFun(){
        var ap = this
        if(this.products.length){
            if(this.selected < this.products.length - 1)
                this.selected++
            else
                this.selected = 0
        }
    },

    pause(){
        clearInterval(this.carouse)
    },

    play(){
        var ap = this
        this.carouse = setInterval(function(){
            

            if(ap.products.length){
                if(ap.selected < ap.products.length - 1)
                    ap.selected++
                else
                    ap.selected = 0
            }
        }, 3000)
    },

    prev(){
        if(this.selected > 0)
            this.selected--
        else
            this.selected = this.products.length - 1
    },

    next(){
        if(this.selected < this.products.length - 1)
            this.selected++
        else
            this.selected = 0
    }
})
