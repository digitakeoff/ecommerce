export default () => ({
    name:'',
    price:'',
    make_id:'',
    fuel_type:'',
    model_id:'',
    year:'',
    vin:'',
    vehicle_drive:'',
    ext_color:'',
    int_color:'',
    transmission:'',
    mileage:'',
    condition:'',
    bodytype_id:'',
    description:'',
    image_index: '', 
    state: '',
    city: '',
    address: '',

    
    errors: null,
    body_types:[],
    makes:[],
    images:[],
    models:[],

    init(){
        this.images = JSON.parse(localStorage.getItem('images')) || []
        this.image_index = JSON.parse(localStorage.getItem('imgIndex'))

        window.axios.get('/bodytypes').then(({data}) => {
            this.body_types = data
        })

        window.axios.get('/makes').then(({data}) => {
            this.makes = data
        })

        window.axios.get('/models').then(({data}) => {
            this.models = data
        })

        const data = JSON.parse(localStorage.getItem('data')) || {}
        for(let key in data){
            this[key] = data[key]
        }
        
        const els = document.querySelectorAll('[x-model]')
        var ap = this
        // Array.from(els).forEach(el => {
        //     el.addEventListener('focus', function(e){
        //         e.target.classList.remove('border-red-500')
        //         ap.errors = null
        //     })
        // })

        Array.from(els).forEach(el => {
            el.addEventListener('change', ap.onchange)
        })
    },

    getModelOfMake(){
        if(this.models.length){
            var ap = this
            return this.models.filter(model => model.make_id == ap.make)
        }
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

        if(import.meta.env.VITE_APP_ENV == 'production')
            var description = window.tinymce.get('description').getContent()

        if(import.meta.env.VITE_APP_ENV == 'local')
            var description = this.description
        
        const formData = new FormData
        for (let key in data){
            formData.append(key, data[key])
        }

        const image_paths = this.images.map((image) => {
            return image.path
        })

        formData.append('images', JSON.stringify(image_paths))
        formData.append('description', description)
        formData.append('main_image_index', this.image_index)

        window.axios.post('/cars', formData).then(({data}) => {
            console.log(data)
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }

})