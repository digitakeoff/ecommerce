export default () => ({
    name: '',
    images: '',
    make: '',

    makes:[],
    errors: null,

    init(){
        const ap = this
        window.axios.get('/makes').then(({data}) => {
            this.makes = data
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    },

    handleOnSubmit(){
        const ap = this;
        const images = localStorage.getItem('images')|| []
        const formData = new FormData
        formData.append('name', this.name)
        formData.append('make', this.make)
        if(images.length)
            formData.append('image', images[images.length-1].path)

        window.axios.post('/models', formData).then(() => {
            localStorage.removeItem('images')
            location.reload()
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }
})