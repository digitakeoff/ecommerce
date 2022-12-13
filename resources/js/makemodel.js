export default () => ({
    make_id: '',
    model_id: '',

    makes: [],
    models:[],
    
    init() {
        // window.axios.get('/makes/1').then(({data}) => {
        //     this.makes = data
        //     console.log(data)
        // })
        
        this.make_id = localStorage.getItem('make_id')
        this.model_id = localStorage.getItem('model_id')
    },

    selectMake(e){
        this.make_id = e.target.value
        localStorage.setItem('make_id', e.target.value)
        console.log(e.target.value)
        // if(this.make_id){
            window.axios.get('/makes/'+e.target.value).then(({data}) => {
                this.models = data.models
                console.log(data.models)
            })
        // }
    },

    selectModel(e){
        this.model_id = e.target.value
        localStorage.setItem('model_id', e.target.value)
    }
})