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

    init(){
        this.image_index = JSON.parse(localStorage.getItem('imgIndex'))

        const data = JSON.parse(localStorage.getItem('data'))||{}
        for(let key in data){
            this[key] = data[key]
        }
        
        const els = document.querySelectorAll('[x-model]')
        var ap = this

        Array.from(els).forEach(el => {
            el.addEventListener('change', ap.onchange)
        })
    },

    onchange(e){
        const data = JSON.parse(localStorage.getItem('data'))||{}
        data[e.target.getAttribute('x-model')] = e.target.value
        localStorage.setItem(e.target.getAttribute('x-model'), e.target.value)
        localStorage.setItem('data', JSON.stringify(data))
        console.log(data)
    },

    handleOnSubmit(){
        var ap = this
        const data = JSON.parse(localStorage.getItem('data'))||{}

        const els = document.querySelectorAll('[x-model]')
        Array.from(els).forEach(el => {
            if(!el.value){
                el.classList.add('border-red-500')
            }
        });

        if(window.tinymce)
            var description = window.tinymce.get('description').getContent()

        if(import.meta.env.VITE_APP_ENV == 'local')
            var description = this.description
        
        const formData = new FormData
        for (let key in data){
            formData.append(key, data[key])
        }
        
        formData.append('state', this.state_id)
        formData.append('city', this.city_id)
        formData.append('bodytype', this.bodytype_id)
        formData.append('make', this.make_id)
        formData.append('model', this.model_id)

        const images = JSON.parse(localStorage.getItem('images'))
        if(images.length){
            const image_paths = images.map(image => image.path)
            formData.append('images', JSON.stringify(image_paths))
        }

        formData.append('description', description)
        formData.append('main_image_index', this.image_index)

        window.axios.post('/cars', formData).then(({data}) => {
            console.log(data)
            localStorage.removeItem('images')
            localStorage.removeItem('data')
            location.reload()
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }

})