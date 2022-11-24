export default () => ({
    name: '',
    images: '',
    make: '',

    makes:[],

    init(){
        this.images = JSON.parse(localStorage.getItem('images')) || []
        window.axios.get('/makes').then(({data}) => {
            this.makes = data
            console.log(data)
        })

        
    },

    handleOnSubmit(){
       
        const formData = new FormData
        formData.append('name', this.name)
        formData.append('make', this.make)
        
        formData.append('image', JSON.stringify(this.images[this.images.length-1]))

        window.axios.post('/models', formData).then(({data}) => {
            console.log(data)
        })
    }

})