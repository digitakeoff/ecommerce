export default () => ({
    first_name:'',
    last_name:'',
    email:'',
    role:'',
    slug:'',
    phone:'',
    state_id:'',
    city_id:'',
    address:'',
    password:'',
    
    errors: null,

    init(){          
        const els = document.querySelectorAll('[x-model]')
        
        var ap = this
        Array.from(els).forEach(el => {
            ap[el.getAttribute('x-model')] = user[el.getAttribute('x-model')] 
        })
        this.password = ''
    },

    handleOnSubmit(){
        var ap = this
        const els = document.querySelectorAll('[x-model]')
        const formData = new FormData
        formData.append('_method', 'PUT')
      
        Array.from(els).forEach(el => {
            formData.append(el.getAttribute('x-model'),  document.querySelector('[x-model='+el.getAttribute('x-model')+']').value)
            // console.log(`${el.getAttribute('x-model')}:${document.querySelector('[x-model='+el.getAttribute('x-model')+']').value}`)
        })
        
        window.axios.post('/users/'+user.slug, formData).then(({data}) => {
            console.log(data)
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })

        window.scrollTo(0, 0)
    }
})