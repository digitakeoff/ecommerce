export default () => ({
    first_name:'',
    last_name:'',
    phone:'',
    email:'',
    address:'',
    state:'',
    city:'',
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

        const inputs = document.querySelectorAll('#register input')
        const selects = document.querySelectorAll('#register select')
        var ap = this
        Array.from(inputs).forEach(el => {
            el.addEventListener('focus', function(e){
                e.target.classList.remove('border-red-500')
                ap.errors = null
            })
        });
        Array.from(selects).forEach(el => {
            el.addEventListener('focus', function(e){
                e.target.classList.remove('border-red-500')
                ap.errors = null
            })
        });
        Array.from(inputs).forEach(el => {
            el.addEventListener('change', ap.onchange)
        });

        Array.from(selects).forEach(el => {
            el.addEventListener('change', ap.onchange)
        });
    },

    onchange(e){
        localStorage.setItem(e.target.id, e.target.value)
        console.log(e.target.value)
    },

    handleOnSubmit(){
        const inputs = document.querySelectorAll('#register input')
        const selects = document.querySelectorAll('#register select')
        Array.from(inputs).forEach(el => {
            if(!el.value){
                el.classList.add('border-red-500')
                // el.placeholder = 
            }
        });
        Array.from(selects).forEach(el => {
            if(!el.value){
                el.classList.add('border-red-500')
            }
        });

        const formData = new FormData
        formData.append('first_name', this.first_name)
        formData.append('last_name', this.last_name)
        formData.append('email', this.email)
        formData.append('phone', this.phone)
        formData.append('address', this.address)
        formData.append('state', this.state)
        formData.append('city', this.city)
        formData.append('password', this.password)
        formData.append('password_confirmation', this.password_confirmation)

        var ap = this
        window.axios.post('/signup', formData).then(({data}) => {
            console.log(data)
        }).catch(function (error) {
            ap.errors = error.response.data.errors;
        })
    }
})