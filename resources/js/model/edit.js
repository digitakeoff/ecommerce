export default () => ({
    name: '',
    image: '',
    make:'',

    errors: null,
    images: '',
    makes:[],
    init(){
        this.name = model.name
        this.image = model.image
        this.make = model.make_id
        this.images = JSON.parse(localStorage.getItem('images')) || []
        window.axios.get('/makes').then(({data}) => {
            this.makes = data
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    },

    handleOnSubmit(){
        let ap = this
        const images = JSON.parse(localStorage.getItem('images')) || []
        const formData = new FormData
        formData.append('name', this.name)
        formData.append('_method', 'PUT')

        if(images.length)
            formData.append('image', JSON.stringify(images[images.length-1]))
        if(model.image)
            formData.append('image', JSON.stringify(this.image))
            
        formData.append('make_id', this.make)

        window.axios.post('/models/'+model.slug, formData).then(({data}) => {
            localStorage.removeItem('images')
            console.log(data)
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }

})