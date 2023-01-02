export default {
    make_id: '',
    model_id: '',

    makes: [],
    models:[],
    
    init() {

        window.axios.get('/makes').then(({data}) => {
            this.makes = data
        })

        this.make_id = localStorage.getItem('make_id')
        this.make_slug = localStorage.getItem('make_slug')

        if(this.make_id){
            window.axios.get('/makes/'+this.make_slug).then(({data}) => {
                this.models = data.models
            })
        }
    },

    selectMake(e){
        this.make_id = e.target.value
        localStorage.setItem('make_id', e.target.value)
        const selectedmake = this.makes.find(make => make.id == e.target.value)
        this.models = (selectedmake != undefined) ? selectedmake.models:[]
        console.log(selectedmake)
    },

    selectModel(e){
        this.model_id = e.target.value
        localStorage.setItem('model_id', e.target.value)
    }
}