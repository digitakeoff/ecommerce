export default () => ({
    name:'',
    price:'',
    make:'',
    model:'',
    year:'',
    vin:'',
    vehicle_drive:'',
    ext_color:'',
    int_color:'',
    transmission:'',
    mileage:'',
    condition:'',
    body_type:'',
    description:'',
    image_index: '',  
    location:{
        state: '',
        city: '',
        address: ''
    },

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
    },

    getModelOfMake(){
        if(this.models.length){
            var ap = this
            return this.models.filter(model => model.make_id == ap.make)
        }
    }, 

    handleOnSubmit(){
        var description = window.tinymce.get('description').getContent()
        if(!description)
            description = this.description
        
        const formData = new FormData
        for (const key in this.$data) {
            formData.append(key, this.$data[key])
        }
        formData.append('images', JSON.stringify(this.images))
        formData.append('description', description)

        // formData.append('name', this.name)
        // formData.append('price', this.price)
        // formData.append('state', this.location.state)
        // formData.append('city', this.location.city)
        // formData.append('address', this.location.address)
        // formData.append('image_index', this.image_index)
        // formData.append('images', JSON.stringify(this.images))
        // formData.append('description', description)
        // formData.append('ext_color', this.ext_color)
        // formData.append('int_color', this.int_color)
        // formData.append('make', this.make)
        // formData.append('model', this.model)
        // formData.append('year', this.year)
        // formData.append('vin', this.vin)
        // formData.append('condition', this.condition)
        // formData.append('transmission', this.transmission)
        // formData.append('mileage', this.mileage)
        // formData.append('vehicle_drive', this.vehicle_drive)
        // formData.append('body_type', this.body_type)

        window.axios.post('/cars', formData).then(({data}) => {
            console.log(data)
        })
    }

})