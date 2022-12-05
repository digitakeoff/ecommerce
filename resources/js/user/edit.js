export default () => ({
    first_name:'',
    last_name:'',
    email:'',
    role:'',
    slug:'',
    phone:'',
    state:'',
    city:'',
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
            // console.log(`${el.getAttribute('x-model')}:${el.value}`)
            formData.append(el.getAttribute('x-model'), el.value)
        })
        window.axios.post('/users/'+user.slug, formData).then(({data}) => {
            window.localStorage.removeItem('state')
            window.localStorage.removeItem('city')
            window.location.reload()
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }
})