export default {
    make_id: '',
    model_id: '',

    makes: [],
    models:[],
    
    init() {
        window.axios.get('/makes').then(({data}) => {
            this.makes = data
        })
    },

    selectMake(e){
        this.make_id = e.target.value
        localStorage.setItem('make_id', e.target.value)

        const selectedmake = this.makes.find(make => make.id == e.target.value)

        this.models = (selectedmake != undefined) ? selectedmake.models:[]
    },

    selectModel(e){
        this.model_id = e.target.value
        localStorage.setItem('model_id', e.target.value)
    }
}