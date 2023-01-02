export default {
    bodytype_id: '',

    
    bodies :[],
    
    init() {
        window.axios.get('/bodytypes').then(({data}) => {
            this.bodies = data
        })
    },

    selectBodies(e){
        this.body_id = e.target.value
        localStorage.setItem('bodytype_id', e.target.value)
    },
}