export default () => ({
   
    selected: 0,

    products: [
        {
            image: 'nissan1-640x480.jpg',
            name:'2012 Nissan 370Z',
            amount:'$30,998',
            mileage:'15000',
            condition: 'Brand New',
            location:'Ikeja, Lagos',
        },

        {
            image: 'honda-accord-896x436.jpg',
            name:'2012 Honda Accord',
            amount:'$28,555',
            mileage:'95 Miles',
            condition: 'Foreign used',
            location:'Yaba, Lagos',
        },

        {
            image: 'mdx5-1-640x480.jpg',
            name:'2014 Mercedez Benz SL-550',
            amount:'$81,197',
            mileage:'113 Miles',
            condition: 'Nigeria used',
            location:'Yaba, Lagos',
        },

        {
            image: 'mercedes1-1-640x480.jpg',
            name:'2014 Mercedez Benz SL-550',
            amount:'$81,197',
            mileage:'113 Miles',
            condition: 'Brand New',

            location:'Yaba, Lagos',
        },

        {
            image: 'porsche1-1-896x436.jpg',
            name:'2014 Mercedez Benz SL-550',
            amount:'$64,540',
            
            condition: 'Nigeria used',
            mileage:'4400 Miless',
            location:'Yaba, Lagos',
        }
        
    ],
    carouse: null,

    init(){
        
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
        console.log(this.$store.location.states)
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
