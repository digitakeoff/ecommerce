export default () => ({
    price:'',
    make_id:'',
    fuel_type:'',
    model_id:'',
    year:'',
    vin:'',
    ext_color:'',
    int_color:'',
    transmission:'',
    mileage:'',
    condition:'',
    bodytype_id:'',
    description:'',
    image_index: '', 
    state_id: '',
    city_id: '',
    address: '',
    doors: '',
    seats: '',
    speed: '',
    airbags: '',
    
    errors: null,
    images:[],
    imgIndex:0,
    num_of_images:10,

    init(){
        var ap = this
        
        localStorage.setItem('state_id', car.state.id)
        localStorage.setItem('make_id', car.make.id)
        localStorage.setItem('make_slug', car.make.slug)
        
        const els = document.querySelectorAll('[x-model]')
        Array.from(els).forEach(el => {
            this[el.getAttribute('x-model')] = car[el.getAttribute('x-model')]
        })
    },

    handleOnSubmit(){
        var ap = this
        
        var description = this.description
        if(window.tinymce)
            description = window.tinymce.get('description').getContent()
        
               
        const formData = new FormData

        const els = document.querySelectorAll('[x-model]')
        Array.from(els).forEach(el => {
            formData.append(el.getAttribute('x-model'),  el.value)
        })

        if(localStorage.getItem('images')){
            const images = JSON.parse(localStorage.getItem('images'))
            const image_paths = images.map(image => image.path)
            formData.append('images', JSON.stringify(image_paths))
        }
        formData.append('description', description)
        formData.append('main_image_index', this.image_index)
        formData.append('_method', 'PUT')
        window.axios.post(`/cars/${car.slug}`, formData).then(({data}) => {
            console.log(data)
            localStorage.clear()
            location.reload()
        }).catch((error) => {
            location.reload()
            ap.errors = error.response.data.errors
        })
    }
})