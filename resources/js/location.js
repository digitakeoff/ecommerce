export default {
    state_id: '',
    city_id: '',

    locations: [],
    cities:[],
    
    init() {
        window.axios.get('/states').then(({data}) => {
            this.locations = data
        })
        
        const state_id = localStorage.getItem('state_id')

        if(state_id){
            window.axios.get('/states/'+state_id).then(({data}) => {
                this.cities = data.cities
            })
        }

        // this.selectState($event)
    },


    selectState(e){
        var ap = this
        this.state_id = e.target.value
        
        localStorage.setItem('state_id', e.target.value)

        const state = e.target.value || localStorage.getItem('state_id')

        if(state){
            window.axios.get('/states/'+state).then(({data}) => {
                ap.cities = data.cities
                console.log(ap.cities)
            })
        }
    },

    selectCity(e){
        this.city_id = e.target.value
        localStorage.setItem('city_id', e.target.value)
    }
}