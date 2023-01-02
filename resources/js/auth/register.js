export default () => ({
    first_name:'',
    last_name:'',
    phone:'',
    email:'',
    address:'',
    state:'',
    city:'',
    // company_name:'',
    password:'',
    password_confirmation:'',

    errors:null,

    init(){
        this.state = localStorage.getItem('state')
        this.city = localStorage.getItem('city')
        this.first_name = localStorage.getItem('first_name')
        this.last_name = localStorage.getItem('last_name')
        this.phone = localStorage.getItem('phone')
        this.email = localStorage.getItem('email')
        this.address = localStorage.getItem('address')

        
        // const data = JSON.parse(localStorage.getItem('data')) || []
        // for(let key in data){
        //     this.${key} = data[key]
        // }

        const els = document.querySelectorAll('[x-model]')
        var ap = this

        Array.from(els).forEach(el => {
            el.addEventListener('change', ap.onchange)
        })

        Array.from(els).forEach(el => {
            el.addEventListener('focus', function(e){
                e.target.classList.remove('border-red-500')
                ap.errors = null
            })
        });
    },

    onchange(e){
        const data = JSON.parse(localStorage.getItem('data'))||{}
        data[e.target.getAttribute('x-model')] = e.target.value
        localStorage.setItem(e.target.getAttribute('x-model'), e.target.value)
        localStorage.setItem('data', JSON.stringify(data))
        console.log(data)
    },

    handleOnSubmit(){
        const els = document.querySelectorAll('[x-model]')

        var ap = this

        Array.from(els).forEach(el => {
            el.addEventListener('focus', function(e){
                e.target.classList.remove('border-red-500')
                ap.errors = null
            })
        });

        const data = JSON.parse(localStorage.getItem('data'))||[]
        const formData = new FormData
        for(let key in data){
            formData.append(key, data[key])
        }
        formData.append('state', data.state_id)
        formData.append('city', data.city_id)

        console.log(data)
        // formData.append('first_name', this.first_name)
        // formData.append('last_name', this.last_name)
        // formData.append('email', this.email)
        // formData.append('phone', this.phone)
        // formData.append('address', this.address)
        // formData.append('state', this.state)
        // formData.append('city', this.city)
        // formData.append('password', this.password)
        // formData.append('password_confirmation', this.password_confirmation)

        var ap = this
        window.axios.post('/signup', formData).then(({data}) => {
            console.log(data)
            localStorage.removeItem('data')
            localStorage.removeItem('images')
            location.reload()
        }).catch(function (error) {
            localStorage.removeItem('images')
            ap.errors = error.response.data.errors;
        })
    }
})