export default () => ({
    name: '',
    images: '',
    make: '',

    makes:[],
    errors: null,

    init(){
        const ap = this
        this.images = JSON.parse(localStorage.getItem('images')) || []
        window.axios.get('/makes').then(({data}) => {
            this.makes = data
            console.log(data)
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })

        
    },

    handleOnSubmit(){
        const ap = this;
        const formData = new FormData
        formData.append('name', this.name)
        formData.append('make', this.make)
        if(this.images.length)
            formData.append('image', JSON.stringify(this.images[this.images.length-1]))

        window.axios.post('/models', formData).then(({data}) => {
            console.log(data)
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }

})