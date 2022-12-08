export default () => ({
    name: '',
    image: '',

    errors: null,
    images: '',

    init(){
        this.name = body.name
        this.image = body.image
        this.images = JSON.parse(localStorage.getItem('images')) || []
    },

    handleOnSubmit(){
        let ap = this
        const images = JSON.parse(localStorage.getItem('images')) || []
        const formData = new FormData
        formData.append('name', this.name)
        formData.append('_method', 'PUT')

        if(images.length)
            formData.append('image', JSON.stringify(images[images.length-1]))
        else
            formData.append('image', JSON.stringify(this.image))

        window.axios.post('/bodytypes/'+body.slug, formData).then(({data}) => {
            localStorage.removeItem('images')
            console.log(data)
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }

})